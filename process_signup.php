<?php
    // Sign Up Page PHP
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $conn = new mysqli('localhost', 'upask', 'upser' , 'upask');
        $query = "INSERT INTO user(username, password, email)
            VALUES ('$name', '$password', '$email');";
            mysqli_query($conn,$query);
        //Redirect to Success Page
        header( 'Location: success.html' ) ;
    }
?>