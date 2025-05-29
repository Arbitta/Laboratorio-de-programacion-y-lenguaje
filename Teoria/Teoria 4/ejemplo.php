<!-- Codigo_3.php -->
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Ejemplo - Visualización de datos</title>
</head>
<body>
<section>
<article>
  <h2>Datos recibidos:</h2>
  <?php
    echo "Nombre: " . $_POST['txtNombre'] . "<br>";
    echo "Edad: " . $_POST['txtEdad'] . "<br>";
  ?>
</article>
</section>
</body>
</html>
