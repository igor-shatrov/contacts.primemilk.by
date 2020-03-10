<?php
$uploaddir = '/var/www/contacts.primemilk.by/photo/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
unlink("/var/www/contacts.primemilk.by/photo/".$_POST[0]);
echo '<pre>';
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Возможная атака с помощью файловой загрузки!\n";
}
//file_put_contents("1.jpg", $_FILES['userfile']);
echo 'Некоторая отладочная информация:';
print_r($_FILES);

print "</pre>";
?>
