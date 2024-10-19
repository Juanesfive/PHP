<?php

echo count($_REQUEST['checkbox']);



// $numero = $_POST['numero'];

// for ($i=0;$ $i <  $numero; $i++)$ { 
    

//     echo <"br> $i";
//     # code...
// }



// ----
// if (isset($_REQUEST['numero']) && !empty($_REQUEST['numero']))  {
//     for ($i=0;$ $i <  $_REQUEST['numero']; $i++){
//         echo "<br> $i";
//     }
// }else{
//     echo "<h1>No envio los datos</h1>";
// }

$nombre = "";
$apellido = "";
$edad = "";
$telefono = "";
$errores = [];

if (isset($_REQUEST['nombre'])&& empty($_REQUEST['nombre'])) {
    array_push($errores,"El campo nombre es requerido");
}

if(isset($_REQUEST['apellido'])&& empty($_REQUEST['apellido'])){
    array_push($errores, "El campo apellido es requerido");
}

if(isset($_REQUEST['edad'])&& empty($_REQUEST['edad'])){
    array_push($errores, "El campo edad es requerido");
}
            
if(isset($_REQUEST['telefono'])&& empty($_REQUEST['telefono'])){
    array_push($errores, "El campo telefono es requerido");
}

echo "<ul>";
for ($i=0; $i < count($errores) ; $i++) {
    echo "<li>". $errores[$i]. "</li>"; 
    
}
echo "</ul>";






