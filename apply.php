<?php
session_start();

$pageTitle = "Apply - Creative Digital Media Agency";
$author = "Ivan Strmecki";
$pageStyles = '
<style>
    /* Pink left-border heading above the form */
    .form-heading {
        font-size: 1.6rem;
        font-weight: 700;
        color: var(--navy, #1a1f36);
        margin-bottom: 1.75rem;
        padding-left: 1rem;
        border-left: 4px solid #e8385a;
        letter-spacing: -0.01em;
        line-height: 1.25;
    }

    .form-heading span {
        display: block;
        font-size: 0.85rem;
        font-weight: 400;
        color: #4a4f6a;
        letter-spacing: 0.02em;
        margin-top: 0.25rem;
    }
</style>
';

// Pull in the shared page header, <head>, and opening <body> tag
include "header.inc";
?>

<?php include "nav.inc"; ?>

<main id="apply-main">
    <section id="apply-section" class="section-container">

        <h1 class="form-heading" style="margin-top: 0.25rem;">Job Application
            <span>Fill in the form below — all fields marked as required must be completed.</span>
        </h1>



        <!-- The form posts to process_eoi.php which handles all the validation and DB insert.
             No client-side validation — everything is done server-side. -->
        <form id="apply-form" action="process_eoi.php" method="post" novalidate>

            <!-- Job reference number  -->
            <fieldset id="fieldset-job-ref">
                <legend>Job Ref.</legend>
                <label for="job-ref">Job Reference Number</label>
                <input type="text" id="job-ref" name="job_reference" maxlength="5" placeholder="e.g. AB1C2" aria-describedby="job-ref-hint" />
                <small id="job-ref-hint">Exactly 5 alphanumeric characters.</small>
            </fieldset>

            <!-- Applicant personal details -->
            <fieldset id="fieldset-personal">
                <legend>Personal Details</legend>

                <label for="first-name">First Name</label>
                <input type="text" id="first-name" name="first_name" maxlength="20" placeholder="e.g. John" aria-describedby="first-name-hint" />
                <small id="first-name-hint">Letters only, max 20 characters.</small>

                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" name="last_name" maxlength="20" placeholder="e.g. Smith" aria-describedby="last-name-hint" />
                <small id="last-name-hint">Letters only, max 20 characters.</small>

                <label for="dob">Date of Birth</label>
                <input type="text" id="dob" name="date_of_birth" maxlength="10" placeholder="dd/mm/yyyy" aria-describedby="dob-hint" />
                <small id="dob-hint">Format: dd/mm/yyyy</small>

                <!-- Gender as radio buttons, nested in its own fieldset as required -->
                <fieldset id="fieldset-gender">
                    <legend>Gender</legend>
                    <label><input type="radio" name="gender" value="male" /> Male</label>
                    <label><input type="radio" name="gender" value="female" /> Female</label>
                    <label><input type="radio" name="gender" value="prefer-not-to-say" /> Prefer not to say</label>
                </fieldset>
            </fieldset>

            <!-- Applicant contact and address details -->
            <fieldset id="fieldset-contact">
                <legend>Contact &amp; Address</legend>

                <label for="street-address">Street Address</label>
                <input type="text" id="street-address" name="street_address" maxlength="40" placeholder="e.g. 123 Collins Street" aria-describedby="street-address-hint" />
                <small id="street-address-hint">Max 40 characters.</small>

                <label for="suburb">Suburb / Town</label>
                <input type="text" id="suburb" name="suburb" maxlength="40" placeholder="e.g. Melbourne" aria-describedby="suburb-hint" />
                <small id="suburb-hint">Max 40 characters.</small>

                <!-- State as a dropdown - options are generated from a PHP array so we can easily restore the selected value -->
                <label for="state">State</label>
                <select id="state" name="state">
                    <option value="" disabled selected>Select a state</option>
                    <option value="VIC">VIC</option>
                    <option value="NSW">NSW</option>
                    <option value="QLD">QLD</option>
                    <option value="NT">NT</option>
                    <option value="WA">WA</option>
                    <option value="SA">SA</option>
                    <option value="TAS">TAS</option>
                    <option value="ACT">ACT</option>
                </select>

                <label for="postcode">Postcode</label>
                <input type="text" id="postcode" name="postcode" maxlength="4" placeholder="e.g. 3000" aria-describedby="postcode-hint" />
                <small id="postcode-hint">Exactly 4 digits.</small>

                <label for="email">Email Address</label>
                <input type="text" id="email" name="email" placeholder="e.g. jane.smith@email.com" />

                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" maxlength="12" placeholder="e.g. 0412345678" aria-describedby="phone-hint" />
                <small id="phone-hint">8 to 12 digits, numbers only.</small>
            </fieldset>

              <!-- Applicant skills -->
            <fieldset id="fieldset-skills">
                <legend>Skills</legend>

                <!-- Checkboxes for predefined skills -->
                <!-- Skill list skills were generated with AI assistance, creation of the checkbox form elements was done manually -->
                <fieldset id="fieldset-skill-list">
                    <legend>Skill List</legend>
                    <label><input type="checkbox" name="skills[]" value="html-css" /> HTML &amp; CSS</label>
                    <label><input type="checkbox" name="skills[]" value="javascript" /> JavaScript</label>
                    <label><input type="checkbox" name="skills[]" value="ui-ux-design" /> UI/UX Design</label>
                    <label><input type="checkbox" name="skills[]" value="graphic-design" /> Graphic Design</label>
                    <label><input type="checkbox" name="skills[]" value="branding" /> Branding</label>
                    <label><input type="checkbox" name="skills[]" value="content-creation" /> Content Creation</label>
                    <label><input type="checkbox" name="skills[]" value="seo" /> SEO</label>
                    <label><input type="checkbox" name="skills[]" value="motion-graphics" /> Motion Graphics</label>
                </fieldset>

                <!-- Free-text field for any skills not listed above -->
                <label for="other-skills">Other Skills</label>
                <textarea id="other-skills" name="other_skills" rows="5" placeholder="Describe any additional skills or experience relevant to this role..."></textarea>
            </fieldset>

            <!-- Form submission controls -->
            <input id="apply-submit" type="submit" value="Submit Application" />

        </form>

    </section>
</main>

<?php include "footer.inc"; ?>