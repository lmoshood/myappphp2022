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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
    <link href="dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
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




    
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

 

<script>
$(document).ready(function () {
    $('#example').DataTable();
});
</script>
</body>
</html>







