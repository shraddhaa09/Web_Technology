<?php
require_once "../db.php";

$message = "";

if(isset($_POST['save']))
{
    $customerId = $_POST['customerId'];
    $previousReading = $_POST['previousReading'];
    $currentReading = $_POST['currentReading'];
    $readingDate = $_POST['readingDate'];

    $unitsConsumed = $currentReading - $previousReading;

    if($unitsConsumed < 0)
    {
        $message = "Current Reading cannot be less than Previous Reading.";
    }
    else
    {
        $sql = "INSERT INTO meterreading
        (
            customerId,
            previousReading,
            currentReading,
            unitsConsumed,
            readingDate
        )

        VALUES
        (
            '$customerId',
            '$previousReading',
            '$currentReading',
            '$unitsConsumed',
            '$readingDate'
        )";

        if(mysqli_query($conn,$sql))
        {
            $message = "Meter Reading Saved Successfully";
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

<title>Add Meter Reading</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card">

<div class="card-header bg-primary text-white">

<h3>Add Meter Reading</h3>

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

<label>Reading Date</label>

<input
type="date"
name="readingDate"
class="form-control"
required>

</div>

<div class="col-md-12">

<input
type="submit"
name="save"
value="Save Reading"
class="btn btn-primary">

<a href="viewReading.php"
class="btn btn-secondary">

View Readings

</a>

</div>

</div>

</form>

</div>

</div>

</div>

</body>

</html>