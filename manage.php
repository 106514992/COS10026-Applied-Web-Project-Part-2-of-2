<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit;
}

require_once 'settings.php';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Database connection failed.');
}

function clean_output($value) {
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

/* Create eoi table if missing, so the page does not break */
$create_eoi_table = "
CREATE TABLE IF NOT EXISTS `eoi` (
  `EOInumber` int(11) NOT NULL AUTO_INCREMENT,
  `job_reference` varchar(5) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `date_of_birth` varchar(10) NOT NULL,
  `gender` enum('male','female','prefer-not-to-say') NOT NULL,
  `street_address` varchar(40) NOT NULL,
  `suburb` varchar(40) NOT NULL,
  `state` enum('VIC','NSW','QLD','NT','WA','SA','TAS','ACT') NOT NULL,
  `postcode` char(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `skills` text NOT NULL,
  `other_skills` text,
  `status` enum('New','Current','Final') NOT NULL DEFAULT 'New',
  PRIMARY KEY (`EOInumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
";

$conn->query($create_eoi_table);

$message = "";

/* Handle delete and status update actions */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'delete_by_job') {
        $delete_job_reference = trim($_POST['delete_job_reference'] ?? '');

        if (preg_match('/^[A-Za-z0-9]{5}$/', $delete_job_reference)) {
            $stmt = $conn->prepare("DELETE FROM eoi WHERE job_reference = ?");
            $stmt->bind_param("s", $delete_job_reference);
            $stmt->execute();

            $message = $stmt->affected_rows . " EOI record(s) deleted for job reference " . clean_output($delete_job_reference) . ".";
            $stmt->close();
        } else {
            $message = "Please enter a valid 5-character job reference.";
        }
    }

    if ($action === 'update_status') {
        $eoi_number = (int)($_POST['EOInumber'] ?? 0);
        $new_status = $_POST['status'] ?? '';

        if ($eoi_number > 0 && in_array($new_status, ['New', 'Current', 'Final'])) {
            $stmt = $conn->prepare("UPDATE eoi SET status = ? WHERE EOInumber = ?");
            $stmt->bind_param("si", $new_status, $eoi_number);
            $stmt->execute();

            $message = "EOI #" . $eoi_number . " status updated to " . clean_output($new_status) . ".";
            $stmt->close();
        } else {
            $message = "Invalid status update.";
        }
    }
}

/* Sort field whitelist */
$allowed_sort_fields = [
    'EOInumber' => 'EOInumber',
    'job_reference' => 'job_reference',
    'first_name' => 'first_name',
    'last_name' => 'last_name',
    'status' => 'status'
];

$sort = $_GET['sort'] ?? 'EOInumber';

if (!array_key_exists($sort, $allowed_sort_fields)) {
    $sort = 'EOInumber';
}

$sort_sql = $allowed_sort_fields[$sort];

/* Search filters */
$search_job_reference = trim($_GET['job_reference'] ?? '');
$search_first_name = trim($_GET['first_name'] ?? '');
$search_last_name = trim($_GET['last_name'] ?? '');

$where = [];
$params = [];
$types = "";

if ($search_job_reference !== '') {
    $where[] = "job_reference = ?";
    $params[] = $search_job_reference;
    $types .= "s";
}

if ($search_first_name !== '') {
    $where[] = "first_name LIKE ?";
    $params[] = "%" . $search_first_name . "%";
    $types .= "s";
}

if ($search_last_name !== '') {
    $where[] = "last_name LIKE ?";
    $params[] = "%" . $search_last_name . "%";
    $types .= "s";
}

$sql = "SELECT * FROM eoi";

if (count($where) > 0) {
    $sql .= " WHERE " . implode(" AND ", $where);
}

$sql .= " ORDER BY $sort_sql";

$stmt = $conn->prepare($sql);

if (count($params) > 0) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();

$pageTitle = "Manage EOIs - MediaFlare";
$pageStyles = "";

include "header.inc";
include "nav.inc";
?>

<main class="section-container">
    <h1>Manage Expressions of Interest</h1>

    <p>
        Logged in as <strong><?php echo clean_output($_SESSION['username'] ?? 'Manager'); ?></strong>
        | <a href="logout.php">Logout</a>
    </p>

    <?php if ($message !== ''): ?>
        <p><strong><?php echo $message; ?></strong></p>
    <?php endif; ?>

    <section>
        <h2>Search and Sort EOIs</h2>

        <form action="manage.php" method="get" novalidate>
            <p>
                <label for="job_reference">Job Reference</label><br>
                <input type="text" id="job_reference" name="job_reference"
                       value="<?php echo clean_output($search_job_reference); ?>">
            </p>

            <p>
                <label for="first_name">First Name</label><br>
                <input type="text" id="first_name" name="first_name"
                       value="<?php echo clean_output($search_first_name); ?>">
            </p>

            <p>
                <label for="last_name">Last Name</label><br>
                <input type="text" id="last_name" name="last_name"
                       value="<?php echo clean_output($search_last_name); ?>">
            </p>

            <p>
                <label for="sort">Sort By</label><br>
                <select id="sort" name="sort">
                    <option value="EOInumber" <?php if ($sort === 'EOInumber') echo 'selected'; ?>>EOI Number</option>
                    <option value="job_reference" <?php if ($sort === 'job_reference') echo 'selected'; ?>>Job Reference</option>
                    <option value="first_name" <?php if ($sort === 'first_name') echo 'selected'; ?>>First Name</option>
                    <option value="last_name" <?php if ($sort === 'last_name') echo 'selected'; ?>>Last Name</option>
                    <option value="status" <?php if ($sort === 'status') echo 'selected'; ?>>Status</option>
                </select>
            </p>

            <p>
                <input type="submit" value="Search">
                <a href="manage.php">Show All EOIs</a>
            </p>
        </form>
    </section>

    <section>
        <h2>Delete EOIs by Job Reference</h2>

        <form action="manage.php" method="post" novalidate>
            <input type="hidden" name="action" value="delete_by_job">

            <p>
                <label for="delete_job_reference">Job Reference</label><br>
                <input type="text" id="delete_job_reference" name="delete_job_reference">
            </p>

            <p>
                <input type="submit" value="Delete EOIs for this Job Reference">
            </p>
        </form>
    </section>

    <section class="manage-eoi-section">
        <h2>EOI Results</h2>

        <?php if ($result && $result->num_rows > 0): ?>
            <div class="eoi-table-wrapper">
                <table class="eoi-table">
                    <thead>
                        <tr>
                            <th>EOI Number</th>
                            <th>Job Ref</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>DOB</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Skills</th>
                            <th>Other Skills</th>
                            <th>Status</th>
                            <th>Update Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo clean_output($row['EOInumber']); ?></td>
                                <td><?php echo clean_output($row['job_reference']); ?></td>
                                <td><?php echo clean_output($row['first_name']); ?></td>
                                <td><?php echo clean_output($row['last_name']); ?></td>
                                <td><?php echo clean_output($row['date_of_birth']); ?></td>
                                <td><?php echo clean_output($row['gender']); ?></td>
                                <td>
                                    <?php
                                    echo clean_output(
                                        $row['street_address'] . ', ' .
                                        $row['suburb'] . ' ' .
                                        $row['state'] . ' ' .
                                        $row['postcode']
                                    );
                                    ?>
                                </td>
                                <td><?php echo clean_output($row['email']); ?></td>
                                <td><?php echo clean_output($row['phone']); ?></td>
                                <td><?php echo clean_output($row['skills']); ?></td>
                                <td><?php echo clean_output($row['other_skills']); ?></td>
                                <td><?php echo clean_output($row['status']); ?></td>
                                <td>
                                    <form action="manage.php" method="post" novalidate>
                                        <input type="hidden" name="action" value="update_status">
                                        <input type="hidden" name="EOInumber" value="<?php echo clean_output($row['EOInumber']); ?>">

                                        <select name="status">
                                            <option value="New" <?php if ($row['status'] === 'New') echo 'selected'; ?>>New</option>
                                            <option value="Current" <?php if ($row['status'] === 'Current') echo 'selected'; ?>>Current</option>
                                            <option value="Final" <?php if ($row['status'] === 'Final') echo 'selected'; ?>>Final</option>
                                        </select>

                                        <input type="submit" value="Update">
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p>No EOI records found.</p>
        <?php endif; ?>
    </section>
</main>

<?php
$stmt->close();
$conn->close();
include "footer.inc";
?>