<?php
// $a = 1;
// while ($a <= 10) {
//     if () {
//         # code...
//     }
//     echo "$a <br>";
//     $a++;
// }

// $tabla = 7;
// $a = 2;

// while ($a  <= 10) {
//     $a++;
//     if ($tabla % $a == 0) {
//         // $bandera++;
//             $a++;
            
        
//     }
//     if ($a == 10) {
//         // continue;
//         break;
//     }

//     // $bandera++;
//     echo "$tabla x $a = ". $tabla * $a . "<br>";  
    
// }


function esPrimo($numero) {
    $a = 2;
    $primo = true;
        while ($a < $numero/2 && $primo) {
            if ($numero % $a == 0) {
                $primo = false;
                break;

            }
            $a++;
        }
        return $primo;
}
$primo = esPrimo(7) ? "SI" : "NO";
echo $primo;




do {
    # code...
} while ($a <= 10);


