<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario</title>
  </head>
  <body>
    <form action="./subir.php" method="post" enctype="multipart/form-data">
      <div>
        <input type="text" value="nombre" />
      </div>

      <div>
        <input type="file" name="archivo" multiple />
      </div>
      <button>Subir</button>
    </form>
  </body>
</html>
