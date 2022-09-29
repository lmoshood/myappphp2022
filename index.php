<?php 
include_once "dbconnect.php"; 
session_start();

if(isset($_POST["addtocart"])){
  if(isset($_SESSION["cart"])){
      $item_array = array_column($_SESSION["cart"], "itemid");
      if(!in_array($_POST["id"], $item_array)){
        $count = count($_SESSION["cart"]);

        $items = array(
          'itemid' => $_POST["id"],
          'itemname' => $_POST["productname"],
          'itemprice' => $_POST["price"],
          'itemquantity' => $_POST["quantity"],
          'itemimage' => $_POST["image"]
          );
          
          $_SESSION["cart"][$count] = $items;


      }else{echo "<script>alert('Product already added to cart')</script>";}

  }else{

$items = array(
'itemid' => $_POST["id"],
'itemname' => $_POST["productname"],
'itemprice' => $_POST["price"],
'itemquantity' => $_POST["quantity"],
'itemimage' => $_POST["image"]

);

$_SESSION["cart"]["0"] = $items;
  }

//var_dump($_SESSION["cart"]);
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
 .btn-primary{
  --bs-btn-color: #b42727 !important;
 }
</style>
<?php include_once "head.php"; ?>
  
</head>
<body>
    <div class="container">
      <script>
        localStorage.user = 'hello';
      </script>
<?php include_once "nav.php"; ?>

<!-- Card starts -->
<div class="row">
<?php
    $sql = "SELECT * FROM PRODUCT order by id desc";
    $result = $db->query($sql);
    $no = 1;
    foreach($result as $row){
      ?>

<div class="card m-2" style="width: 18rem;">
<form method="post" id="fr">

<input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
<input type="hidden" name="productname" value="<?php echo $row["productname"]; ?>">
<input type="hidden" name="price" value="<?php echo $row["price"]; ?>">
<input type="hidden" name="image" value="<?php echo $row["image"]; ?>">
<input type="hidden" name="quantity" value="1">

  <img class="card-img-top" src="images/<?php echo $row["image"]; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row["productname"]; ?></h5>
    <p class="card-text"><?php echo $row["price"]; ?></p>
    <p class="card-text">Description</p>
    <button type="submit" name="addtocart" class="btn btn-primary">Add to cart</button>
  </div>
  </form>
</div>
    

    <?php
    $no++;
    }
   ?>
   </div>
<!-- Card end -->
</div>

 

<script>
$(document).ready(function () {
    $('#example').DataTable();
});
</script>
</body>
</html>







