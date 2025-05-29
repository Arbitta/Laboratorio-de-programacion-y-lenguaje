<!-- Codigo_11.php -->
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Constantes y variables de PHP</title>
</head>
<body>
<header>
  <h1>Constantes y variables de PHP</h1>
</header>
<section>
  <article>
    <?php
    echo "Contenido de __FILE__ : " . __FILE__;
    echo "<br>";
    echo "Contenido de \$_SERVER['PHP_SELF'] : " . $_SERVER['PHP_SELF'];
    echo "<br>";
    echo "Contenido de \$_SERVER['SERVER_ADDR'] : " . $_SERVER['SERVER_ADDR'];
    echo "<br>";
    echo "Contenido de \$_SERVER['SERVER_NAME'] : " . $_SERVER['SERVER_NAME'];
    echo "<pre>";
    print_r($_SERVER);
    echo "<pre>";
    ?>
  </article>
</section>
<footer>
  <p>Archivo: Codigo_11.php</p>
</footer>
</body>
</html>
