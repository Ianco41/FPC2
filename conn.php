
<?php
// Attempt to connect to MS Access via ODBC
$dsn = 'MyAccessdb'; // Use the name of your ODBC DSN
$access_username = '';  // Username if required, else leave empty
$access_password = '';  // Password if required, else leave empty

$access_conn = odbc_connect($dsn, $access_username, $access_password);

// If ODBC connection fails, use MySQL instead
if (!$access_conn) {
    $servername = "localhost"; // Change to your MySQL database host
    $mysql_username = "root"; // Change to your MySQL database username
    $mysql_password = ""; // Change to your MySQL database password
    $dbname = "database3"; // Change to your MySQL database name

    // Using MySQLi
    $mysql_conn = mysqli_connect($servername, $mysql_username, $mysql_password, $dbname);
    
    if (!$mysql_conn) {
        die("Both MS Access and MySQL connections failed.");
    }

    //echo "Connected to MySQL!";
    $conn = $mysql_conn; // Assign MySQL connection to $conn
    $db_type = "mysql"; // Set database type
} else {
    //echo "Connected to MS Access!";
    $conn = $access_conn; // Assign MS Access connection to $conn
    $db_type = "access"; // Set database type
}
?>

