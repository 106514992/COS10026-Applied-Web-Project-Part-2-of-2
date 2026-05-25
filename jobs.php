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
        @media (max-width: 821px) {

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
            <form id="jobs-search-form" action="jobs.php" method="GET">
                <div class="search-wrapper">
                    <input type="text" name="search_query" value="<?php echo htmlspecialchars($_GET['search_query'] ?? '') ?>" placeholder="Search jobs..." aria-label="Search jobs">
                    <img class="search-icon" src="assets/searchIcon.svg" alt="Search Icon">
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
        <!-- job listing details such as key responsibility, description and requirements generated with Claude AI -->

            <?php
            require_once 'settings.php';
            
            $conn = mysqli_connect($host, $username, $password, $dbname);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            } else {
            
                $search = htmlspecialchars(trim($_GET['search_query'] ?? ''));
                $sanitised_search = trim(mysqli_real_escape_string($conn, $search));

                // if something has been searched for, only show results that match it, otherwise show all results
                if ($search != '') {
                    $search_for = "%$sanitised_search%";
                    $result = mysqli_query($conn, "
                    SELECT * FROM jobs WHERE (title LIKE '$search_for'
                    OR description LIKE '$search_for'
                    OR JSON_SEARCH(LOWER(key_responsibilities), 'one', LOWER('$search_for')) IS NOT NULL
                    OR JSON_SEARCH(LOWER(requirements_essential), 'one', LOWER('$search_for')) IS NOT NULL
                    OR JSON_SEARCH(LOWER(requirements_preferable), 'one', LOWER('$search_for')) IS NOT NULL
                    )"
                    );
                } else {
                    $result = mysqli_query($conn, "SELECT * FROM jobs");
                    
                }

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        // Define fields and sanitise
                        $refnum = htmlspecialchars($row['reference_number']);
                        $title = htmlspecialchars($row['title']);
                        $description = htmlspecialchars($row['description']);
                        $salary_min = htmlspecialchars($row['salary_min']);
                        $salary_max = htmlspecialchars($row['salary_max']);
                        $reports_to = htmlspecialchars($row['reports_to']);
                        
                        // Decode JSON into arrays
                        $key_responsibilities = json_decode($row['key_responsibilities'], true);
                        $requirements_essential = json_decode($row['requirements_essential'], true);
                        $requirements_preferable = json_decode($row['requirements_preferable'], true);
                        
                        // Job listing section
                        echo "<section class='jobs-section-container' aria-labelledby='job1-$refnum'>";
                        echo "<header class='job-header'>";
                        echo "<h2 class='section-title' id='job1-$refnum'>$title</h2>";
                        echo "<p class='jobs-reference-number'><strong>Reference Number: </strong> <span>$refnum</span></p>";
                        echo "</header>";

                        echo "<p><strong>Description:</strong> $description</p>";

                        echo "<h3>Salary & Reporting</h3>
                                    <p>Salary: $$salary_min - $$salary_max per year</p>
                                    <p>Reports to: $reports_to</p>
                        ";

                        // Responsibilities section
                        echo "<h3>Key Responsibilities</h3>";
                        echo "<ul>";
                        foreach ($key_responsibilities as $responsibility) {
                            echo "<li>$responsibility</li>";
                        }
                        echo "</ul>";

                        // Requirements
                        // Essential requirements:
                        echo "<h3>Requirements</h3>
                                <h4>Essential</h4>
                                <ol>";
                        foreach ($requirements_essential as $requirement) {
                            $req = htmlspecialchars($requirement);
                            echo "<li>$req</li>";
                        }
                        echo "</ol>";

                        // Preferable requirements:
                        echo "<h4>Preferable</h4>";
                        echo "<ul>";
                        foreach ($requirements_preferable as $requirement) {
                            $req = htmlspecialchars($requirement);
                            echo "<li>$req</li>";
                        }
                        echo "</ul>";
                        echo "</section>";
                    }
                }
            }
            mysqli_close($conn);
            ?>

            <!-- Job 1 -->
            <!-- <section class="jobs-section-container" aria-labelledby="job1-sd123">
                <header class="job-header">
                    <h2 class="section-title" id="job1-sd123">Software Developer</h2>
                    <p class="jobs-reference-number"><strong>Reference Number: </strong>SD123</p>
                </header>
                <p><strong>Description:</strong> We are seeking a motivated software developer to build and maintain
                    web applications in a collaborative agile team.</p>
                <h3>Salary & Reporting</h3>
                <p>Salary: $80,000 - $100,000 per year</p>
                <p>Reports to: Senior Development Manager</p>

                <h3>Key Responsibilities</h3>
                <ul>
                    <li>Design, develop, and test web applications</li>
                    <li>Collaborate with cross-functional teams</li>
                    <li>Maintain and improve existing systems</li>
                </ul>

                <h3>Requirements</h3>
                <h4>Essential</h4>
                <ol>
                    <li>Bachelor's degree in IT or related field</li>
                    <li>Experience with HTML, CSS, and JavaScript</li>
                    <li>Strong problem-solving skills</li>
                </ol>

                <h4>Preferable</h4>
                <ul>
                    <li>Experience with React or similar frameworks</li>
                    <li>Knowledge of backend development</li>
                </ul>
            </section> -->
        </div>


    </main>

<?php include "footer.inc"; ?>