<?php
session_start();

if(isset($_GET["action"])){

    if($_GET["action"] == "empty"){
        unset($_SESSION["cart"]);
    }

    if($_GET["action"] == "delete"){
       foreach ($_SESSION["cart"] as $key => $value){
        if($value['itemid'] == $_GET['id']){
            unset($_SESSION["cart"][$key]);
            echo "<script>alert('Item removed')</script>";
        }
       }
    }
}

if(isset($_POST['update'])){
    if(isset($_SESSION["cart"])){
        foreach($_SESSION["cart"] as $key => $value){
            if($value['itemid'] == $_POST['id']){
                $_SESSION["cart"][$key]['itemquantity'] = $_POST['quantity'];
echo "
<script>alert('Item quantity updated to" .$_SESSION["cart"][$key]['itemquantity']."')</script>";
            }
        }
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

    <link href="dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
    <!-- Table starts -->
<table class="table table-striped table-hover" id="example">
  <thead>
    <tr>
      <th scope="col">S/N</th>
      <th scope="col">Product Name</th>
      <th scope="col">Price (#)</th>
      <th scope="col">Quantity</th>
      <th scope="col">Image</th>
      <th scope="col">Total price</th>
      <th scope="col">Action </th>
    </tr>
  </thead>
  <tbody>
    <?php 
    if(!empty($_SESSION["cart"])){
        $total = 0;
        $no = 1;
        foreach($_SESSION["cart"] as $key => $value){
            $tp = $value["itemquantity"] * $value["itemprice"];
?>
<form method="post">
<tr>
    <input type="hidden" name="id" value="<?php echo $value["itemid"]; ?>">
    <td> <?php echo $no; ?> </td>
    <td> <?php echo $value["itemname"] ?> </td>
    <td> <?php echo $value["itemprice"] ?> </td>
    <td><input type="number" name="quantity" value="<?php echo $value["itemquantity"] ?>"></td>
    <td><img width="20px" src="images/<?php echo $value["itemimage"] ?>"/> </td>
    <td> <?php echo number_format($tp, 1) ?> </td>
    <td >
    <button type="submit" name="update"  class="btn btn-warning"> Update</button>
    
    <a href='cart.php?action=delete&id=<?php echo $value["itemid"] ?>'>
    <button type="button" class="btn btn-danger"> Delete</button>
    </a>

    </td>
</tr>
</form>
<?php
//$total += $tp;
$total = $total + $tp;
$no += 1;
        }
// For total items in cart
echo "<tr>";
echo "<td colspan='5' align='right'> Total</td>";
echo "<td>". number_format($total, 1) . "</td>";
echo "<td colspan='2' align='right'><a href='cart.php?action=empty'> Empty Cart  </a> </td>";
echo "</tr>";
echo "<tr>";
echo "<td colspan='5' align='right'><a href='checkout.php?totalamount=".$total."'> Proceed to checkout </a> </td>";
echo "</tr>";

    }else{
        echo "<tr>";
        echo "<td colspan='7' align='center'> Your cart is empty</td>";
        echo "</tr>";

    }
    echo "<tr>";
    echo "<td colspan='5' align='right'><a href='index.php'> Continue Shopping </a> </td>";
    echo "</tr>";
    

    ?>
  </tbody>
</table>
<!-- Table end -->
</div>
</body>
</html>