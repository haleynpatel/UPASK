<!DOCTYPE html>
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


<body>
    <div>
        <h3>Add New Customer</h3><br>
        <form action="newcustomer.php" class="row g-3" method="post" autocomplete="off">
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">username*</label>
            <input type="text" class="col-sm-2" name="cssn" required value="">
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">password*</label>
            <input type="text" class="col-sm-2" name="fname" required value="">
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">email</label>
            <input type="text" class="col-sm-2" name="mname" value="">
        </div>
        <div class="row mb-3">
            <button type="submit" class="col-sm-2" name="submit">Submit</button>
        </div>
        </form>
    </div>
  </body>
</html>