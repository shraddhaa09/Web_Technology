<?php
require_once "../db.php";

$message = "";

if(isset($_POST['generate']))
{
    $customerId = $_POST['customerId'];
    $previousReading = $_POST['previousReading'];
    $currentReading = $_POST['currentReading'];
    $billDate = $_POST['billDate'];

    $unitsConsumed = $currentReading - $previousReading;

    if($unitsConsumed < 0)
    {
        $message = "Current Reading cannot be less than Previous Reading.";
    }
    else
    {
        // Bill Calculation

        if($unitsConsumed <= 100)
        {
            $totalBill = $unitsConsumed * 3;
        }
        else if($unitsConsumed <= 200)
        {
            $totalBill = (100 * 3) + (($unitsConsumed - 100) * 5);
        }
        else
        {
            $totalBill = (100 * 3) +
                         (100 * 5) +
                         (($unitsConsumed - 200) * 7);
        }

        $sql = "INSERT INTO bill
        (
            customerId,
            previousReading,
            currentReading,
            unitsConsumed,
            totalBill,
            billDate
        )

        VALUES
        (
            '$customerId',
            '$previousReading',
            '$currentReading',
            '$unitsConsumed',
            '$totalBill',
            '$billDate'
        )";

        if(mysqli_query($conn,$sql))
        {
            $message = "Bill Generated Successfully";
        }
        else
        {
            $message = mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Generate Bill</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card">

<div class="card-header bg-success text-white">

<h3>Generate Electricity Bill</h3>

</div>

<div class="card-body">

<?php
if($message!="")
{
?>

<div class="alert alert-info">

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
type="number"
name="customerId"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>Previous Reading</label>

<input
type="number"
name="previousReading"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>Current Reading</label>

<input
type="number"
name="currentReading"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>Bill Date</label>

<input
type="date"
name="billDate"
class="form-control"
required>

</div>

<div class="col-md-12">

<input
type="submit"
name="generate"
value="Generate Bill"
class="btn btn-success">

<a href="viewBill.php"
class="btn btn-secondary">

View Bills

</a>

</div>

</div>

</form>

</div>

</div>

</div>

</body>

</html>