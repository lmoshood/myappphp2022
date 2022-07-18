<?php
$firstname = "Johnson";
$lastname = "James";

//$salary = 100;

    $age = 4;
//     $lastname = "James";
// if($age <= 15 && $lastname == 'James'){
//     $salary = 15000;
//   echo number_format($salary, 2);

// }else if($age > 15 && $age <= 45){
//   echo  $salary = 35000;
// }else{
//   echo  $salary = 25000;
// }




// switch($age){
//     case 10: case 15:
//         echo "Thank you";
//         break;
//     case 20:
//         echo "Welcome";
//         break;
//     case 40:
//         echo "Well done";
//         break;
//     default:
//     echo "Try again";
//     break;
// }

// $a = 1;
// $b = 101;
// while($a < $b){
//     echo "$a  <br>";
//     $a += 2;
// }

// $c =5;
// for($d = 0; $d < $c; $d++){
// echo "Hi";
// }


$name = ['John', 'James', 'Jack', 'Juliet'];
$name2 = array('John', ['James', 'Jack'], 'Juliet');

// foreach($name as $n){
//     echo $n."<br>";
// }

//  $count = count($name);
//  for($x = 0; $x < $count; $x++){
//     echo $name[$x];
//  }

//echo $name2[1][1];

$person = array('firstname' => 'Titi', 'lastname' => 'Tope','firstname' => 'Titi', 'lastname' => 'Tope');

//echo $person['lastname'];
function getpersons(){
    $person = array('firstname' => 'Titi', 'lastname' => 'Tope','firstname' => 'Titi', 'lastname' => 'Tope');


foreach($person as $p => $v){
    echo "$p $v" ;
}
}

//getpersons();
var_dump($name);
// echo json_encode($person);






























$fullname = $firstname ." ". $lastname;

?>
