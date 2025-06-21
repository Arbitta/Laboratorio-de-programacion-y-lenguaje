<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function buscoCiudad() {
            var idCiudad = document.getElementById("idCiudad").selectedIndex;
            var peticion = new XMLHttpRequest();
            peticion.open("GET", "indexa.php?idCiudad="+idCiudad, true);
            peticion.send(null);
        }
    </script>
</head>
<body onLoad="mostrarCiudad();">
    <header><h1>Ciudades</h1></header>
    <form action="" method="post">
        <label>Ciudades:
            <select name="" id="idCiudad">
                <option value="">Argentina</option>
                <option value="">Francia</option>
                <option value="">EEUU</option>
            </select>
        </label>
    </form>
</body>
</html>