
<?php
error_reporting(E_ALL);
require_once 'database.php';

//$result = mysqli_query($link, "SELECT * FROM name, contacts, positions WHERE  name.id=contacts.id AND name.id=positions.id");
$columnl=strval($_POST[0]);
$c=strval($_POST[2]);
$result = mysqli_query($link, "SELECT * FROM name, contacts, positions WHERE $_POST[0] LIKE '$_POST[2]%'  AND name.id=contacts.id AND name.id=positions.id ORDER BY $_POST[0]");
//$result = mysqli_query($link, "SELECT * FROM name, contacts, positions WHERE SUBSTRING(first_name, 1, $_POST[1])='$_POST[2]' AND name.id=contacts.id AND name.id=positions.id");
// $result += mysqli_query($link, "INSERT INTO `contacts` (`id`, `mobile_phone`, `inside_phone`, `email`) VALUES ($_POST[0], \"$_POST[5]\", \"$_POST[6]\", \"$_POST[7]\")");
// $result += mysqli_query($link, "INSERT INTO `positions` (`id`, `unit`, `position`) VALUES ($_POST[0], \"$_POST[8]\", \"$_POST[9]\")");
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
$result=json_encode($data);
echo $result;
$link->close();
?>
