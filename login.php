<?php
$pageTitle = "Jobs - Creative Digital Media Agency";
$author = "Charlie Payne";
$pageStyles = '';

include "header.inc";
?>

    <?php include "nav.inc"; ?>

    <main id="login-main">
        <section id="login-section" class="section-container">

            <!-- Form heading with inline CSS styling -->
            <h1 class="form-heading" style="margin-top: 0.25rem;">Sign in</h1>

            <form id="login-form" action="" method="post" novalidate>

                <!-- Username -->
                <label for="username">Username</label>
                <input type="text" id="username" name="username" maxlength="20" placeholder="Enter username"/>

                <!-- Password -->
                <label for="password">Password</label>
                <input type="password" id="password" name="password" maxlength="100" placeholder="Enter password"/>

                <!-- Form submission controls -->
                <input id="login-submit" type="submit" value="Sign in" />
            </form>

        </section>
    </main>

<?php include "footer.inc"; ?>