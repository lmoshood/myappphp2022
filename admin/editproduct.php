<?php

require_once "dbconnect.php"; 
if(isset($_GET["productid"])){
    $id =  $_GET["productid"];
    $stmt = "SELECT * from product where id=$id";
    $result = $db->query($stmt);
    $row = $result->fetch_assoc();

}
// Save edit product
if(isset($_POST["editproduct"]))
{
  $productname = $_POST["productname"];
  $price = $_POST["price"];
  $quantity = $_POST["quantity"];
  
  if($_FILES["image"]["name"] == NULL){
    $nimage = $row["image"];
  }else{
  $image = $_FILES["image"]["name"];
  $tmp_dir = $_FILES["image"]["tmp_name"];
  $imageSize = $_FILES["image"]["size"];
  $imgExt = strtolower(pathinfo($image, PATHINFO_EXTENSION));

  $nimage = uniqid(rand(), true).".".$imgExt;
  $upload_dir = 'images/';

  if($imageSize < 5000000){
    move_uploaded_file($tmp_dir, $upload_dir.$nimage);
  }
  if(file_exists($upload_dir.$row["image"]) && ($upload_dir.$row["image"] != 'images/noimage.jpg')){
    unlink($upload_dir.$row["image"]);
    }

  }
  $sql = "UPDATE product SET productname = '$productname', 
  price ='$price' , quantity = '$quantity', image = '$nimage' WHERE id=$id";
  
  
  if($db->query($sql)){
      echo "<script> alert('Product updated successfully')</script>";
      header("Refresh: 0; product.php");
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
<style>
  img {
    width: 50px;
    height: 50px;
  }
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
<?php include_once "nav.php"; ?>



        <!-- Form starts here -->
        <form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Product Name</label>
    <input type="text" class="form-control" name="productname" value="<?php echo $row["productname"]; ?>" placeholder="Enter product name">
  </div>

  <div class="form-group">
    <label> Price </label>
    <input type="number"  class="form-control" min="1" name="price" value="<?php echo $row["price"]; ?>">
  </div>

  <div class="form-group">
    <label> Quantity </label>
    <input type="number"  class="form-control" name="quantity" value="<?php echo $row["quantity"]; ?>">
  </div>

  <div class="form-group">
    <label> Image </label>
    <img width="20px" height="20px" src="images/<?php echo $row["image"]; ?>" alt="">
    <input type="file"  class="form-control" name="image" accept="image/png, image/gif, image/jpeg, image/jpg"  id="">
  </div>

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="editproduct" class="btn btn-primary">Submit</button>
      </div>
      </form>
       <!-- form ends here -->


  
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

<script>
$(document).ready(function () {
    $('#example').DataTable();
});
</script>
</body>
</html>
