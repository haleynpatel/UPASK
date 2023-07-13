<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // Validate credentials against the user table in the database
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
    
    // Prepare and execute the query to validate the credentials
    $stmt = $conn->prepare("SELECT user_id FROM user WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        // Login successful, start a session with user_id
        $stmt->bind_result($user_id);
        $stmt->fetch();
        $_SESSION['user_id'] = $user_id;
        
        // Redirect to a dashboard or welcome page
        header("Location: forum/forumHome.php");
        exit();
    } else {
        // Login failed, display an error message
        echo "Invalid email or password.";
    }
    
    $stmt->close();
    $conn->close();
}
?>
