<?php
$pageTitle = "Jobs - Creative Digital Media Agency";
$author = "Charlie Payne";
$pageStyles = '
    <style>
        #jobs-sidebar {
            float: right;
            width: 25%;
            margin: 2rem 0 2rem 2rem;
            padding: 2rem 0;
            margin-right: 2rem;
            border: 2px solid #e94560;
            border-radius: 8px;
            background-color: #e9456013;
        }

        /* Shift aside to be above main content on narrower screens */
        @media (max-width: 899px) {

            #jobs-sidebar {
                order: -1;
                width: 100%;
                margin: 0;
                border: none;
                border-radius: 0;
                padding: 0;
                background-color: #ffffff;
            }

            #jobs-content{
                margin-top: 14rem;
                width: 100%;
            }
        }
    </style>';

include "header.inc";
?>

    <?php include "nav.inc"; ?>

    <!-- Page header -->
    <header class="jobs-hero">
        <div class="hero-shape" aria-hidden="true"></div>
        <h1 id="jobs-page-title">Current Job Openings</h1>
        <p>Positions available with us today</p>
        <div>
            <form id="jobs-search-form" action="jobs.php#jobs-content" method="GET">
                <div class="search-wrapper">
                    <input type="text" name="search_query" value="<?php echo htmlspecialchars($_GET['search_query'] ?? '') ?>" placeholder="Search jobs..." aria-label="Search jobs">
                    <img class="search-icon" src="assets/searchIcon.svg" alt="Search Icon">
                    <a href="jobs.php#jobs-page-title" class="clear-search-wrapper">
                        <img class="clear-search-icon" title="Clear search" src="assets/crossIcon.svg" alt="Clear search">
                    </a>
                </div>
                <button type="submit">Search</button>
            </form>
            
        </div>
    </header>

    <main id="jobs-main" aria-label="Job listings">
        <!-- Aside -->
        <aside id="jobs-sidebar" aria-label="Why work with us">
            <section id="jobs-aside" class="jobs-section-container">
                <h2 style="margin: 1rem 0; font-size: 1.17em;">Why Work With Us?</h2>
                <p>We offer a supportive work environment, professional development opportunities, and flexible
                    working
                    arrangements.</p>
            </section>
        </aside>

        <div id="jobs-content">
        <!-- Job listing details such as key responsibilities, description and requirements generated with Claude AI -->

            <?php
            require_once 'settings.php';
            
            function highlight($text, $search) {
                if ($search == '') return $text;
                // preg_replace(pattern, replacement, subject)
                return preg_replace(
                    '/(' . preg_quote($search, '/') . ')/i',
                    '<mark>$1</mark>',
                    $text);
            }

            $conn = mysqli_connect($host, $username, $password, $dbname);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            } else {
            
            // replace w/ prepared statement
                $search = trim($_GET['search_query'] ?? '');
                $sanitised_search = mysqli_real_escape_string($conn, $search);


                // if something has been searched for, only show results that match it, otherwise show all results
                if ($search != '') {
                    $search_for = "%$sanitised_search%";
                    $result = mysqli_query($conn, "
                    SELECT * FROM jobs WHERE (
                    title LIKE '$search_for'
                    OR description LIKE '$search_for'
                    OR reference_number LIKE '$search_for'
                    OR JSON_SEARCH(LOWER(key_responsibilities), 'one', LOWER('$search_for')) IS NOT NULL
                    OR JSON_SEARCH(LOWER(requirements_essential), 'one', LOWER('$search_for')) IS NOT NULL
                    OR JSON_SEARCH(LOWER(requirements_preferable), 'one', LOWER('$search_for')) IS NOT NULL
                    )"
                    );
                } else {
                    $result = mysqli_query($conn, "SELECT * FROM jobs");
                }

                // Display search results message
                if ($search != '' && mysqli_num_rows($result) > 0) {
                    if (mysqli_num_rows($result) == 1) {
                        echo "<p style='margin-bottom: 2rem;'><strong>Showing 1 search result for '<em>" . htmlspecialchars($search) . "</em>'</strong></p>";
                    } else {
                    echo "<p style='margin-bottom: 2rem;'><strong>Showing " . mysqli_num_rows($result) . " search results for '<em>" . htmlspecialchars($search) . "</em>'</strong></p>";
                    }
                } elseif ($search != '' && mysqli_num_rows($result) == 0) {
                    echo "<p style='margin-bottom: 2rem;'><strong>No search results found for '<em>" . htmlspecialchars($search) . "</em>'</strong></p>";
                } elseif ($search == '' && mysqli_num_rows($result) > 0) {
                    echo "<p style='margin-bottom: 2rem;'><strong>All job listings</strong></p>";
                }


                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        // Define fields, sanitise and highlight
                        $refnum      = highlight(htmlspecialchars($row['reference_number']), $search);
                        $title       = highlight(htmlspecialchars($row['title']), $search);
                        $description = highlight(htmlspecialchars($row['description']), $search);
                        $salary_min  = htmlspecialchars($row['salary_min']);
                        $salary_max  = htmlspecialchars($row['salary_max']);
                        $reports_to  = highlight(htmlspecialchars($row['reports_to']), $search);
                        $reporting_line = highlight(htmlspecialchars($row['reporting_line']), $search);

                        // Decode JSON into arrays
                        $key_responsibilities  = json_decode($row['key_responsibilities'], true);
                        $requirements_essential   = json_decode($row['requirements_essential'], true);
                        $requirements_preferable  = json_decode($row['requirements_preferable'], true);
                        
                        // Job listing section
                        echo "<section class='jobs-section-container' aria-labelledby='job1-$refnum'>";
                        echo "<header class='job-header'>";
                        echo "<h2 class='section-title' id='job1-$refnum'>$title</h2>";
                        echo "<p class='jobs-reference-number'><strong>Reference Number: </strong> <span>$refnum</span></p>";
                        echo "</header>";

                        echo "<p><strong>Description:</strong> $description</p>";

                        // Salary and reporting section with formatted numbers (for commas)
                        echo "<h3>Salary & Reporting</h3>
                                    <p>$" . number_format($salary_min, 0) . " - $" . number_format($salary_max, 0) . " per year</p>
                                    <p style=\"margin-bottom: 0.7rem;\"> Reports to $reports_to</p>
                                    <p>$reporting_line</p>";

                        // Responsibilities section
                        echo "<h3>Key Responsibilities</h3>";
                        echo "<ul>";
                        foreach ($key_responsibilities as $responsibility) {
                            echo "<li>" . highlight(htmlspecialchars($responsibility), $search) . "</li>";
                        }
                        echo "</ul>";

                        // Requirements
                        // Essential requirements:
                        echo "<h3>Requirements</h3>
                                <h4>Essential</h4>
                                <ol>";
                        foreach ($requirements_essential as $requirement) {
                            echo "<li>" . highlight(htmlspecialchars($requirement), $search) . "</li>";
                        }
                        echo "</ol>";

                        // Preferable requirements:
                        echo "<h4>Preferable</h4>";
                        echo "<ul>";
                        foreach ($requirements_preferable as $requirement) {
                            echo "<li>" . highlight(htmlspecialchars($requirement), $search) . "</li>";
                        }
                        echo "</ul>";
                        echo "</section>";
                    }
                } else {
                    if ($search != '') {
                        echo "<p>No job listings found matching your search for '<strong>" . htmlspecialchars($search) . "</strong>'.</p>";
                    } else {
                        echo "<p>No job listings available at the moment. Please check back later.</p>";
                    }
                }
            }
            mysqli_close($conn);
            ?>
        </div>
    </main>

<?php include "footer.inc"; ?>