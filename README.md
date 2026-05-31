# COS10026---Applied-Web-Project-Part-2-of-2


## Task
In a group of 3–4 students, you will enhance your Project Part 1 website by implementing server‑side functionality and database integration, transforming it into a dynamic web application using PHP and MySQL (or equivalent). The detailed functional and technical requirements are provided below this page.


## This Group:   

### G06 – Creative Digital Media Agency   

A creative agency providing web design, branding, and digital content services, recruiting front‑end developers and designers to support client‑focused web projects.   

---

## Setup Instructions

### Requirements
- XAMPP
- A browser (Chrome, Firefox, etc.)

### Steps

1. Copy the repository into your `xampp\htdocs\project2` folder

2. Create the database in phpMyAdmin:
   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Create a new database named: `mediaflare`

3. Import the database:
   - Select the mediaflare database in phpMyAdmin
   - Click **Import**
   -  Import the tables in `\sql`

4. Run the site:
   - Make sure **Apache** and **MySQL** are running in XAMPP
   - Go to http://localhost/project2/index.php in your browser

### Database Credentials
- No password is set for the database
- Other details found in `settings.php`

---

## Updating the Database
When someone makes changes to the database schema or data:
1. Export from phpMyAdmin: **Export > Quick > Format: SQL > Go**
2. Replace/add the relevant files in the `\sql` folder in the repository
3. Commit and push
4. Others pull and re-import manually via phpMyAdmin