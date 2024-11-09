<?php

if (isset($_FILES["archivo"])) {
    $errores = array();
    $temporal = $_FILES['archivo']['tmp_name'];
    $nombre_archivo = $_FILES['archivo']['name'];
    $tamaño_archivo = $_FILES['archivo']['size'];
    $type_archivo = $_FILES['archivo']['type'];
    $error_archivo = $_FILES['archivo']['error'];

    $bandera = explode('.', $nombre_archivo);
    $archivo_extencion = strtolower(end($bandera));
    $extenciones = array('jpeg' , 'jpg' , 'png');

//   var_dump(in_array($archivo_extencion , $extenciones));

if(!in_array($archivo_extencion , $extenciones)){
    $errores[] = "Extencion no permitida";
}

if ($tamaño_archivo > 2097152) {
    $errores[] = "El tamaño maximo permitido es mayor a 2MB";
}
if(empty($errores)){
$metodo = move_uploaded_file($temporal,"Imagenes/".$nombre_archivo);

}


} else {
    echo "no envio archivo";
}


