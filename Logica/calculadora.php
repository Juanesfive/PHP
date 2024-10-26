<?php
$a = 26;
$b = 9;

function calculadora($a, $b)
{   try {
    if ($b === 0) {
        throw new Exception('Division por cero.');
    } 
    $respuesta = array(
        "Sumar" => $a + $b,
        "Resta" => $a - $b,
        "multiplicar" => $a * $b,
        "dividir" => $a / $b
    );

    return $respuesta;

        
} catch (\Exception $e) {
    return $e->getMessage();
}


}

$resultado = calculadora($a, $b);



echo "<pre>";
print_r($resultado);
echo "<pre>";


// si los alumnos de un curso se han divido en dos grupos a y b deacuerdo con el sexo y el nombre el grupo a esta formado de mujeres con nombre anterior a la M y los hombres posterior a la N  y el grupo B por el resto

// Escribir un programa que pregunte por su nombre y sexo y que muestre a que grupo corresponde




