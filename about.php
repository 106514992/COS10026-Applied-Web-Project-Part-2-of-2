<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Creative Digital Media Agency</title>
    <link rel="stylesheet" href="assets/style.css" />
    <link rel="icon" href="assets/favicon.ico">

    <!-- Embedded CSS -->
    <style>
        .about-hero {
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav aria-label="Main navigation">
        <img src="assets/mediaflare_logo.svg" alt="MediaFlare logo" height="40" />
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="jobs.php">Job Description</a></li>
            <li><a href="apply.php">Apply</a></li>
            <li><a href="about.php">About</a></li>
        </ul>
    </nav>

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

        <!-- Team Members - Definition List -->
        <section class="section-container">
            <h2 class="section-title">Team Members &amp; Contributions</h2>
            <dl class="member-list">

                <dt>
                    Zobair Mirranay<br>
                    <!-- Inline CSS -->
                    <p class="student-id"
                        style="display:inline-block; background:#1a1a2e; color:#fff; font-family:monospace; font-size:0.85rem; padding:2px 8px; border-radius:4px;">
                        Student ID: [103979488]</p>
                </dt>
                <dd>
                    <strong>Page:</strong> About (about.html)<br>
                    <strong>Role:</strong> Team lead, page structure, CSS styling<br>
                    <blockquote class="quote-block">
                        <p class="original">"دانش نور است و نادانی تاریکی."</p>
                        <p class="translation">English: "Knowledge is light and ignorance is darkness." — Afghan proverb
                        </p>
                    </blockquote>
                </dd>

                <dt>
                    Ivan Strmecki<br>
                    <p class="student-id"
                        style="display:inline-block; background:#1a1a2e; color:#fff; font-family:monospace; font-size:0.85rem; padding:2px 8px; border-radius:4px;">
                        Student ID: [104548449]</p>
                </dt>
                <dd>
                    <strong>Page:</strong> Apply (apply.html)<br>
                    <strong>Role:</strong> Form design, HTML5 validation, Flexbox layout<br>
                    <blockquote class="quote-block">
                        <p class="original">"Tko uči, taj ne griješi uzalud."</p>
                        <p class="translation">English: "He who learns does not err in vain." — Croatian proverb</p>
                    </blockquote>
                </dd>

                <dt>
                    Sam O'Connor<br>
                    <p class="student-id"
                        style="display:inline-block; background:#1a1a2e; color:#fff; font-family:monospace; font-size:0.85rem; padding:2px 8px; border-radius:4px;">
                        Student ID: [104605182]</p>
                </dt>
                <dd>
                    <strong>Page:</strong> Home (index.html) &amp; Jira Management<br>
                    <strong>Role:</strong> Homepage design, project management<br>
                    <blockquote class="quote-block">
                        <p class="original">"Níl aon tinteán mar do thinteán féin."</p>
                        <p class="translation">English: "There's no fireplace like your own fireplace." — Irish proverb
                        </p>
                    </blockquote>
                </dd>

                <dt>
                    Charlie Payne<br>
                    <p class="student-id"
                        style="display:inline-block; background:#1a1a2e; color:#fff; font-family:monospace; font-size:0.85rem; padding:2px 8px; border-radius:4px;">
                        Student ID: [106514992]</p>
                </dt>
                <dd>
                    <strong>Page:</strong> Jobs (jobs.html)<br>
                    <strong>Role:</strong> Job listings, semantic HTML structure<br>
                    <blockquote class="quote-block">
                        <p class="original">"Le travail, c'est la liberté."</p>
                        <p class="translation">English: "Work is freedom." — French saying</p>
                    </blockquote>
                </dd>

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

    <!-- Footer from index.html -->
    <footer>
        <p><a href="https://cos10026group4.atlassian.net/jira/software/projects/SCRUM/summary">Jira Project</a></p>
        <p><a href="https://106514992.github.io/COS10026-Applied-Web-Project-Part-1-of-2/index.html">Live site link</a>
        </p>
        <p><a href="https://github.com/106514992/COS10026-Applied-Web-Project-Part-1-of-2">GitHub Repository</a></p>
        <p><a href="mailto:info@mediaflare.com.au"
                aria-label="Email us at info@mediaflare.com.au">info@mediaflare.com.au</a></p>
    </footer>


</body>

</html>