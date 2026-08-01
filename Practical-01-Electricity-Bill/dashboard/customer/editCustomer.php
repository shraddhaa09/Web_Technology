<?php
require_once "../db.php";

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM customer WHERE customer_id='$id'");

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{

    $name = $_POST['customer_name'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    mysqli_query($conn,"
    UPDATE customer
    SET
        customer_name='$name',
        mobile='$mobile',
        address='$address'
    WHERE customer_id='$id'
    ");

    header("Location:viewCustomer.php");

}
?>

<!DOCTYPE html>

<html>

<head>

<title>Edit Customer</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card">

<div class="card-header bg-warning">

<h3>Edit Customer</h3>

</div>

<div class="card-body">

<form method="POST">

<label>Name</label>

<input
type="text"
name="customer_name"
value="<?php echo $row['customer_name'];?>"
class="form-control mb-3">

<label>Mobile</label>

<input
type="text"
name="mobile"
value="<?php echo $row['mobile'];?>"
class="form-control mb-3">

<label>Address</label>

<textarea
name="address"
class="form-control mb-3"><?php echo $row['address'];?></textarea>

<input
type="submit"
name="update"
value="Update Customer"
class="btn btn-warning">

<a href="viewCustomer.php" class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</div>

</body>

</html>