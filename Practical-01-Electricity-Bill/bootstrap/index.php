<?php

$customerName = "";
$customerType = "";
$units = "";
$bill = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$customerName = $_POST["customerName"] ?? "";
$customerType = $_POST["customerType"] ?? "";
$units = $_POST["units"] ?? "";

    // Bill Calculation
    if ($units <= 50) {
        $bill = $units * 3.5;
    }
    elseif ($units <= 150) {
        $bill = (50 * 3.5) + (($units - 50) * 4);
    }
    elseif ($units <= 250) {
        $bill = (50 * 3.5) + (100 * 4) + (($units - 150) * 5.2);
    }
    else {
        $bill = (50 * 3.5) + (100 * 4) + (100 * 5.2) + (($units - 250) * 6.5);
    }

    // Commercial customers pay 20% extra
    if ($customerType == "Commercial") {
        $bill = $bill * 1.20;
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

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-lg-6">

<div class="card shadow">

<div class="card-header bg-primary text-white text-center">

<h2>Electricity Bill Calculator</h2>

</div>

<div class="card-body">

<form method="POST">

    <div class="mb-3">
        <label class="form-label">Customer Name</label>

        <input
            type="text"
            class="form-control"
            name="customerName"
            value="<?php echo $customerName; ?>"
            placeholder="Enter Customer Name"
            required>
    </div>

    <div class="mb-3">
        <label class="form-label">Customer Type</label>

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

        <label class="form-label">Units Consumed</label>

        <input
            type="number"
            class="form-control"
            name="units"
            min="0"
            value="<?php echo $units; ?>"
            placeholder="Enter Units"
            required>

    </div>

    <div class="d-grid">
        <button class="btn btn-primary">
            Calculate Bill
        </button>
    </div>

</form>

<?php if($bill!=""){ ?>

<div class="alert alert-success mt-4">

    <h4>Bill Details</h4>
    <hr>

    <p><strong>Customer Name :</strong> <?php echo $customerName; ?></p>

    <p><strong>Customer Type :</strong> <?php echo $customerType; ?></p>

    <p><strong>Units Consumed :</strong> <?php echo $units; ?></p>

    <p><strong>Total Bill :</strong> <?php echo number_format($bill,2); ?></p>

</div>

<?php } ?>

</div>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>