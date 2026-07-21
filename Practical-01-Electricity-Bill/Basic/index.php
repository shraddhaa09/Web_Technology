<?php
$bill = 0;

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
        $bill = $units * 3.5;
    elseif($units <= 150)
        $bill = (50*3.5) + (($units-50)*4);
    elseif($units <= 250)
        $bill = (50*3.5) + (100*4) + (($units-150)*5.2);
    else
        $bill = (50*3.5) + (100*4) + (100*5.2) + (($units-250)*6.5);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Electricity Bill Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<h2>Electricity Bill Calculator</h2>
<h3>Standard Meter Slab</h3>

<table border="1" cellpadding="5">
<tr>
    <th>Units</th>
    <th>Rate (₹/Unit)</th>
</tr>
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
</table>

<br>

<form method="post">

<label>Customer ID</label>
<input type="text" name="custid" required>

<label>Customer Name</label>
<input type="text" name="name" required>

<label>Address</label>
<input type="text" name="address" required>

<label>Customer Type</label>
<select name="type">
    <option>Domestic</option>
    <option>Commercial</option>
</select>

<label>Bill Date</label>
<input type="date" name="date" required>

<label>Previous Meter Reading</label>
<input type="number" name="previous" required>

<label>Current Meter Reading</label>
<input type="number" name="current" required>

<input type="submit" name="calculate" value="Calculate Bill">

</form>

<?php
if(isset($_POST['calculate']))
{
?>
<div class="result">
<h3>Bill Details</h3>

<p><b>Customer ID:</b> <?php echo $custid; ?></p>
<p><b>Customer Name:</b> <?php echo $name; ?></p>
<p><b>Address:</b> <?php echo $address; ?></p>
<p><b>Customer Type:</b> <?php echo $type; ?></p>
<p><b>Bill Date:</b> <?php echo $date; ?></p>
<p><b>Previous Reading:</b> <?php echo $previous; ?></p>
<p><b>Current Reading:</b> <?php echo $current; ?></p>
<p><b>Units Consumed:</b> <?php echo $units; ?></p>
<p><b>Total Bill:</b> ₹<?php echo number_format($bill,2); ?></p>

</div>
<?php
}
?>

</div>

</body>
</html>