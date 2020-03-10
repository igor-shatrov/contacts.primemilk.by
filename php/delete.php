<?php
error_reporting(E_ALL);
require_once 'database.php';
if(file_exists ("/var/www/contacts.primemilk.by/photo/".$_POST[0].".jpg")){
unlink("/var/www/contacts.primemilk.by/photo/".$_POST[0].".jpg");
}
$result = mysqli_query($link, "DELETE FROM name WHERE id=$_POST[0]");
$result += mysqli_query($link, "DELETE FROM contacts WHERE id=$_POST[0]");
$result += mysqli_query($link, "DELETE FROM positions WHERE id=$_POST[0]");

echo $result;
$link->close();
?>
