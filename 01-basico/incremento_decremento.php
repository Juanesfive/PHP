<?php

/**
 * 
 * Operadores de incremento y decremento
 * 
 *  Simbolo         Nombre
 *  ++              Incremento
 *  --              decremento
 * 
 *  Ejemplo 
 * 
 *  ++$Variables    Pre-incremento
 *  --$Variables    Pre-decremento
 */


 $numero = 10;


 // Primero incrementa y luego realiza la operacion
 echo "Pre Incremento". ++$numero;

 echo "<br>";

// primero realiza la operacion y luego incrementa
 echo "Post incremento " .$numero++;

 echo "<br>";

 echo $numero;

 echo "<br>";

 // primero resta y luego raliza la operacion
 echo "Pre decremento ".--$numero;

 echo "<br>";

 // 
 echo "Post decremento " .$numero--;

 echo "<br>";

 $resultado = ++$numero;

 echo $resultado;

 echo "<br>";
// incrementa el numero pero lo resta
 $resultado = $numero++;

// "+" Operador unario

 echo $resultado;
