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
            <!-- job listing details such as key responsibility and description generated with Copilot AI -->

            <!-- Job 1 -->
            <section class="jobs-section-container" aria-labelledby="job1-sd123">
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
            </section>

            <!-- job 2 -->
            <section class="jobs-section-container" aria-labelledby="job2-it456">
                <header class="job-header">
                    <h2 class="section-title" id="job2-it456">IT Support Technician</h2>
                    <p class="jobs-reference-number"><strong>Reference Number: </strong>IT456</p>
                </header>
                <p><strong>Description:</strong> Provide technical support to staff and ensure smooth operation of
                    IT systems across the organisation.</p>

                <h3>Salary & Reporting</h3>
                <p>Salary: $60,000 - $75,000 per year</p>
                <p>Reports to: IT Operations Manager</p>

                <h3>Key Responsibilities</h3>
                <ul>
                    <li>Respond to help desk requests</li>
                    <li>Troubleshoot hardware and software issues</li>
                    <li>Maintain system documentation</li>
                </ul>

                <h3>Requirements</h3>
                <h4>Essential</h4>
                <ol>
                    <li>Diploma in Information Technology or equivalent</li>
                    <li>Strong communication skills</li>
                    <li>Experience with Windows and networking basics</li>
                </ol>

                <h4>Preferable</h4>
                <ul>
                    <li>Certifications such as CompTIA A+</li>
                    <li>Experience in a corporate IT environment</li>
                </ul>
            </section>
        </div>


    </main>

<?php include "footer.inc"; ?>