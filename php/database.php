<?php

$link = mysqli_connect('localhost','admininfo','Hombak!!509-q','contacts.primemilk');
mysqli_set_charset($link, 'utf8');

if(mysqli_connect_errno()){
    echo 'Ошибка подключения к базе данных ('.mysqli_connect.errno().'):'.mysqli_connect_error();
    exit();
}
