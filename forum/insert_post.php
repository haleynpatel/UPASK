<?php
session_start();

// Retrieve form data
$title = $_POST['title'];
$content = $_POST['content'];

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Insert post details into the database
// Perform the necessary database query or use an ORM

// Example: Assuming a connection to MySQL database
$servername = "localhost";
$username = "upask";
$password_db = "upser";
$dbname = "upask";

// Create a connection
$conn = new mysqli($servername, $username, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the query to insert post details
//$stmt = $conn->prepare("INSERT INTO post (user_id, title, content) VALUES ('$user_id', '$title', '$content')");
//$stmt->bind_param( $user_id, $title, $content);
//$stmt->execute();

//$stmt->close();
//$conn->close();


$query = "INSERT INTO post(user_id, title, content) 
VALUES ('$user_id', '$title', '$content');";
    mysqli_query($conn,$query);
$conn->close();

$conn = new mysqli($servername, $username, $password_db, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$sql = "SELECT * FROM post ORDER BY post_timestamp DESC";
//$result = $conn->query($sql);

// Include the separate PHP file for the forum display
//include "forumHome.php";

// Refresh the page to display the inserted information
//header("Location: ".$_SERVER['PHP_SELF']);
header("Location: forumHome.php");
exit();
?>

