<?php include 'header.php'; ?>
<body>
<form action="submit.php" method="post">
    <label for="department">Department:</label>
    <input type="text" id="department" name="department">
    <div class="container">
      <h2>Choose Your Skills:</h2>
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
// Close the database connection
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


