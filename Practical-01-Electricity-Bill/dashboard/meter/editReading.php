<?php
require_once "../db.php";

$id = $_GET['id'];

$result = mysqli_query($conn,
"SELECT * FROM meterreading WHERE readingId='$id'");

$row = mysqli_fetch_assoc($result);

$message = "";

if(isset($_POST['update']))
{
    $customerId = $_POST['customerId'];
    $previousReading = $_POST['previousReading'];
    $currentReading = $_POST['currentReading'];
    $readingDate = $_POST['readingDate'];

    $unitsConsumed = $currentReading - $previousReading;

    if($unitsConsumed < 0)
    {
        $message = "Current Reading must be greater than Previous Reading.";
    }
    else
    {
        $sql = "UPDATE meterreading
                SET
                customerId='$customerId',
                previousReading='$previousReading',
                currentReading='$currentReading',
                unitsConsumed='$unitsConsumed',
                readingDate='$readingDate'
                WHERE readingId='$id'";

        if(mysqli_query($conn,$sql))
        {
            header("Location:viewReading.php");
            exit();
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

<title>Edit Meter Reading</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card">

<div class="card-header bg-warning">

<h3>Edit Meter Reading</h3>

</div>

<div class="card-body">

<?php
if($message!="")
{
?>

<div class="alert alert-danger">

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
value="<?php echo $row['customerId']; ?>"
required>

</div>

<div class="col-md-6 mb-3">

<label>Previous Reading</label>

<input
type="number"
name="previousReading"
class="form-control"
value="<?php echo $row['previousReading']; ?>"
required>

</div>

<div class="col-md-6 mb-3">

<label>Current Reading</label>

<input
type="number"
name="currentReading"
class="form-control"
value="<?php echo $row['currentReading']; ?>"
required>

</div>

<div class="col-md-6 mb-3">

<label>Reading Date</label>

<input
type="date"
name="readingDate"
class="form-control"
value="<?php echo $row['readingDate']; ?>"
required>

</div>

<div class="col-md-12">

<input
type="submit"
name="update"
value="Update Reading"
class="btn btn-warning">

<a href="viewReading.php"
class="btn btn-secondary">

Back

</a>

</div>

</div>

</form>

</div>

</div>

</div>

</body>

</html>