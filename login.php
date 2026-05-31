<?php
session_start();

$pageTitle = "Jobs - Creative Digital Media Agency";
$author = "Charlie Payne";
$pageStyles = '';

$login_username = '';
$error = '';

// If page is reloaded after a POST request, process the login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'settings.php';

    $login_username = trim($_POST['username'] ?? '');
    $login_password = $_POST['password'] ?? '';

    if ($login_username === '' || $login_password === '') {
        $error = "Please enter username and password.";
    } else { 
        $conn = mysqli_connect($host, $username, $password, $dbname);
        if (!$conn) {
            $error = "Unable to connect to the system.";
        } else {
            $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE BINARY username = ?");
            mysqli_stmt_bind_param($stmt, "s", $login_username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result) {
                $account = mysqli_fetch_assoc($result);

                if ($account && password_verify($login_password, $account['password'])) {
                    session_regenerate_id(true);
                    $_SESSION['logged_in'] = true;
                    $_SESSION['username'] = $account['username'];
                    header("Location: manage.php");
                    // Check for a valid session in manage.php and redirect back tologin.php if not valid (not logged in)
                    exit();
                } else {
                    $error = "Invalid username or password.";
                }

            } else {
                $error = "Could not verify login (Failed to connect to database)";
            }
        }
    }
}
mysqli_close($conn);

include "header.inc";
?>

    <?php include "nav.inc"; ?>

    <main id="login-main">
        <section id="login-section" class="section-container">

            <!-- Form heading with inline CSS styling -->
            <div class="login-title-wrapper">
                <h1 class="form-heading" style="margin-top: 0.25rem;">Sign in</h1>
                <img src="assets/mediaflare_logo.svg" alt="MediaFlare logo" height="30" draggable="false"/>
            </div>

            <form id="login-form" action="" method="post" novalidate>

                <!-- Username -->
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($login_username) ?>" required maxlength="20" placeholder="Enter username"/>

                <!-- Password -->
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required maxlength="100" placeholder="Enter password"/>
                <?php 
                if ($error != '') {
                   echo '<p id="login-error" role="alert">' . htmlspecialchars($error) . '</p>';
                }
                ?>
                <!-- Form submission controls -->
                <input id="login-submit" type="submit" value="Sign in" />
            </form>

        </section>
    </main>

<?php include "footer.inc"; ?>