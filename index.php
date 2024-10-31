<?php

echo "Hello World!";

// Initialize MySQL connection
$con = mysqli_init();
mysqli_ssl_set($con, NULL, NULL, "./BaltimoreCyberTrustRoot.crt.pem", NULL, NULL);

// Connection credentials
$server = "app1-server.mysql.database.azure.com"; // Replace with your server name
$username = "kzuvscxtkl@app1-server"; // Replace with your username
$password = "D5XB9kA2Ja$VLoRw"; // Replace with your password
$database = "app1-database"; // Replace with your database name

// Connect to the Azure MySQL database
if (mysqli_real_connect($con, $server, $username, $password, $database, 3306, NULL, MYSQLI_CLIENT_SSL)) {
    // SQL query to fetch data
    $query = "SELECT user_id, name FROM new_table";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Display the data
        echo "<h2>User List</h2>";
        echo "<table border='1'>";
        echo "<tr><th>User ID</th><th>Name</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . htmlspecialchars($row['user_id']) . "</td><td>" . htmlspecialchars($row['name']) . "</td></tr>";
        }
        
        echo "</table>";
    } else {
        echo "Error fetching data: " . mysqli_error($con);
    }
} else {
    echo "Connection failed: " . mysqli_connect_error();
}

// Close the connection
mysqli_close($con);
?>
