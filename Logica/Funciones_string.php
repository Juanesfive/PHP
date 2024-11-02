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
$texto = " Grupo ADSO 28  ";

$exp = "/[A-Z]{4}.[0-9]{2}.[\W]/";
$resultado = preg_match_all($exp , $texto , $coincidencias, 
PREG_OFFSET_CAPTURE);

if ($resultado) {
    echo "Si tiene resultado";

} else {
    echo "No tiene resultado";
}



// $texto = "expresiones regulares";

// $expresion = "/expresion|expresion/";

// preg_match($expresion , $texto, $coincidencias);
// 


