<?php

/**
 * 
 * Estructura condicional doble (if - else)
 * 
 *  if(expresion){
 *  codigo a ejecutar si la exprecion es verdadera
 *  }
 *  else{
 *  codigo es falso
 *  }
 * 
 *  if(expresion):
 *  si es verdadera 
 *  else:
 *  si es falsa
 * endfi;
 */


 if( 1 > 7 ){
    echo "condicion evalua a verdadero";

 }
 else{
    echo "Condicion evalua a false";
 }

 echo "<br>";

    if (9 == 12):
        echo "Condicion evalua a verdadero";
    else:
        echo "Condicion evalua a falsa";
    endif;

    echo "<br>";

    //calcular el total que una persona debe pagar en montallantas el precio cada llanta es 800 si se compre menos de 5 llantas y de 700 si se compre 5 o mas llantas

    $llanta = 6;

    if ($llanta < 5){
        echo "Se paga 800 por cada llanta";
    }
    else{
        echo "Se paga 700 por cada llanta";
    }

    echo "<br>";

    // determinar si un alumno aprueba o reprueba un curso , sabiendo que su promedio  de 3 calificacion y el promedio debe ser 3.0 caso contrario reprueba

    $calificacion1 = 3.0;
    $calificacion2 = 3.0;
    $calificacion3 = 3.0;

    $Promedio = ($calificacion1 + $calificacion2 + $calificacion3) / 3;

    if ($Promedio >= 3.0 ){
        echo "Aprueba";
    }
    else{
        echo "Reprueba";
    }

    echo "<hr><br>";

    // echo (8 >= 10) ?  "verdadero" :  "Es falso";

    /** 
     * 
     * Operador Ternario
     *  
     *  Operador ? true : false
     */

     // si el primero es mayor que el segundo los multiplicamos en caso contrario se divide 

     $a = 1;
     $b = 2;

     echo ($a > $b) ? ($a * $b): ($a / $b);


