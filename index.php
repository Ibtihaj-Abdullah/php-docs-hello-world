<?php

echo "Hello World!";
<?php

// Initialize MySQL connection
$con = mysqli_init();
mysqli_ssl_set($con, NULL, NULL, "./BaltimoreCyberTrustRoot.crt.pem", NULL, NULL);

// Connection credentials
$server = "app1-server.mysql.database.azure.com"; // Replace with your server name
$username = "kzuvscxtkl"; // Replace with your username
$password = "{your_password}"; // Replace with your password
$database = "{your_database}"; // Replace with your database name

// Connect to the Azure MySQL database
if (mysqli_real_connect($con, $server, $username, $password, $database, 3306, NULL, MYSQLI_CLIENT_SSL)) {
    // SQL query to fetch data
    $query = "SELECT name FROM users LIMIT 1"; // Adjust table and column as needed
    $result = mysqli_query($con, $query);

    if ($result) {
        // Fetch and display data
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Name: " . htmlspecialchars($row['name']) . "<br>";
        }
    } else {
        echo "Error fetching data: " . mysqli_error($con);
    }
} else {
    echo "Connection failed: " . mysqli_connect_error();
}

// Close the connection
mysqli_close($con);

?>
