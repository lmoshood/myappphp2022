<?php
session_start();
require_once '../dbconnect.php';
if(isset($_POST["login"])){
    $email = strip_tags($_POST["email"]);
    $password = strip_tags($_POST["password"]);
    $sql = "SELECT * FROM signin WHERE email='$email'";
    $res = $db->query($sql);
    $row = $res->fetch_assoc();
    $hpass = $row['password'];
    $count = $res->num_rows;
    echo $count ;
    echo password_verify($password, $hpass);
    if(!$count > 0 && !password_verify($password, $hpass)){
        $_SESSION['user'] = $row['lastname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = $row['role'];
        echo "<script> alert('Login successfully')</script>";
        if($row['role'] == 'Admin'){
        echo "<script> window.location.href='product.php'</script>";
        }else{
           echo "<script> window.location.href='product.php'</script>"; 
        }
    }else{
        echo "<script> alert('email or password incorrect')</script>";
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
    <form method="post">

    </form>
</body>
</html>