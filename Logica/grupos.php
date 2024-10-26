<?php

// $nombre = "Juan";
// $sexo = "M";

// function Grupo($nombre, $sexo)
// {
//     if ($sexo === "F" && strtoupper($nombre) < "M" ||
//     $sexo === "M" && strtoupper($nombre) > "N") {
//         return "Grupo A";
//     }    else {
//             return "Grupo B";
//         }
    
    
// }

// $grupo = Grupo($nombre, $sexo)


// En una farmarmacia aplica el precio de los remedios al 10% de descuento Hacer un programa que calcule el valor de descuento y el precio final


$Precio = 5000;
$descuento = 0.1; // 10% de descuento

        $valorDescuento = ($Precio * $descuento);
            $Valorfinal = ($Precio - $valorDescuento);



        echo $valorDescuento;
        echo "<br>";
        echo "El valor final es:  {$Valorfinal}";
        
        
    


    



// Escribir un programa que imprima la tabla de multiplicar del 1 al 10;

echo "<hr>";
$multiplicacion = 10;
$multiplicando;

for ($multiplicando=1; $multiplicando <=10 ; $multiplicando++) { 
    echo "$multiplicacion" . "X" . $multiplicando . "=" . $multiplicacion * $multiplicando;
    echo "<br>";
    
}






// crea una funcion que calcule la longitud de una palabra si es corta o es larga las palabras cortas son menos de 5 caracteres




// Escriba una funcion que tome una cadena y devuelva una nueva pero sin las vocales
echo "<br>";

function sinVocales($cadena) {

$Vocales = ['a','e','i','o','u', 'A','E','I','O','U','á','é','í','ó','ú','Á','É','Í','Ó','Ú'];

$Cadenas_sinvocales = str_replace($Vocales, '',$cadena );
return $Cadenas_sinvocales;
    
}

$texto = "Juan Esteban Vasquez Gállego";

echo sinVocales($texto);

echo "<br>";    


//  cre una funcion para ver cuantas silabas tiene una palabra:

function ContarSilabas($palabra) {

    $palabra = strtolower($palabra);
    $numsilabas = preg_match_all('/[aeiouáéíóúü]+/u', $palabra);

    return $numsilabas;


    
}

    $palabra = "LUNA";

echo "La palabra '$palabra' tiene " . ContarSilabas($palabra) . " Silabas ";


