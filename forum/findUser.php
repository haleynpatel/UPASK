<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPask</title>
    <link rel="stylesheet" href="mainpage/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="../hackathon/images/favicon.webp" width="100" height="100">
    <script src="https://kit.fontawesome.com/109c440300.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header-top" id="top">
        <div class="top-left">
            Visit the official UPS website <a href="https://www.ups.com/us/en/global.page"><strong></strong>here</a>.
        </div>
        <div class="top-right">
            <button type="button">
                <img src="mainpage/images/settings.png" height="15em" width="15em" />
                Settings
              </button>
              <button type="button">
                <img src="mainpage/images/notification.png" height="15em" width="15em" />
                Activity
              </button>

           <button onclick='window.location.href = "../tagpage/tagpage.html"'>
                <img src="mainpage/images/goodicon.png"  height="15em" width="15em" />
                Tags
              </button>

              <button onclick='window.location.href = "../profile/profile.html"'>
                <img src="mainpage/images/profile.png"  height="15em" width="15em" />
                Profile
              </button>
        </div>
    </div>
    <div class="header-bottom">
      <div class="bottom-right">
          <a href="forumHome.php" target="_blank" class="button-link">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/UPS_Logo_Shield_2017.svg/859px-UPS_Logo_Shield_2017.svg.png" style="cursor: pointer;" width="50em">
          </a>
        </div>
  <title>User Information</title>
  <style>
    /* Global Styles */
    
    /* Form Styles */
    form {
      width: 300px;
      padding: 20px;
      background-color: #f2f2f2;
      border-radius: 5px;
      margin: 0 auto;
      position:absolute;
      left:40px;
      top:200px;
    }
   
    label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
    }
   
    input[type="text"], select {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      margin-bottom: 10px;
    }
   
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
   
    input[type="submit"]:hover {
      background-color: #45a049;
    }
   
    /* Footer Styles */
    footer {
      background-color: #FFB500;
      color: #fff;
      padding: 20px;
      text-align: center;
      margin-top: auto;
    }
  </style>
</head>
<body>
<form action="userlist.php" method="post">
    <div class="container">
      <h2>Connect with a Skilled User:</h2>
      <div class="profile">
      <?php

$servername = "localhost";
$username = "upask";
$password = "upser";
$dbname = "upask";
$connection = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}
// Fetch tags from the "tags" table
$query = "SELECT * FROM tag";
$result = mysqli_query($connection, $query);
$tags = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!-- HTML code for the dropdown menu -->
<select name="tag">
  <?php foreach ($tags as $tag) : ?>
    <option value="<?php echo $tag['tag_id']; ?>"><?php echo $tag['tag_name']; ?></option>
  <?php endforeach; ?>
</select>


<?php

mysqli_close($connection);
?>

      </div>
      <div id="selectedSkills">
        <input type="hidden" id="tagIds" name="tagIds" value="">
      </div>
    </div>
    <input type="submit" value="Add">
  </form>
</body>


