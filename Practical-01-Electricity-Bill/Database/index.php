<?php
require_once "db.php";

$bill = 0;
$units = 0;

if(isset($_POST['calculate']))
{
    $custid = $_POST['custid'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $type = $_POST['type'];
    $date = $_POST['date'];

    $previous = (int)$_POST['previous'];
    $current = (int)$_POST['current'];

    $units = $current - $previous;

    if($units <= 50)
    {
        $bill = $units * 3.5;
    }
    elseif($units <= 150)
    {
        $bill = (50 * 3.5) + (($units - 50) * 4);
    }
    elseif($units <= 250)
    {
        $bill = (50 * 3.5) + (100 * 4) + (($units - 150) * 5.2);
    }
    else
    {
        $bill = (50 * 3.5) + (100 * 4) + (100 * 5.2) + (($units - 250) * 6.5);
    }

    $sql = "INSERT INTO bill
    (
    custid,
    name,
    address,
    type,
    bill_date,
    previous_reading,
    current_reading,
    units,
    total_bill
    )
    VALUES
    (
    '$custid',
    '$name',
    '$address',
    '$type',
    '$date',
    '$previous',
    '$current',
    '$units',
    '$bill'
    )";

    mysqli_query($conn,$sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Bill Calculator</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container mt-5 mb-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white text-center">
            <h2>Electricity Bill Calculator</h2>
        </div>

        <div class="card-body">

            <h4 class="text-center mb-3">Standard Meter Slab</h4>

            <table class="table table-bordered table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Units</th>
                        <th>Rate (₹/Unit)</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>0 - 50</td>
                        <td>3.50</td>
                    </tr>

                    <tr>
                        <td>51 - 150</td>
                        <td>4.00</td>
                    </tr>

                    <tr>
                        <td>151 - 250</td>
                        <td>5.20</td>
                    </tr>

                    <tr>
                        <td>Above 250</td>
                        <td>6.50</td>
                    </tr>
                </tbody>
            </table>

            <form method="post">

                <div class="mb-3">
                    <label class="form-label">Customer ID</label>
                    <input type="text" name="custid" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Customer Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Customer Type</label>

                    <select name="type" class="form-select">
                        <option>Domestic</option>
                        <option>Commercial</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Bill Date</label>
                    <input type="date" name="date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Previous Meter Reading</label>
                    <input type="number" name="previous" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Meter Reading</label>
                    <input type="number" name="current" class="form-control" required>
                </div>

                <div class="d-grid">
                    <input
                        type="submit"
                        name="calculate"
                        value="Calculate Bill"
                        class="btn btn-primary">
                </div>

            </form>

            <?php
            if(isset($_POST['calculate']))
            {
            ?>

            <div class="alert alert-success mt-4">

                <h4 class="text-center">Bill Details</h4>

                <p><strong>Customer ID:</strong> <?php echo $custid; ?></p>

                <p><strong>Customer Name:</strong> <?php echo $name; ?></p>

                <p><strong>Address:</strong> <?php echo $address; ?></p>

                <p><strong>Customer Type:</strong> <?php echo $type; ?></p>

                <p><strong>Bill Date:</strong> <?php echo $date; ?></p>

                <p><strong>Previous Meter Reading:</strong> <?php echo $previous; ?></p>

                <p><strong>Current Meter Reading:</strong> <?php echo $current; ?></p>

                <p><strong>Units Consumed:</strong> <?php echo $units; ?></p>

                <hr>

                <h5>Bill Amount: ₹<?php echo number_format($bill,2); ?></h5>

            </div>

            <?php
            }
            mysqli_close($conn);
            ?>

        </div>

    </div>

</div>

</body>
</html>