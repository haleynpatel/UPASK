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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the selected tag from the form
  $tagId = $_POST['tag'];

  // Fetch usernames and emails associated with the selected tag
  $query = "SELECT DISTINCT user.username, user.email
            FROM user
            INNER JOIN usertag ON user.user_id = usertag.user_id1
            WHERE usertag.tag_id1 = '$tagId'";

  $result = mysqli_query($connection, $query);

  // Display the list of usernames and emails
  if (mysqli_num_rows($result) > 0) {
    echo "<h2>User List:</h2>";
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
      $username = $row['username'];
      $email = $row['email'];
      echo "<li>Username: $username, Email: $email</li>";
    }
    echo "</ul>";
  } else {
    echo "<p>No users found for the selected tag.</p>";
  }

  // Close the database connection
  mysqli_close($connection);
}
?>
