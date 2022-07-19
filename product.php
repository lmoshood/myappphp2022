<?php 
include_once "dbconnect.php"; 
if(isset($_POST["addproduct"]))
{
  $productname = $_POST["productname"];
  $price = $_POST["price"];
  $quantity = $_POST["quantity"];

  var_dump($_FILES["image"]);
  $image = $_FILES["image"]["name"];
  $tmp_dir = $_FILES["image"]["tmp_name"];
  $imageSize = $_FILES["image"]["size"];
  $imgExt = strtolower(pathinfo($image, PATHINFO_EXTENSION));

  $nimage = uniqid(rand(), true).".".$imgExt;
  $upload_dir = 'images/';

  if($imageSize < 5000000){
    move_uploaded_file($tmp_dir, $upload_dir.$nimage);
  }

  $sql = "INSERT INTO product(productname, price, quantity, image) 
  values('$productname', '$price', '$quantity', '$nimage')";
  
  
  if($db->query($sql)){
      echo "<script> alert('Product added successfully')</script>";
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
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add Product
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form starts here -->
        <form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Product Name</label>
    <input type="text" class="form-control" name="productname"  placeholder="Enter product name">
  </div>

  <div class="form-group">
    <label> Price </label>
    <input type="number"  class="form-control" min="1" name="price" id="">
  </div>

  <div class="form-group">
    <label> Quantity </label>
    <input type="number"  class="form-control" name="quantity" id="">
  </div>

  <div class="form-group">
    <label> Image </label>
    <input type="file"  class="form-control" name="image" accept="image/png, image/gif, image/jpeg, image/jpg"  id="">
  </div>

       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="addproduct" class="btn btn-primary">Submit</button>
      </div>
      </form>
       <!-- form ends here -->
    </div>
  </div>
</div>
<!-- Modal end -->
<!-- Table starts -->
<table class="table table-striped table-hover" id="example">
  <thead>
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Product Name</th>
      <th scope="col">Price (#)</th>
      <th scope="col">Quantity</th>
      <th scope="col">Image</th>
      <th scope="col">Option</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM PRODUCT";
    $result = $db->query($sql);
    foreach($result as $row){
      ?>
    <tr>
      <th scope="row">1</th>
      <td><?php echo $row["productname"]; ?></td>
      <td><?php echo $row["price"]; ?></td>
      <td><?php echo $row["quantity"]; ?></td>
      <td>
   <img src="images/<?php echo $row["image"]; ?>"  class="img-fluid" alt="">
      </td>
      <td>Edit/ Delete</td>
    </tr>
    <?php
    }
   ?>
  </tbody>
</table>
<!-- Table end -->
</div>




    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

 

<script>
$(document).ready(function () {
    $('#example').DataTable();
});
</script>
</body>
</html>







