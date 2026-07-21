<?php
include("config/database.php");

$customerName = "";
$customerType = "";
$units = "";
$bill = "";
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $customerName = trim($_POST["customerName"]);
    $customerType = $_POST["customerType"];
    $units = (int)$_POST["units"];

    // Bill Calculation
    if ($customerType == "Domestic") {

        if ($units <= 50) {
            $bill = $units * 3.50;
        }
        elseif ($units <= 150) {
            $bill = (50 * 3.50) + (($units - 50) * 4.00);
        }
        elseif ($units <= 250) {
            $bill = (50 * 3.50) + (100 * 4.00) + (($units - 150) * 5.20);
        }
        else {
            $bill = (50 * 3.50) + (100 * 4.00) + (100 * 5.20) + (($units - 250) * 6.50);
        }

    } else {

        if ($units <= 100) {
            $bill = $units * 5.50;
        }
        elseif ($units <= 300) {
            $bill = (100 * 5.50) + (($units - 100) * 7.00);
        }
        else {
            $bill = (100 * 5.50) + (200 * 7.00) + (($units - 300) * 8.50);
        }

    }

    $sql = "INSERT INTO electricity_bills
            (customer_name, customer_type, units, total_bill)
            VALUES
            ('$customerName','$customerType','$units','$bill')";

    if(mysqli_query($conn,$sql)){
        $message = "Bill Saved Successfully.";
    }
    else{
        $message = "Error : ".mysqli_error($conn);
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Electricity Bill Calculator</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/style.css">

</head>

<body class="bg-light">

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-7">

<div class="card shadow">

<div class="card-header bg-primary text-white text-center">

<h2>Electricity Bill Calculator</h2>

</div>

<div class="card-body">

<?php
if($message!=""){
?>

<div class="alert alert-success">
<?php echo $message; ?>
</div>

<?php
}
?>

<form method="POST">

<div class="mb-3">

<label class="form-label">
Customer Name
</label>

<input
type="text"
class="form-control"
name="customerName"
required
value="<?php echo $customerName; ?>">

</div>

<div class="mb-3">

<label class="form-label">
Customer Type
</label>

<select
class="form-select"
name="customerType"
required>

<option value="">Select Customer Type</option>

<option value="Domestic"
<?php if($customerType=="Domestic") echo "selected"; ?>>
Domestic
</option>

<option value="Commercial"
<?php if($customerType=="Commercial") echo "selected"; ?>>
Commercial
</option>

</select>

</div>

<div class="mb-3">

<label class="form-label">
Units Consumed
</label>

<input
type="number"
class="form-control"
name="units"
min="0"
required
value="<?php echo $units; ?>">

</div>

<div class="d-grid">

<button
class="btn btn-primary"
type="submit">

Calculate & Save Bill

</button>

</div>

</form>

<hr>

<h3 class="text-center mb-3">
Saved Bills
</h3>
<?php

$sql = "SELECT * FROM electricity_bills ORDER BY id DESC";

$result = mysqli_query($conn, $sql);

?>

<div class="table-responsive">

<table class="table table-bordered table-hover table-striped">

    <thead class="table-dark">

        <tr>

            <th>ID</th>
            <th>Customer Name</th>
            <th>Customer Type</th>
            <th>Units</th>
            <th>Total Bill (₹)</th>
            <th>Date</th>

        </tr>

    </thead>

    <tbody>

<?php

if(mysqli_num_rows($result) > 0)
{

    while($row = mysqli_fetch_assoc($result))
    {

?>

<tr>

    <td><?php echo $row["id"]; ?></td>

    <td><?php echo $row["customer_name"]; ?></td>

    <td><?php echo $row["customer_type"]; ?></td>

    <td><?php echo $row["units"]; ?></td>

    <td>₹<?php echo number_format($row["total_bill"],2); ?></td>

    <td><?php echo $row["created_at"]; ?></td>

</tr>

<?php

    }

}
else
{

?>

<tr>

<td colspan="6" class="text-center">

No Bills Found

</td>

</tr>

<?php

}

?>

    </tbody>

</table>

</div>

</div>

</div>

</div>

</div>

</div>

<?php

mysqli_close($conn);

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>