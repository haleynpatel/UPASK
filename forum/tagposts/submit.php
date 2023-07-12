<?php
// Establish database connection
$servername = "localhost";
$username = "upask";
$password = "upser";
$dbname = "upask";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}
session_start();
$userId = $_SESSION['user_id'];
echo $userId;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the values from the form
  $tagId = $_POST['tag'];

    // Prepare and execute the query to insert the data into the usertag table
    $usertagQuery = "INSERT INTO usertag (user_id1, tag_id1) VALUES ('$userId', '$tagId')";
    mysqli_query($connection, $usertagQuery);

  // Close the database connection
  mysqli_close($connection);

  header("Location: tagpagev3.php");
}
?>
