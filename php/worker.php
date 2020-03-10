<?php
error_reporting(E_ALL);
require_once 'database.php';

$id = strval($_POST[0]);
$sql = "SELECT * FROM  contacts, name, positions WHERE name.id=$id AND name.id=contacts.id AND name.id=positions.id";
$result = mysqli_query($link, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
$result=json_encode($data);
echo $result;
$link->close();
?>
