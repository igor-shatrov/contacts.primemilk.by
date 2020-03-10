<?php
error_reporting(E_ALL);
require_once 'database.php';
$unit = strval($_POST[0]);
$sql = "SELECT name.id, name.first_name, name.second_name, contacts.mobile_phone, contacts.email, positions.position FROM  contacts, name, positions WHERE positions.unit='$unit' AND name.id=contacts.id AND name.id=positions.id  ORDER BY name.first_name";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
$result=json_encode($data);
echo $result;
$link->close();
?>
