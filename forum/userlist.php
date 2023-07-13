<!DOCTYPE html>
<html>
<head>
  <title>Forum Home</title>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPask</title>
    <link rel="stylesheet" href="mainpage/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="../hackathon/images/favicon.webp" width="100" height="100">
    <script src="https://kit.fontawesome.com/109c440300.js" crossorigin="anonymous"></script>
</head>
<body>
</body>
</html>
<body>
<div class="header-top" id="top">
        <div class="top-left">
            Visit the official UPS website <a href="https://www.ups.com/us/en/global.page"><strong></strong>here</a>.
        </div>
        <div class="top-right">
            <button type="button" style="cursor: pointer;">
                <img src="mainpage/images/settings.png" height="15em" width="15em" />
                Settings
              </button>
              <button type="button" style="cursor: pointer;">
                <img src="mainpage/images/notification.png" height="15em" width="15em" />
                Activity
              </button>

           <button onclick='window.location.href = "tagposts/tagpage.php"' style="cursor: pointer;">
                <img src="mainpage/images/goodicon.png"  height="15em" width="15em" /> Tags
              </button>

              <button onclick='window.location.href = "profile/profile.html"' style="cursor: pointer;">
                <img src="mainpage/images/profile.png"  height="15em" width="15em" />
                Profile
              </button>
        </div>
    </div>
    <div class="bottom-right">
          <a href="..forumHome.php" target="_blank" class="button-link">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/UPS_Logo_Shield_2017.svg/859px-UPS_Logo_Shield_2017.svg.png" style="cursor: pointer;" width="50em">
          </a>
        </div>
    </div>
<div class="container">
<div class = "canvas">
<?php
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
    echo '<div class="user-list">';
    echo "<h2>User List:</h2>";
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
      $username = $row['username'];
      $email = $row['email'];
      echo "<li><span class='label'></span> <span class='username'>$username</span> <br></br> <span class='label'>Email:</span> <span class='email'>$email</span></li>";
    }
    echo "</ul>";
    echo '</div>';
  } else {
    echo "<p class='no-users'>No users found for the selected tag.</p>";
  }

  // Close the database connection
  mysqli_close($connection);
}
?>
</div>
    <div class="footer">
        <div class="left-foot">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/UPS_Logo_Shield_2017.svg/859px-UPS_Logo_Shield_2017.svg.png" width="25em" style="cursor: pointer;"></a>
        </div>
        <div class="right-foot" style="cursor: pointer;">
            Terms and conditions | Contact | Help
        </div>
    </div>
</body>
</html>



