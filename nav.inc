<!-- Navigation -->
<nav aria-label="Main navigation">
    <a href="index.php">
        <img src="images/mediaflare_logo.svg" alt="MediaFlare logo" height="40" />
    </a>

    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="jobs.php">Job Description</a></li>
        <li><a href="apply.php">Apply</a></li>
        <li><a href="about.php">About</a></li>

        <li class="align-right"><a href="manage.php">Manage</a></li>

        <?php if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true): ?>
            <li><a href="login.php">Log in</a></li>
        <?php else: ?>
            <li><a href="logout.php">Log out</a></li>
        <?php endif; ?>
    </ul>
</nav>