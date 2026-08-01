<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "electricity_billing"
);

if(!$conn)
{
    die("Connection Failed");
}

?>