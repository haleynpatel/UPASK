<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $tagId = $_POST['tag'];

  $usertagQuery = "INSERT INTO usertag (user_id1, tag_id1) VALUES ('$userId', '$tagId')";
    mysqli_query($connection, $usertagQuery);
  mysqli_close($connection);

  header("Location: tagpage.php");
}
?>
