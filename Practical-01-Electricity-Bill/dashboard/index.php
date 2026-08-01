<?php

require_once "db.php";


// Total Customers

$result = mysqli_query($conn,
"SELECT COUNT(*) AS total FROM customer");

$totalCustomers = mysqli_fetch_assoc($result)['total'];


// Active Customers

$result = mysqli_query($conn,
"SELECT COUNT(*) AS total FROM customer 
WHERE status='Active'");

$activeCustomers = mysqli_fetch_assoc($result)['total'];


// Domestic Customers

$result = mysqli_query($conn,
"SELECT COUNT(*) AS total FROM customer 
WHERE customerType='Domestic'");

$domesticCustomers = mysqli_fetch_assoc($result)['total'];


// Commercial Customers

$result = mysqli_query($conn,
"SELECT COUNT(*) AS total FROM customer 
WHERE customerType='Commercial'");

$commercialCustomers = mysqli_fetch_assoc($result)['total'];


// Total Meter Readings

$result = mysqli_query($conn,
"SELECT COUNT(*) AS total FROM meterreading");

$totalReadings = mysqli_fetch_assoc($result)['total'];


// Total Units Consumed

$result = mysqli_query($conn,
"SELECT SUM(unitsConsumed) AS total FROM meterreading");

$totalUnits = mysqli_fetch_assoc($result)['total'];

if($totalUnits==NULL)
{
    $totalUnits=0;
}


// Total Revenue

$result = mysqli_query($conn,
"SELECT SUM(totalBill) AS total FROM bill");

$totalRevenue = mysqli_fetch_assoc($result)['total'];

if($totalRevenue==NULL)
{
    $totalRevenue=0;
}

?>


<!DOCTYPE html>

<html>

<head>

<title>
Electricity Billing Dashboard
</title>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
rel="stylesheet">


<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
rel="stylesheet">


<style>

body
{
    background:#f5f5f5;
}


.card
{
    border:none;
    border-radius:12px;
    box-shadow:0px 3px 10px #ccc;
}


.card:hover
{
    transform:scale(1.03);
    transition:0.3s;
}


.number
{
    font-size:35px;
    font-weight:bold;
}


</style>


</head>


<body>


<nav class="navbar navbar-dark bg-primary">

<div class="container-fluid">

<a class="navbar-brand">

<i class="bi bi-lightning-charge-fill"></i>

Electricity Billing System

</a>


</div>

</nav>



<div class="container mt-4">


<h2 class="text-center mb-4">

Dashboard

</h2>



<div class="row">


<div class="col-md-3 mb-4">

<div class="card bg-primary text-white">

<div class="card-body text-center">


<i class="bi bi-people-fill display-5"></i>


<h5>
Total Customers
</h5>


<div class="number">

<?php echo $totalCustomers; ?>

</div>


</div>

</div>

</div>





<div class="col-md-3 mb-4">

<div class="card bg-success text-white">

<div class="card-body text-center">


<i class="bi bi-person-check-fill display-5"></i>


<h5>
Active Customers
</h5>


<div class="number">

<?php echo $activeCustomers; ?>

</div>


</div>

</div>

</div>





<div class="col-md-3 mb-4">

<div class="card bg-warning">

<div class="card-body text-center">


<i class="bi bi-house-fill display-5"></i>


<h5>
Domestic
</h5>


<div class="number">

<?php echo $domesticCustomers; ?>

</div>


</div>

</div>

</div>





<div class="col-md-3 mb-4">

<div class="card bg-danger text-white">

<div class="card-body text-center">


<i class="bi bi-building display-5"></i>


<h5>
Commercial
</h5>


<div class="number">

<?php echo $commercialCustomers; ?>

</div>


</div>

</div>

</div>



</div>





<div class="row">


<div class="col-md-4 mb-4">

<div class="card bg-info text-white">

<div class="card-body text-center">


<i class="bi bi-speedometer display-5"></i>


<h5>
Meter Readings
</h5>


<div class="number">

<?php echo $totalReadings; ?>

</div>


</div>

</div>

</div>





<div class="col-md-4 mb-4">

<div class="card bg-dark text-white">

<div class="card-body text-center">


<i class="bi bi-lightning display-5"></i>


<h5>
Total Units
</h5>


<div class="number">

<?php echo $totalUnits; ?>

</div>


</div>

</div>

</div>





<div class="col-md-4 mb-4">

<div class="card bg-success text-white">

<div class="card-body text-center">


<i class="bi bi-currency-rupee display-5"></i>


<h5>
Revenue
</h5>


<div class="number">

₹<?php echo number_format($totalRevenue,2); ?>

</div>


</div>

</div>

</div>



</div>



</div>



</body>

</html>