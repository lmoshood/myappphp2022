<?php
if(isset($_POST["submit"])){

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$username = $_POST["username"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$qualification = $_POST["qualification"];


$qualification = implode(',', $qualification);

echo( $qualification);
echo $lastname;
echo $username;
echo $email;

$db = new mysqli('localhost', 'root', '', 'techone');
$sql = "INSERT INTO USERS(firstname, lastname, username, email, gender, qualification) 
values('$firstname', '$lastname', '$username', '$email', '$gender', '$qualification')";


if($db->query($sql)){
    echo "<script> alert('Data submitted successfully')</script>";
}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" placeholder="Firstname" name="firstname">
        <br>

        <input type="text" placeholder="lastname" name="lastname">
        <br>
        <input type="text" placeholder="username" name="username">
        <br>
        <input type="email" placeholder="email" name="email">
        <br>
      Male:  <input type="radio" placeholder="" value="male" name="gender">
      <br>
      Female:
        <input type="radio" placeholder="" value="female" name="gender">
        <br>

        <input type="checkbox" name="qualification[]" value="MSC" /> Master <br/>
        <input type="checkbox" name="qualification[]" value="Bsc" />Degree <br/>
        <input type="checkbox" name="qualification[]" value="HND" /> HND <br/>
        <input type="checkbox" name="qualification[]" value="ND" /> ND<br/>
        <input type="checkbox" name="qualification[]" value="SSCE" /> SSCE<br/>
        
        

        <input type="submit" name="submit" value="Submit" >
        <br>
    </form>
</body>
</html>