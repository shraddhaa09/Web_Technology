<?php
require_once "../db.php";

$id = $_GET['id'];

$sql = "SELECT * FROM bill WHERE billId='$id'";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>

<html>

<head>

<title>Print Bill</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{

margin:40px;

}

table{

width:100%;

}

</style>

</head>

<body>

<h2 class="text-center">

Electricity Bill

</h2>

<hr>

<table class="table table-bordered">

<tr>

<th>Bill ID</th>

<td><?php echo $row['billId']; ?></td>

</tr>

<tr>

<th>Customer ID</th>

<td><?php echo $row['customerId']; ?></td>

</tr>

<tr>

<th>Previous Reading</th>

<td><?php echo $row['previousReading']; ?></td>

</tr>

<tr>

<th>Current Reading</th>

<td><?php echo $row['currentReading']; ?></td>

</tr>

<tr>

<th>Units Consumed</th>

<td><?php echo $row['unitsConsumed']; ?></td>

</tr>

<tr>

<th>Total Bill</th>

<td>

₹<?php echo number_format($row['totalBill'],2); ?>

</td>

</tr>

<tr>

<th>Bill Date</th>

<td><?php echo $row['billDate']; ?></td>

</tr>

</table>

<div class="mt-4">

<button
class="btn btn-primary"
onclick="window.print();">

Print Bill

</button>

<a href="viewBill.php"
class="btn btn-secondary">

Back

</a>

</div>

</body>

</html>