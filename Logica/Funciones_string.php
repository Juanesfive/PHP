<?php


// $exp = "/PRUEBA/i";
// $exp = "/[0-9]/";
// $exp = "/^texto/i";
// $exp = "/pr[eu]eba/i";
// $exp = "/grupo-[0-9]-adso/";
// $exp = "/le{2,4}r/";
// $exp = "/l[aeiou]{2,4}r/";    h
// $exp = "/[0-9]/";
// $exp = "/[A-Za-z]/";
// $exp = "/[\d]/"; Numeros
// $exp = "/[\D]/"; Letras
// $exp = "/[A-Z]{4,}/"; 
// $exp = "/[0-9]{2,}/";
// $exp = "/([A-Z]{4,}).([0-9]{2,})/";
$texto = "B22c0n0";

// $exp = "/[A-Z]{4}.[0-9]{2}.[\W]/";

// $exp = "/(?=.\d)/"; // numeros
$exp = "/(?=.*[a-z]{2,})/"; // letras minusculas
// $exp = "/(?=.*[A-Z])/"; // letras mayusculas
// $exp = "/(?=.*[A-Z]).[0-9]{2,}.(?=.*[a-z])/";
$resultado = preg_match_all($exp , $texto , $coincidencias, 
PREG_OFFSET_CAPTURE);

// if ($resultado) {
//     echo "Si tiene resultado";

// } else {
//     echo "No tiene resultado";
// }

echo "<pre>";
print_r($coincidencias);
echo "</pre>";


// $texto = "expresiones regulares";

// $expresion = "/expresion|expresion/";

// preg_match($expresion , $texto, $coincidencias);
// 


