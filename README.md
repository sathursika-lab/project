Setup Instructions – Elite Event Management System
 1. How to Import the Database (phpMyAdmin)

Follow these steps to set up the database:

Open your browser and go to:
 http://localhost/phpmyadmin
Click on "New" (left sidebar)
Create a database named:
 elite_events
Click on the created database
Go to the "Import" tab
Click "Choose File" and select your .sql file
(example: elite_events.sql)
Click "Go"

 Your database with tables (bookings, services, packages, etc.) will be imported successfully.

 2. How to Run the Project Using XAMPP / WAMP
 Step 1: Start Server
Open XAMPP Control Panel or WAMP Server
Start:
Apache
MySQL
 Step 2: Copy Project Files
Go to your server folder:
For XAMPP: C:\xampp\htdocs\
For WAMP: C:\wamp\www\
Paste your project folder:
 elite-event-management
 Step 3: Run the Project

Open your browser and type:

 http://localhost/elite-event-management

🔗 Step 4: Database Connection

Make sure your db.php file has correct settings:

$host = "localhost";
$dbname = "elite_events";
$username = "root";
$password = "";
