<!DOCTYPE html>
<html>
<head>
  <title>Forum Home</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center">Welcome to the Forum</h2>
         class="text-center">User ID: <?php session_start(); echo $_SESSION['user_id']; ?></p> 
      </div>
    </div>
  </div>
  <h2>Create Forum Post</h2>

<form action="insert_post.php" method="POST">
  <label for="title">Post Title:</label>
  <input type="text" id="title" name="title" required><br><br>

  <label for="content">Post Text:</label><br>
  <textarea id="content" name="content" required></textarea><br><br>
  <input type="content" value="Add Tags"><br><br>
  <input type="submit" value="Submit">
</form>
</body>
</html>
