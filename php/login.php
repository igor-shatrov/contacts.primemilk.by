<?php
require_once 'database.php';

$email= trim($_POST['email']);
$pass = trim($_POST['pass']);

if ($email =='' OR $pass==''){
    echo 2;
    die;
}



$sql = "SELECT email FROM users WHERE email='".$email."' and password='".$pass."'";
$result = mysqli_query($link, $sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo "0";
}
$link->close();
?>