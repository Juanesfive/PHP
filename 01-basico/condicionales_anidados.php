<?php

/**
 * 
 *  Estructura
 * 
 *  if(?){
 *    if(?){
 *              codigo a ejecutar
 *  } else{
 *              codigo a ejecutar}
 * }
 */


 $a = 2;
 $b = 3;
 $c = 12;

 if ($a > $b )
 {
    if ($a > $c) 
    {
        echo "$a es mayor que $b y $c";
    }
    else{
        echo "$a es mayor $b pero es menor que $c";
    }
 }

 echo "<hr><br>";

 if ($c > $b )
 {
    if ($a > $c) 
    {
        echo "$a es mayor que $b y $c";
    }
    else{
        echo "$a es mayor $b pero es menor que $c";
    }
 }

 echo "<hr><br>";

 $Dia_de_la_semana = 7;


 if ($Dia_de_la_semana == 1) {
    echo "Lunes";
    
 }

 elseif ($Dia_de_la_semana == 2) {
    echo "Martes";
    
 }

 elseif ($Dia_de_la_semana == 3) {
        echo "Miercoles";
 }

 elseif ($Dia_de_la_semana == 4) {
        echo "Jueves";
 }

 elseif ($Dia_de_la_semana == 5) {

        echo "Viernes";
 }

 elseif ($Dia_de_la_semana == 6) {

        echo "Sabado";
 }

 elseif ($Dia_de_la_semana == 7) {
        echo "domingo";
 }



