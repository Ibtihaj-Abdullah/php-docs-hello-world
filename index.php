<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Hello World!<br>";

// Initialize MySQL connection
$con = mysqli_init();
mysqli_ssl_set($con, NULL, NULL, "./DigiCertGlobalRootCA.crt.pem", NULL, NULL); // Ensure the certificate path is correct

// Connection credentials
$server = "app1-server.mysql.database.azure.com"; // Replace with your server name
$username = "kzuvscxtkl"; // Replace with your username
$password = "D5XB9kA2Ja\$VLoRw"; // Ensure special characters are escaped
$database = "app1-database"; // Replace with your database name

// Attempt to connect to the database
if (mysqli_real_connect($con, $server, $username, $password, $database, 3306, NULL, MYSQLI_CLIENT_SSL)) {
    echo "Database connection successful!<br>";

    // SQL query to fetch data from the 'users' table
    $query = "SELECT user_id, name FROM users";
    $result = mysqli_query($con, $query);

    // Check if the query returned any rows
    if ($result && mysqli_num_rows($result) > 0) {
        // Display results in an HTML table
        echo "<h2>User List</h2>";
        echo "<table border='1'><tr><th>User ID</th><th>Name</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . htmlspecialchars($row['user_id']) . "</td><td>" . htmlspecialchars($row['name']) . "</td></tr>";
        }
        
        echo "</table>";
    } else {
        echo "No data found in the users table.";
    }

    // Free the result set
    mysqli_free_result($result);
} else {
    echo "Connection failed: " . mysqli_connect_error();
}

// Close the connection
mysqli_close($con);
?>
