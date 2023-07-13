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

$input = $_GET['q'];

// Prepare and execute the query to fetch tag suggestions
$query = "SELECT tag_name FROM tags WHERE tag_name LIKE '%$input%'";
$result = mysqli_query($connection, $query);

// Fetch results and return as JSON
$suggestions = array();
while ($row = mysqli_fetch_assoc($result)) {
  $suggestions[] = $row;
}
echo json_encode($suggestions);

// Close the database connection
mysqli_close($connection);
?>
