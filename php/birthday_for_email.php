<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');
require_once 'database.php';
$result= mysqli_query($link, "SELECT first_name, second_name, last_name, DAY(birthday), MONTHNAME(birthday) FROM name, contacts, positions WHERE name.id=contacts.id AND name.id=positions.id AND MONTH(name.birthday)=MONTH(NOW()) AND DAY(birthday)=DAY(NOW()) ORDER BY DAY(birthday)");
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
if($data){
foreach($data as &$value){
	$value=implode(" ", $value);
	$value.=" <br> ";
}
$headers = "Content-type: text/html; charset=\"utf-8\"\r\n\";
$headers .= "From: <info@primemilk.by>\r\n";
mail("shatrov@primemilk.by", "День рожденья",  "<h2>Сегодня день рожденья празднует:</h2><h4>".implode("",$data)."</h4>", $headers);
}
$link->close();
?>
