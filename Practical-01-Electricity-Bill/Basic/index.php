<?php
$bill = "";
$units = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $units = $_POST["units"];

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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electricity Bill Calculator</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Electricity Bill Calculator</h1>

    <form action="" method="POST">

        <label for="units">Enter Units Consumed</label>

        <input
            type="number"
            id="units"
            name="units"
            min="0"
            placeholder="Enter Units"
            required
            value="<?php echo $units; ?>">

        <button type="submit">
            Calculate Bill
        </button>

    </form>

    <?php
    if ($bill !== "") {
    ?>

    <div class="result">

        <h2>Bill Details</h2>

        <p><strong>Units Consumed:</strong> <?php echo $units; ?></p>

        <p><strong>Total Bill:</strong> <?php echo number_format($bill, 2); ?></p>

    </div>

    <?php
    }
    ?>

</div>

</body>
</html>