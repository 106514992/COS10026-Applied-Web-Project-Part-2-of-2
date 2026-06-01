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

<body>
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
            <form class="home-search-form" action="jobs.html" method="get">
                <div class="home-search-row">
                    <div class="home-search-field">
                        <label for="site-search">Search jobs:</label>
                        <input type="text" id="site-search" name="search" placeholder="Enter a role title">
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
                    <tr>
                        <td>Web Design</td>
                        <td>User-friendly layouts and branding</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>Front-End Development</td>
                        <td>Accessible and responsive pages</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>Digital Content</td>
                        <td>Creative campaigns and media production</td>
                        <td>2</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"><strong>Total Current Openings</strong></td>
                        <td>5</td>
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