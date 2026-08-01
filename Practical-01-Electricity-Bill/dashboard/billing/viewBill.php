<?php
require_once "../db.php";

$sql = "SELECT * FROM bill ORDER BY billId DESC";
$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>

<head>

<title>View Bills</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card">

<div class="card-header bg-primary text-white">

<h3>Generated Bills</h3>

</div>

<div class="card-body">

<a href="generateBill.php" class="btn btn-success mb-3">

Generate New Bill

</a>

<table class="table table-bordered table-striped">

<thead class="table-dark">

<tr>

<th>Bill ID</th>

<th>Customer ID</th>

<th>Previous</th>

<th>Current</th>

<th>Units</th>

<th>Total Bill</th>

<th>Bill Date</th>

<th>Action</th>

</tr>

</thead>

<tbody>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['billId']; ?></td>

<td><?php echo $row['customerId']; ?></td>

<td><?php echo $row['previousReading']; ?></td>

<td><?php echo $row['currentReading']; ?></td>

<td><?php echo $row['unitsConsumed']; ?></td>

<td>₹<?php echo number_format($row['totalBill'],2); ?></td>

<td><?php echo $row['billDate']; ?></td>

<td>

<a
href="printBill.php?id=<?php echo $row['billId'];?>"
class="btn btn-info btn-sm">

Print

</a>

<a
href="deleteBill.php?id=<?php echo $row['billId'];?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this bill?')">

Delete

</a>

</td>

</tr>

<?php

}

?>

</tbody>

</table>

<a href="../index.php" class="btn btn-secondary">

Dashboard

</a>

</div>

</div>

</div>

</body>

</html>