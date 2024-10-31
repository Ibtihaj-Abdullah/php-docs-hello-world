<?php
// Display initial message
echo "Hello World!<br>";

// Initialize MySQL connection
$con = mysqli_init();
mysqli_ssl_set($con, NULL, NULL, "./BaltimoreCyberTrustRoot.crt.pem", NULL, NULL); // Make sure this path is correct

// Connection credentials
$server = "app1-server.mysql.database.azure.com"; // Replace with your server name
$username = "kzuvscxtkl@app1-server"; // Replace with your username, formatted correctly
$password = "D5XB9kA2Ja\$VLoRw"; // Replace with your password
$database = "app1-database"; // Replace with your database name

// Connect to the database
if (mysqli_real_connect($con, $server, $username, $password, $database, 3306, NULL, MYSQLI_CLIENT_SSL)) {
    echo "Database connection successful!<br>";
} else {
    echo "Connection failed: " . mysqli_connect_error();
}

// Close the connection
mysqli_close($con);
?>
