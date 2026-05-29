<?php
session_start();

// Connect to the database
require_once 'settings.php';

$conn = new mysqli($host, $username, $password, $dbname);

// Create eoi table if it doesn't exist as required by spec
$conn->query("CREATE TABLE IF NOT EXISTS `eoi` (
    `EOInumber`      INT(11)      NOT NULL AUTO_INCREMENT,
    `job_reference`  VARCHAR(5)   NOT NULL,
    `first_name`     VARCHAR(20)  NOT NULL,
    `last_name`      VARCHAR(20)  NOT NULL,
    `date_of_birth`  VARCHAR(10)  NOT NULL,
    `gender`         ENUM('male','female','prefer-not-to-say') NOT NULL,
    `street_address` VARCHAR(40)  NOT NULL,
    `suburb`         VARCHAR(40)  NOT NULL,
    `state`          ENUM('VIC','NSW','QLD','NT','WA','SA','TAS','ACT') NOT NULL,
    `postcode`       CHAR(4)      NOT NULL,
    `email`          VARCHAR(255) NOT NULL,
    `phone`          VARCHAR(12)  NOT NULL,
    `skills`         VARCHAR(255) NOT NULL,
    `other_skills`   TEXT,
    `status`         ENUM('New','Current','Final') NOT NULL DEFAULT 'New',
    PRIMARY KEY (`EOInumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;");

// Block direct access to this page - must be a POST request from the form as per the spec
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['job_reference'])) {
    header('Location: apply.php');
    exit;
}

// Sanitise Inputs
// Trims whitespace and converts special characters to safe HTML chars
// removes slashes and prevents SQL injection by escaping special characters in a string for use in an SQL statement
function sanitise($value, $conn) {
    return mysqli_real_escape_string($conn, htmlspecialchars(stripslashes(trim($value))));
}

// Pull each field out of $_POST and sanitise it straight away
$job_reference  = sanitise($_POST['job_reference'], $conn);
$first_name     = sanitise($_POST['first_name'], $conn);
$last_name      = sanitise($_POST['last_name'], $conn);
$date_of_birth  = sanitise($_POST['date_of_birth'], $conn);
$gender         = sanitise($_POST['gender'], $conn);
$street_address = sanitise($_POST['street_address'], $conn);
$suburb         = sanitise($_POST['suburb'], $conn);
$state          = sanitise($_POST['state'], $conn);
$postcode       = sanitise($_POST['postcode'], $conn);
$email          = sanitise($_POST['email'], $conn);
$phone          = sanitise($_POST['phone'], $conn);
$other_skills   = sanitise($_POST['other_skills'], $conn);

// Skills come in as an array from the checkboxes (name="skills[]")
$skills_str = implode(',', $_POST['skills'] ?? []);

// Validate
// Check every field and collect problems into $errors.
// If it's not empty at the end, redirect back to the form.
$errors = [];

if ($job_reference === '' || !preg_match('/^[A-Za-z0-9]{5}$/', $job_reference))
    $errors[] = 'Job reference must be exactly 5 alphanumeric characters.';

if ($first_name === '' || !preg_match('/^[A-Za-z]{1,20}$/', $first_name))
    $errors[] = 'First name is required and must be letters only, up to 20 characters.';

if ($last_name === '' || !preg_match('/^[A-Za-z]{1,20}$/', $last_name))
    $errors[] = 'Last name is required and must be letters only, up to 20 characters.';

// Check date matches dd/mm/yyyy, is a real calendar date, and applicant is 18 or older and not in the future
if (!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $date_of_birth)) {
    $errors[] = 'Date of birth must be in dd/mm/yyyy format.';
} else {
    list($dd, $mm, $yyyy) = explode('/', $date_of_birth);
    if (!checkdate((int)$mm, (int)$dd, (int)$yyyy)) {
        $errors[] = 'Date of birth is not a valid date.';
    } else {
        $dob = new DateTime("$yyyy-$mm-$dd");
        $today = new DateTime();
        if ($dob >= $today) {
            $errors[] = 'Date of birth cannot be in the future.';
        } elseif ($today->diff($dob)->y < 18) {
            $errors[] = 'You must be at least 18 years old to apply.';
        }
    }
}

if (!in_array($gender, ['male', 'female', 'prefer-not-to-say']))
    $errors[] = 'Please select a gender.';

if ($street_address === '')
    $errors[] = 'Street address is required.';

if ($suburb === '')
    $errors[] = 'Suburb is required.';

if (!in_array($state, ['VIC','NSW','QLD','NT','WA','SA','TAS','ACT']))
    $errors[] = 'Please select a state.';

if (!preg_match('/^[0-9]{4}$/', $postcode))
    $errors[] = 'Postcode must be exactly 4 digits.';

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // php inbuilt email validation function checks for basic structure of an email address
    $errors[] = 'Please enter a valid email address.';

if (!preg_match('/^[0-9]{8,12}$/', $phone))
    $errors[] = 'Phone must be 8 to 12 digits, numbers only.';

if (empty($_POST['skills']))
    $errors[] = 'Please select at least one skill.';

// If anything failed, redirect back to the form
if (!empty($errors)) {
    $error_message = implode('\n', array_map('addslashes', $errors));
    echo "<script>alert('Please fix the following errors:\\n\\n$error_message'); window.history.back();</script>";
    exit;
}


// Insert the record directly using sanitised values
$sql = "INSERT INTO `eoi`
    (job_reference, first_name, last_name, date_of_birth, gender,
    street_address, suburb, state, postcode, email, phone, skills, other_skills)
    VALUES
    ('$job_reference', '$first_name', '$last_name', '$date_of_birth', '$gender',
    '$street_address', '$suburb', '$state', '$postcode', '$email', '$phone', '$skills_str', '$other_skills')";

if (!$conn->query($sql))
    die('Insert failed: ' . htmlspecialchars($conn->error));

// Grab the auto-generated EOI number so we can show it on the confirmation page
$eoi_number = $conn->insert_id;

$conn->close();

// Confirmation page
// Everything went fine, so show a success page using the shared includes.
$pageTitle = "Application Submitted - MediaFlare";
$pageAuthor = "Ivan Strmecki";
$pageStyles = '<link rel="stylesheet" href="style/style.css" />';

include "header.inc";
?>

<?php include "nav.inc"; ?>

<main>
    <div class="confirmation-box">
        <h1>Application Submitted</h1>
        <p>Thank you, <?php echo htmlspecialchars($first_name . ' ' . $last_name); ?>. Your expression of interest has been received.</p>
        <!-- The EOI number was auto-generated by the database on insert -->
        <div class="eoi-number">EOI #<?php echo (int)$eoi_number; ?></div>
        <p>Please keep your EOI number for your records. We will be in touch at <strong><?php echo htmlspecialchars($email); ?></strong>.</p>

        <!-- A quick summary of everything that was submitted -->
        <table class="summary-table">
            <tr><th>Job Reference</th><td><?php echo htmlspecialchars($job_reference); ?></td></tr>
            <tr><th>Name</th><td><?php echo htmlspecialchars($first_name . ' ' . $last_name); ?></td></tr>
            <tr><th>Date of Birth</th><td><?php echo htmlspecialchars($date_of_birth); ?></td></tr>
            <tr><th>Gender</th><td><?php echo htmlspecialchars(ucfirst(str_replace('-', ' ', $gender))); ?></td></tr>
            <tr><th>Address</th><td><?php echo htmlspecialchars("{$street_address}, {$suburb} {$state} {$postcode}"); ?></td></tr>
            <tr><th>Email</th><td><?php echo htmlspecialchars($email); ?></td></tr>
            <tr><th>Phone</th><td><?php echo htmlspecialchars($phone); ?></td></tr>
            <tr><th>Skills</th><td><?php echo htmlspecialchars(str_replace(',', ', ', $skills_str)); ?></td></tr>
            <?php if ($other_skills !== ''): ?> <!-- because the other skills section is not necessary only show this row if they entered something in the other skills field -->
            <tr><th>Other Skills</th><td><?php echo htmlspecialchars($other_skills); ?></td></tr>
            <?php endif; ?>
            <tr><th>Status</th><td>New</td></tr>
        </table>

        <a href="apply.php">Submit another application</a>
    </div>
</main>

<?php include "footer.inc"; ?>