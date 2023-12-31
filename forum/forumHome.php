<?php
session_start();
$servername = "localhost";
$username = "upask";
$password_db = "upser";
$dbname = "upask";
$conn = new mysqli($servername, $username, $password_db, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['commentContent'])) {
    // Retrieve form data
    $commentContent = $_POST['commentContent'];
    $postId = $_POST['postId'];
    $userId = $_SESSION['user_id'];
    $stmt = $conn->prepare("INSERT INTO comment (post_id, user_id, content) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $postId, $userId, $commentContent);
    $stmt->execute();
    $stmt->close();
}

// Fetch posts from the database
$sql = "SELECT * FROM post ORDER BY post_id DESC";
$result = $conn->query($sql);

?>


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
    <div class="header-bottom">
        <div class="bottom-right">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1b/UPS_Logo_Shield_2017.svg/859px-UPS_Logo_Shield_2017.svg.png" style="cursor: pointer;" width="50em"></a>
        </div>

        <div class="bottom-middle">
            <input type="text" id="search" placeholder="Search threads...">
            <i class="fa fa-search" id="search-button"></i>
        </div>
        
        <div class="bottom-right">
            <button onclick='window.location.href = "findUser.php"'><strong>Find User</strong></button>
        </div>
    </div>
    
    <div class="container">

    <div class="tags">
        <span>Popular Tags</span>
        <input type="submit" id="tag" value="Java">
        <input type="submit" id="tag" value="C++">
        <input type="submit" id="tag" value="Python">
        <input type="submit" id="tag" value="Node.js">
        <input type="submit" id="tag" value="Ansible">
        <input type="submit" id="tag" value="Linux">
        <input type="submit" id="tag" value="MySQL">
        <input type="submit" id="tag" value="React">
    </div>

    <div id="post">
    <h1>Create Post </h1>
    <form action="insert_post.php" method="POST">
        <label for="title">Title:</label><br>
    <input type="text" id="title" name="title" required><br><br>

    <label for="content">Text:</label><br>
    <textarea id="content" name="content" rows="5" cols = "100" required></textarea><br><br>

        <label for="tags">Tags:</label><br>
     <input type="text" id="tags" name="tags" placeholder="Add Tags"><br><br>
    <input style="cursor: pointer" type="submit" value="Submit">
    </form>
    </div>
<?php
// Display posts from the passed $result variable
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $post_title = $row['title'];
        $post_content = $row['content'];
        $post_id = $row['post_id'];
        $like_count = 0;
        $user_id = $row['user_id'];
        $usernameQuery = "SELECT username FROM user WHERE user_id = $user_id";
        $usernameResult = mysqli_query($conn, $usernameQuery);

        $row = mysqli_fetch_assoc($usernameResult);
        $username = $row['username'];
        
        echo '<div id="post">';
        echo "<h1>$post_title</h1>";
        echo "<h2> $username</h2>";
        echo "<p> $post_content</p>";
        echo '<div class="social-icons">
                <form action="'.$_SERVER['PHP_SELF'].'" method="POST">
                    <input type="hidden" name="postId" value="'.$post_id.'">
                    <input type="commenttext" name="commentContent" placeholder="Enter your reply" required>
                    <button type="submit" style="cursor: pointer;">Add Comment</button>
                </form><br>
                <i class="fa-regular fa-heart" style="cursor: pointer;"></i>
                <i class="fa-regular fa-comment" style="cursor: pointer;"></i>
                <i class="fa-regular fa-share-from-square" style="cursor: pointer;"></i>
            </div>';

        $commentsQuery = "SELECT * FROM comment WHERE post_id = $post_id";
        $commentsResult = mysqli_query($conn, $commentsQuery);

        if ($commentsResult && mysqli_num_rows($commentsResult) > 0) {
            echo '<div class = "comment"><h3>Comments:</h3>';

            while ($commentRow = mysqli_fetch_assoc($commentsResult)) {
                $commentContent = $commentRow['content'];
                $commentUserId = $commentRow['user_id'];
                $usernameQuery = "SELECT username FROM user WHERE user_id = $commentUserId";
                $usernameResult = mysqli_query($conn, $usernameQuery);
                if($usernameResult){
                    $row = mysqli_fetch_assoc($usernameResult);
                    $commentUserId = $row['username'];
                }
                echo "<p>$commentUserId : $commentContent</p>";
            }
            echo '</div>';
        } else {
            echo "<p>No comments yet.</p>";
        }
        echo '</div>';

    }
    $conn->close();
} else {
    echo "No posts available.";
}
?>
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

