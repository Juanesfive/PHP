<?php

/**
 * 
 * Estructura condicional simple
 * 
 *  if(expresion){
 *  codigo a ejecutar
 *  }
 * 
 *  if(expresion):
 *  codigo a ejecutar
 *  endif;
 */

 $edad = 18;
 $saludo = "Hola persona";

 if ($edad >= 18):
    echo "hola";
    
 endif;

 echo "<br>";
?>

<div>
    <?php if ($edad >=18): ?>
        <h1><?=$saludo?></h1>

        <?php endif; ?>
</div>

<!-- <div>
    <?php if ($edad >= 18) ?>{
         <h1>saludo persona</h1>        
    }
</div> -->

<?php

/**
 * 
 * Realizar un programa en cual un numero es par de lo contrario no
 */

 $numero = 2;
 

    
    if (($numero % 2) === 0 ) {
        echo "es par ";
    }

    echo "<br>";





 /**
  * En almancen se hace un 20%  de descuento a los clientes cuya compra supera  los 100 dolares cual es la cantidad pagara la persona
  */

  $compra = 100;

  if ($compra > 100) {
    $compra = $compra - ($compra * 0.20);
  }

  echo "El total a pagar es ${compra}";



 