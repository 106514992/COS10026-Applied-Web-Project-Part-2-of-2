<?php
session_start();
$pageTitle = "About - Creative Digital Media Agency";

$pageStyles = '
<style>
    .about-hero {
        text-align: center;
    }
</style>
';

include "header.inc";
?>  


   <?php include "nav.inc"; ?>
            
        
    

    <!-- Page Header -->
    <header class="about-hero">
        <div class="hero-shape" aria-hidden="true"></div>
        <h1>About Our Team</h1>
        <p>The people behind MediaFlare's web presence</p>
    </header>

    <main>

        <!-- Acknowledgement of Country -->
        <section class="section-container">
            <article class="acknowledgement" role="region" aria-label="Acknowledgement of Country">
                <h2>Acknowledgement of Country</h2>
                <p>
                    MediaFlare acknowledges the Traditional Custodians of the lands on which we live, work, and create.
                    We pay our respects to Elders past, present, and emerging, and recognise the ongoing connection
                    Aboriginal and Torres Strait Islander peoples have to Country, culture, and community.
                    We are committed to inclusive hiring practices and warmly encourage applications from
                    Aboriginal and Torres Strait Islander peoples.
                </p>
            </article>
        </section>

        <!-- Group Info - Nested List -->
        <section class="section-container">
            <h2 class="section-title">Group Information</h2>
            <ul class="group-info-list">
                <li>Group Name: <strong>Group 6 - Creative Digital Media Agency</strong>
                    <ul>
                        <li>Class Day: Thursday</li>
                        <li>Class Time: 2:30pm - 4:30pm</li>
                        <li>Unit: COS10026 - Web Technology Project</li>
                        <li>Semester 1, 2026</li>
                    </ul>
                </li>
            </ul>
        </section>

       <!-- Team Members - Dynamic Database Output -->
<section class="section-container">
    <h2 class="section-title">Team Members &amp; Contributions</h2>

    <dl class="member-list">

        <?php
        require_once("settings.php");

        $conn = mysqli_connect($host, $user, $pwd, $sql_db);

        if (!$conn) {
            echo "<p>Database connection failed.</p>";
        } else {

            $query = "SELECT * FROM about_contributions";

            $result = mysqli_query($conn, $query);

            if ($result) {

                while ($row = mysqli_fetch_assoc($result)) {

                    echo "<dt>";
                    echo $row['member_name'] . "<br>";

                    echo "<p class='student-id'
                    style='display:inline-block; background:#1a1a2e;
                    color:#fff; font-family:monospace;
                    font-size:0.85rem; padding:2px 8px;
                    border-radius:4px;'>";

                    echo "Student ID: [" . $row['student_id'] . "]";
                    echo "</p>";

                    echo "</dt>";

                    echo "<dd>";

                    echo "<strong>Page:</strong> "
                        . $row['assigned_page'] . "<br>";

                    echo "<strong>Project 1 Role:</strong> "
                        . $row['project1_role'] . "<br>";

                    echo "<strong>Project 2 Role:</strong> "
                        . $row['project2_role'] . "<br>";

                    echo "<blockquote class='quote-block'>";

                    echo "<p class='original'>\""
                        . $row['quote_original'] . "\"</p>";

                    echo "<p class='translation'>English: \""
                        . $row['quote_translation'] . "\"</p>";

                    echo "</blockquote>";

                    echo "<p><strong>Dream Job:</strong> "
                        . $row['dream_job'] . "</p>";

                    echo "<p><strong>Coding Snack:</strong> "
                        . $row['coding_snack'] . "</p>";

                    echo "<p><strong>Hometown:</strong> "
                        . $row['hometown'] . "</p>";

                    echo "</dd>";
                }

                mysqli_free_result($result);
            }

            mysqli_close($conn);
        }
        ?>

    </dl>
</section>
        <!-- Group Photo -->
        <section class="section-container">
            <h2 class="section-title">Group Photo</h2>
            <figure class="group-photo" style="max-width: 600px; margin: 0 auto; text-align: center;">
                <img src="assets/Group.photo.jpeg" alt="Group photo of all four MediaFlare team members" width="580" />
                <figcaption>The MediaFlare team — Thursday 2:30pm, Swinburne University, Semester 1 2026</figcaption>
            </figure>
        </section>
        <!-- Fun Facts Table -->
        <section class="section-container">
            <h2 class="section-title">Fun Facts</h2>
            <table class="fun-facts">
                <caption>Get to know the team behind MediaFlare</caption>
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Dream Job</th>
                        <th scope="col">Coding Snack</th>
                        <th scope="col">Hometown</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Zobair Mirranay</td>
                        <td>Full-Stack Developer</td>
                        <td>Pistachios</td>
                        <td>Kabul, Afghanistan</td>
                    </tr>
                    <tr>
                        <td>Ivan Strmecki</td>
                        <td>UX Engineer</td>
                        <td>Coffee &amp; Chocolate</td>
                        <td>Zagreb, Croatia</td>
                    </tr>
                    <tr>
                        <td>Sam O'Connor</td>
                        <td>Tech Lead</td>
                        <td>Cheese &amp; Crackers</td>
                        <td>Dublin, Ireland</td>
                    </tr>
                    <tr>
                        <td>Charlie Payne</td>
                        <td>Creative Director</td>
                        <td>Tim Tams</td>
                        <td>Melbourne, Australia</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

  <?php include "footer.inc"; ?>  