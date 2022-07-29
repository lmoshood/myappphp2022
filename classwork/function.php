<?php
function greeting(){
    echo "Welcome";
}

function Thanks(){
    return 'Thank you';
}

//greeting();
$thk = Thanks();
//echo $thk;


function sumvalue($a, $b){
    echo  $a + $b;
}
//sumvalue(5,2);

function withdrawal($cardno, $pin, ){

}

function sumdefault($a = 1, $b = 3){
    echo ($a + $b).'<br>';
}

sumdefault();
sumdefault(5);
sumdefault(5,2);
?>