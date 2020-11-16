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
$headers = "Content-type: text/html; charset=\"utf-8\"\r\n";
$headers .= "From: <info@primemilk.by>\r\n";
mail("shatrov@primemilk.by", "День рожденья",  "<h2>Сегодня день рожденья празднует:</h2><h4>".implode("",$data)."</h4>", $headers);
mail("dubachinskaya@primemilk.by", "День рожденья",  "<h2>Сегодня день рожденья празднует:</h2><h4>".implode("",$data)."</h4>", $headers);
}
$result= mysqli_query($link, "SELECT first_name, second_name, last_name FROM name, contacts, positions WHERE name.id=contacts.id AND name.id=positions.id AND MONTH(name.birthday)=MONTH(NOW()) AND DAY(birthday)=DAY(NOW()) ORDER BY DAY(birthday)");
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
if($data){
$token="1072197129:AAFzlbtJWQ1zn6odu43YbROMWiJqztq5Qfg";
$chatId="-1001416009314";
$message="Сегодня день рожденья празднует:\xF0\x9F\x8E\x89 %0A<b>";
foreach($data as $value){
$str=implode(' ', $value);
$message.=$str."%0A";
}
$message.="</b>";
fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chatId}&parse_mode=html&text=".$message,"r");
}
$link->close();
?>
