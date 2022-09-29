<?php 
 require_once ("../dbconnect.php");

 if (isset($_POST["submit"])) {
      if ($_POST["Password"] == $_POST["confirmpassword"]) {
    $Firstname = check($_POST["Firstname"]);
    $Lastname = check($_POST["Lastname"]);
    $Email = $_POST["Email"];
    $Username = $_POST["Username"];
    // $Password = strip_tags(htmlspecialchars($_POST["Password"]));
    $Password = check($_POST["Password"]);
    $hpass = password_hash($Password, PASSWORD_DEFAULT);
    $stmt = "select * from signin where Email = '$Email'";
    $res = $db->query($stmt);
    $count = $res->num_rows;
    if ($count > 0) {
       echo "<script> alert('Email already registered') </script>";

    }
    else {
    


    $sql = "INSERT INTO USERS(Firstname, Lastname, Email, Username, Password) VALUES('$Firstname', '$Lastname', '$Email', '$Username', '$hpass')";
    // $sql = "INSERT INTO USERS(Firstname, Lastname, Username, email)
    // values('$firstname', '$lastname', '$username', '$email')";
    if ($db->query($sql)) {
      header("location:Log-in.php");
     }
    // $db->query($sql);
 }
 }
 else {
  echo "<script> alert('Password is not confirmed') </script>";
 }
}
 // strip_tags() : strip of html tags
 // htmlspecialchars() : Covert special characters to html



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
</head>
<body>
<body class="text-center">
    <main class="form-signin w-50 m-auto mt-5">
      <form method="post">
        <!-- <img class="mb-4" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <h1 class="h3 mb-3 fw-normal">Sign Up</h1>
          
        <div class="form-floating mt-5">
          <input type="text" class="form-control" id="floatingInput" placeholder="Firstname" name="Firstname">
         <label for="floatingInput"> First name</label>
        </div>
        <div class="form-floating mt-5">
          <input type="text" class="form-control" id="floatingInput" placeholder="Firstname" name="Lastname">
         <label for="floatingInput"> Last name</label>
        </div>
        
        <div class="form-floating  mt-5">
          <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="Email">
         <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mt-5">
          <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="Username">
         <label for="floatingInput"> Username</label>
        </div>
        <div class="form-floating  mt-5">
          <input type="password" class="form-control" id="Password" placeholder="Password" name="Password">
          <label for="Password">Password</label>
        </div>
        <div class="form-floating  mt-5">
          <input type="password" class="form-control" placeholder="Password" onkeyup="validate()" id="confirmpassword" name="confirmpassword">
          <label for="confirmpassword">Confirm Password</label>
        </div>
        <small id="err"></small>
        <div class="checkbox mb-3 mt-4">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="w-10 btn btn-lg btn-primary text-end" type="submit" name="submit" id="submit" disabled>Sign in</button>
        <!-- <p class="mt-5 mb-3 text-muted">© 2017–2022</p> -->
      </form>
    </main>
 


    <script>
     function validate() {
        var pass = document.getElementById('Password').value;
        var conpass = document.getElementById('confirmpassword').value;
        console.log(pass + "." + conpass );
     
     if (pass == conpass) {
        document.getElementById("err").innerHTML = "Confirm";
        document.getElementById("confirmpassword").style.border = "1px solid green";
        // document.getElementById("submit").style.display = "block";
        document.getElementById("submit").removeAttribute("disabled");
     }
     else {
        document.getElementById("err").innerHTML = "Password doesn't match";
        document.getElementById("confirmpassword").style.border = "2px solid red";
       
     }
    }

</script>
    
    
        
      
    
    </body>
    




<script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>