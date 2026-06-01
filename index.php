<?php
session_start();
$pageTitle = "Home - MediaFlare";
$author = "Sam O'Connor";
$pageStyles = '
    <link rel="stylesheet" href="styles/style.css">
    <link rel="icon" href="favicon.ico">
    <style>
        .home-search-note {
            margin-top: 0.75rem;
            color: #4a4f6a;
            font-size: 0.95rem;
        }
    </style>
';
include 'header.inc';
?>

    <?php include 'nav.inc'; ?>

    <header class="jobs-hero home-hero">
        <div class="hero-shape" aria-hidden="true"></div>
        <h1 id="home-page-title">MediaFlare</h1>
        <p>Creative ideas for bold digital brands.</p>
        <img src="images/mediaflare_logo.svg" alt="MediaFlare logo" class="home-hero-image">
    </header>

    <main id="home-main">
        <section class="section-container">
            <div class="home-intro">
                <div class="home-intro-text">
                    <h2 class="section-title">Who We Are</h2>
                    <p>
                        MediaFlare is a creative digital media agency specialising in web design, branding,
                        and digital content for modern businesses.
                    </p>
                    <p>
                        We create client-focused digital experiences that are visually engaging, accessible,
                        and built to strengthen brand identity across online platforms.
                    </p>
                </div>
            </div>
        </section>

        <section class="section-container">
            <h2 class="section-title">Search Opportunities</h2>
            <form class="home-search-form" action="jobs.php#jobs-content" method="get">
                <div class="home-search-row">
                    <div class="home-search-field">
                        <label for="site-search">Search jobs:</label>
                        <input type="text" id="site-search" name="search_query" placeholder="Enter a role title">
                    </div>
                    <button type="submit" style="background-color: #e94560; color: #ffffff;">Search</button>
                </div>
                <p class="home-search-note">Start by exploring our current creative and technical roles.</p>
            </form>
        </section>

                <section class="section-container">
            <h2 class="section-title">Why Join MediaFlare?</h2>
            <p class="home-section-text">
                We focus on creativity, collaboration, accessibility and strong digital experiences.
                Our team values thoughtful design, continuous learning, and meaningful client work.
            </p>

            <table class="home-table">
                <caption>MediaFlare team snapshot</caption>
                <thead>
                    <tr>
                        <th scope="col">Team Area</th>
                        <th scope="col">Focus</th>
                        <th scope="col">Openings</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once 'settings.php';

                        $conn = mysqli_connect($host, $username, $password, $dbname);

                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        // Fetch job areas and openings count from db
                        // (2 tables, job_areas and jobs, linked by job_area_id due to use of foreign key)
                        $result = mysqli_query($conn, "
                            SELECT job_areas.name, job_areas.focus, COUNT(jobs.id) as openings 
                            FROM job_areas
                            LEFT JOIN jobs ON jobs.job_area_id = job_areas.id
                            GROUP BY job_areas.id
                            ORDER BY job_areas.name
                        ");


                        // put each job area and openings count into a table
                        $total = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['focus']) . "</td>";
                            echo "<td>" . $row['openings'] . "</td>";
                            echo "</tr>";
                            $total += $row['openings']; //
                        }
                        
                        mysqli_close($conn);
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"><strong>Total Current Openings</strong></td>
                        <td><?php echo $total; ?></td>
                    </tr>
                </tfoot>
            </table>
        </section>

        <div class="section-container">
            <article class="acknowledgement" aria-label="Inclusive employment statement">
                <h2>Inclusive Employment</h2>
                <p>
                    MediaFlare acknowledges the Traditional Custodians of the lands on which we work.
                    We pay our respects to Elders past, present, and emerging, and warmly encourage
                    applications from Aboriginal and Torres Strait Islander peoples.
                </p>
            </article>
        </div>
    </main>

<?php include 'footer.inc'; ?>