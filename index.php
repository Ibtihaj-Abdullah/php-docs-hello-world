<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo "Hello World!<br>";
$con = mysqli_init();
mysqli_ssl_set($con, NULL, NULL, "./DigiCertGlobalRootCA.crt.pem", NULL, NULL);
$server = "app1-server.mysql.database.azure.com";
$username = "kzuvscxtkl"; 
$password = "D5XB9kA2Ja\$VLoRw"; 
$database = "app1-database"; 

if (mysqli_real_connect($con, $server, $username, $password, $database, 3306, NULL, MYSQLI_CLIENT_SSL)) {
    echo "Database connection successful!<br>";
    $query = "SELECT name FROM users";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Display results in an HTML table
        echo "<h2>User List</h2>";
        echo "<table border='1'><tr><th>Name</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . htmlspecialchars($row['name']) . "</td></tr>";
        }   
        echo "</table>";
    } else {
        echo "No data found in the users table.";
    }
    mysqli_free_result($result);
} else {
    echo "Connection failed: " . mysqli_connect_error();
}
mysqli_close($con);
?>
