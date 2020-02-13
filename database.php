<?php
$dbhost ='localhost';
$dbuser = 'root';
$dbpass = '';
$db='magnus';

$conn= mysqli_connect($dbhost,$dbuser,$dbpass);
if($conn->connect_error){
    die("Connection failed : " . $conn->connect_error);
}
mysqli_select_db($conn, $db);
?>