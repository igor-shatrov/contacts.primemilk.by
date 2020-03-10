
<?php
error_reporting(E_ALL);
require_once 'database.php';


$result = mysqli_query($link, "INSERT INTO `name` (`id`, `first_name`, `second_name`, `last_name`, `birthday`) VALUES ($_POST[0], \"$_POST[1]\", \"$_POST[2]\", \"$_POST[3]\", \"$_POST[4]\")");
$result += mysqli_query($link, "INSERT INTO `contacts` (`id`, `mobile_phone`, `inside_phone`, `email`) VALUES ($_POST[0], \"$_POST[5]\", \"$_POST[6]\", \"$_POST[7]\")");
$result += mysqli_query($link, "INSERT INTO `positions` (`id`, `unit`, `position`) VALUES ($_POST[0], \"$_POST[8]\", \"$_POST[9]\")");
//echo $_POST[5];
echo $result;
$link->close();
?>
