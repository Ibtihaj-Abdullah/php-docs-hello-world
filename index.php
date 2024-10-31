<?php
// Display a starting message
echo "Hello World!<br>";

// Initialize MySQL connection
$con = mysqli_init();
mysqli_ssl_set($con, NULL, NULL, "./BaltimoreCyberTrustRoot.crt.pem", NULL, NULL); // Path to SSL certificate

// Connection credentials
$server = "app1-server.mysql.database.azure.com"; // Replace with your Azure MySQL server name
$username = "kzuvscxtkl@app1-server"; // Replace with your username, using the correct format
$password = "D5XB9kA2Ja$VLoRw"; // Replace with your password
$database = "app1-database"; // Replace with your database name

// Connect to the Azure MySQL database
if (mysqli_real_connect($con, $server, $username, $password, $database, 3306, NULL, MYSQLI_CLIENT_SSL)) {
    echo "Connected to the database successfully!<br>";

    // SQL query to fetch data
    $query = "SELECT user_id, name FROM new_table";
    $result = mysqli_query($con, $query);

    if ($result) {
        // Display results in an HTML table
        echo "<h2>User List</h2>";
        echo "<table border='1'>";
        echo "<tr><th>User ID</th><th>Name</th></tr>";
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . htmlspecialchars($row['user_id']) . "</td><td>" . htmlspecialchars($row['name']) . "</td></tr>";
        }
        
        echo "</table>";
    } else {
        echo "Error fetching data.";
    }
} else {
    echo "Connection failed.";
}

// Close the connection
mysqli_close($con);
?>
