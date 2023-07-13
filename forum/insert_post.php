<?php
session_start();
$title = $_POST['title'];
$content = $_POST['content'];

// Get the user ID from the session
$user_id = $_SESSION['user_id'];
$servername = "localhost";
$username = "upask";
$password_db = "upser";
$dbname = "upask";

$conn = new mysqli($servername, $username, $password_db, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "INSERT INTO post(user_id, title, content) 
VALUES ('$user_id', '$title', '$content');";
    mysqli_query($conn,$query);
$conn->close();

$conn = new mysqli($servername, $username, $password_db, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
header("Location: forumHome.php");
exit();
?>

