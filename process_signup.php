

<?php
// Sign Up Page PHP

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // TODO: Process the form data (e.g., validate, store in database, etc.)
    
    // Connect to database
    $conn = new mysqli('localhost', 'upask', 'upser' , 'upask');
    $query = "INSERT INTO user(username, password, email)
        VALUES ('$name', '$password', '$email');";
        mysqli_query($conn,$query);

    /* Display submitted data
    echo "Name: " . $name . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Password: " . $password . "<br>";
    */
    
    //Redirect to Success Page
    header( 'Location: success.html' ) ;
}
?>