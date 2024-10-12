<?php

/**
 * 
 *    Simbolo         Nombre
 * 
 *      AND             Y
 *      OR              OR(O)
 *      !               NOT(NO)
 *      &&            AND(Y)
 *      ||            OR(O)
 * 
 * 
 * 
 * 
 * ------------TABLAS DE  OPERADORES ---------
 * 
 * Exprecion 1        Exprecion 2       Resultado
 * 
 * Falso        &&      Falso             Falso
 * 
 * Falso        &&      True               Falso
 * 
 * True        &&      True                 Verdadero
 * 
 * TRue       &&      Falso                 Falso
 */


 $valor1 = 7;
 $valor2 = 2;

 var_dump($valor1 == 7 && 2 > 3);
 echo '<br/>';
 var_dump($valor1 == 7 && 9 > 3);



/**
 *      Tablas de operador or
 * 
 *    ejerccio 1        ejerccio 2      Resultado
 * 
 *    False        ||     False           False
 * 
 *    False        ||     True            True
 * 
 *    True         ||     False           True
 * 
 *    True         ||     True            True
 * 
 * 
 * 
 */


 var_dump($valor1 == 7 or 2 > 3);
 echo "<br/>";
 var_dump($valor1 == 5 || 9 > 3);
 echo "<br/>";
 var_dump($valor1 == 5 || 1 > 3);


 /**
  * -------------------- tabla de operador not
  *
  *exprecion !                      Resultado
  *!false                                true
  *!true                                 false
  *
  */

  var_dump((!$valor1 >= $valor2));