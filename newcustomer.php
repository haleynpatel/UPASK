<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>HS Banks</title>
    <nav>
        <li><a href="index.php">Home</a></li>
        <li><a href="customerdata.php">View Customers</a></li>
        <li><a href="customeraccounts.php">View Accounts</a></li>
        <li><a href="createcustomer.php">Create Customer</a></li>
    </nav>
</head>
<!-- include css and js files -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>
<link rel="stylesheet" href="styles.css">

<?php
    $conn = new mysqli('localhost', 'upask', 'upser' , 'upask');

    if(isset($_POST["submit"]))
    {
        $cssn = $_POST["cssn"];
        $first_name = $_POST["fname"];
        $middle_name = $_POST["mname"];
        $query = "INSERT INTO user(username, password, email)
        VALUES ('$cssn', '$first_name', '$middle_name');";
        mysqli_query($conn,$query);
    }
?>
<div>
<h3>You have successfully added customer: </h3>
<table>
    <tr>
        <th>user</th>
        <th>pass</th>
        <th>email</th>
    </tr>
    <tr>
        <td><?php echo $cssn; ?></td>
        <td><?php echo $first_name; ?></td>
        <td><?php echo $middle_name; ?></td>
    </tr>
</table>
</div>