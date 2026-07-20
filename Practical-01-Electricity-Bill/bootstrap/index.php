<?php
$bill = "";
$units = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $units = $_POST["units"];

    if ($units <= 50) {
        $bill = $units * 3.5;
    } elseif ($units <= 150) {
        $bill = (50 * 3.5) + (($units - 50) * 4);
    } elseif ($units <= 250) {
        $bill = (50 * 3.5) + (100 * 4) + (($units - 150) * 5.2);
    } else {
        $bill = (50 * 3.5) + (100 * 4) + (100 * 5.2) + (($units - 250) * 6.5);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Electricity Bill Calculator</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">
                    <h2>Electricity Bill Calculator</h2>
                </div>

                <div class="card-body">

                    <form method="POST">

                        <div class="mb-3">

                            <label for="units" class="form-label">
                                Enter Units Consumed
                            </label>

                            <input
                                type="number"
                                class="form-control"
                                id="units"
                                name="units"
                                min="0"
                                placeholder="Enter Units"
                                required
                                value="<?php echo $units; ?>">

                        </div>

                        <div class="d-grid">

                            <button class="btn btn-primary" type="submit">
                                Calculate Bill
                            </button>

                        </div>

                    </form>

                    <?php if($bill !== "") { ?>

                    <div class="alert alert-success mt-4">

                        <h4 class="alert-heading">
                            Bill Details
                        </h4>

                        <hr>

                        <p>
                            <strong>Units Consumed :</strong>
                            <?php echo $units; ?>
                        </p>

                        <p>
                            <strong>Total Bill :</strong>
                            ₹<?php echo number_format($bill,2); ?>
                        </p>

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