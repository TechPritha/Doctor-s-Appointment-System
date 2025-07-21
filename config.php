<?php
session_start();
$host='localhost';
$user='root';
$pass='';
$db='doctors_appointment_db';

$con=mysqli_connect($host, $user, $pass);
mysqli_select_db($con,$db)or die(mysqli_error($con));
if(!$con){
echo "connection is not established";

}

?>