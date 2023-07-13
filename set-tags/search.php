<?php
// Assuming you have a MySQL database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";


// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Retrieve the skill input from the form
$skill = $_POST['skill'];


// Prepare and execute the query
$sql = "SELECT * FROM users WHERE skill LIKE '%$skill%'";
$result = $conn->query($sql);


// Display the results
if ($result->num_rows > 0) {
    echo "<h2>Users with the skill: $skill</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row["name"] . "</li>";
    }
    echo "</ul>";
} else {
    echo "<p>No users found with the skill: $skill</p>";
}


// Close the connection
$conn->close();
?>
