<?php
include_once 'dbconnect.php';
$msg = array();

$firstname = //$_POST["firstname"];
$lastname = $_POST["lastname"];
$password = $_POST["password"];
$email = $_POST["email"];
$dob = $_POST["dob"];

$hpass = password_hash($password, PASSWORD_DEFAULT);
$sql = "INSERT into signup(firstname, lastname, password, email, dob) VALUES('$firstname', '$lastname', '$hpass', '$email', '$dob')";

if($db->query($sql)){
    $msg = array('success' => 'Registered successfully');
}else{
    $msg = ['error' => 'Not Registered successfully'];
}


echo json_encode($msg);

?>