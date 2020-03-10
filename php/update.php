<?php
error_reporting(E_ALL);
require_once 'database.php';

$result = mysqli_query($link, "UPDATE `name` SET  `first_name`=\"$_POST[1]\", `second_name`=\"$_POST[2]\", `last_name`=\"$_POST[3]\", `birthday`=\"$_POST[4]\" WHERE `id`=$_POST[0]");
$result .= mysqli_query($link, "UPDATE `contacts` SET `mobile_phone`=\"$_POST[5]\", `inside_phone`=\"$_POST[6]\", `email`=\"$_POST[7]\" WHERE `id`=$_POST[0]");
$result .= mysqli_query($link, "UPDATE `positions` SET `unit`=\"$_POST[8]\", `position`=\"$_POST[9]\" WHERE `id`=$_POST[0]");
echo $result;
$link->close();
?>
