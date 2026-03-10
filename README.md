🩸 Rakta Seva Sagar — Blood Donation Management System
A full-stack web application that connects voluntary blood donors with recipients, built to eliminate the need for intermediaries like blood banks. The platform enables real-time donor registration, secure authentication, and seamless management of blood donation requests.

🚀 Features

User Authentication — Secure Sign Up and Sign In with session management
Donor Registration Form — Collects donor details including blood group, DOB, last donated date, phone, and address
Contact Module — Allows users to reach out directly through the platform
Role-based Navigation — Separate views post-login for authenticated users
SQL Injection Prevention — All database queries use prepared statements with parameterized inputs
Responsive UI — Compatible across devices using CSS Flexbox and media queries
Real-time Data Management — Live data updates powered by PHP + MySQL backend


🛠️ Tech Stack
LayerTechnologyFrontendHTML, CSS, JavaScriptBackendPHPDatabaseMySQL (via PHPMyAdmin)ServerApache (XAMPP / localhost)

🗃️ Database Schema
Database name: register
TableFieldssignupname, EMAIL, PASSWORD, phonenosigninEMAIL, PASSWORDformfirstname, lastname, DOB, bgroup, Lastdate, phno, stadd, city, statecontactName, email, subject, msg

📁 Project Structure
BLOOD/
├── login1.PHP              # Login page with session + prepared statements
├── SIGNUP.php              # Registration page
├── index.php               # Main dashboard (Home, About, Services, Gallery, Contact, Team)
├── form.php                # Donor registration form
├── connect.php             # Database connection module
├── conform.html            # Donation confirmation page
├── SIGNUPCONFORM.HTML      # Signup confirmation page
├── contact.html            # Contact page
├── style.css               # Main stylesheet
├── Login And Registration CSS.css  # Auth pages stylesheet
├── app.js                  # Main JavaScript
├── Login And Registration JS.js    # Auth page scripts
└── assets/                 # Images and icons

⚙️ How to Run Locally

Install XAMPP — Download from https://www.apachefriends.org
Start Apache and MySQL from the XAMPP Control Panel
Clone or paste the project into your XAMPP htdocs folder:

   C:/xampp/htdocs/BLOOD/

Create the database:

Open http://localhost/phpmyadmin
Create a database named register
Create the tables as per the schema above


Update connect.php with your local credentials:

php   $servername = "localhost";
   $username = "root";
   $password = "";
   $db = "register";

Run the app:

Open your browser and go to http://localhost/BLOOD/login1.PHP
