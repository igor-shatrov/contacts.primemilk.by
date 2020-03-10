<?php
error_reporting(E_ALL);
require_once 'database.php';

$result = mysqli_query($link,"SELECT MAX(id) AS id FROM name");
$data= mysqli_fetch_all($result, MYSQLI_ASSOC);
$result=json_encode($data);
echo $result;
$link->close();
?>
