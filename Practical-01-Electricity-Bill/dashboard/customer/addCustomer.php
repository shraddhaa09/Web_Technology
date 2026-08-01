<?php
require_once "../../db.php";
$message = "";

if(isset($_POST['save']))
{
    $customer_id = $_POST['customer_id'];
    $customer_name = $_POST['customer_name'];
    $customer_type = $_POST['customer_type'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $meter_number = $_POST['meter_number'];
    $connection_date = $_POST['connection_date'];
    $status = $_POST['status'];

    $sql = "INSERT INTO customer
    (
        customer_id,
        customer_name,
        customer_type,
        address,
        mobile,
        email,
        meter_number,
        connection_date,
        status
    )

    VALUES
    (
        '$customer_id',
        '$customer_name',
        '$customer_type',
        '$address',
        '$mobile',
        '$email',
        '$meter_number',
        '$connection_date',
        '$status'
    )";

    if(mysqli_query($conn,$sql))
    {
        $message="Customer Added Successfully";
    }
    else
    {
        $message="Error : ".mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Add Customer</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card">

<div class="card-header bg-primary text-white">

<h3>Add Customer</h3>

</div>

<div class="card-body">

<?php

if($message!="")
{
?>

<div class="alert alert-success">

<?php echo $message; ?>

</div>

<?php
}
?>

<form method="POST">

<div class="row">

<div class="col-md-6 mb-3">

<label>Customer ID</label>

<input
type="text"
name="customer_id"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>Customer Name</label>

<input
type="text"
name="customer_name"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>Customer Type</label>

<select
name="customer_type"
class="form-control">

<option>Domestic</option>

<option>Commercial</option>

</select>

</div>

<div class="col-md-6 mb-3">

<label>Mobile</label>

<input
type="text"
name="mobile"
class="form-control">

</div>

<div class="col-md-6 mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control">

</div>

<div class="col-md-6 mb-3">

<label>Meter Number</label>

<input
type="text"
name="meter_number"
class="form-control">

</div>

<div class="col-md-12 mb-3">

<label>Address</label>

<textarea
name="address"
class="form-control"></textarea>

</div>

<div class="col-md-6 mb-3">

<label>Connection Date</label>

<input
type="date"
name="connection_date"
class="form-control">

</div>

<div class="col-md-6 mb-3">

<label>Status</label>

<select
name="status"
class="form-control">

<option>Active</option>

<option>Inactive</option>

</select>

</div>

<div class="col-md-12">

<input
type="submit"
name="save"
value="Save Customer"
class="btn btn-primary">

<a href="../index.php"
class="btn btn-secondary">

Dashboard

</a>

</div>

</div>

</form>

</div>

</div>

</div>

</body>

</html>