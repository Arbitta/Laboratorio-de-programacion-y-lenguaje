<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function buscoCiudad() {
            var idPais = document.getElementById("idPaisSelect").selectedIndex;
            var peticion = new XMLHttpRequest();
            peticion.open("GET", "indexa.php?idPais="+idPais, true);
            peticion.onreadystatechange = cargoPais;
            peticion.send(null);

            function cargoPais() {
                if ((peticion.readyState == 4) && (peticion.status==200)){	//Se proceso la peticion
                    var myObj = JSON.parse(peticion.responseText); 
                    var pais = document.getElementById("idPais");
                    pais.innerHTML = myObj.pais;
                    var ciudades = document.getElementById("ciudades");
                    ciudades.innerHTML = myObj.ciudades;
                }
            }
        }
    </script>
</head>
<body onLoad="mostrarCiudad();">
    <header><h1>Ciudades</h1></header>
        <label>Ciudades:
            <select name="" id="idPaisSelect" onChange="buscoCiudad();">
                <option value="0">------</option>
                <?php 
                include_once "paises.class.php";
                $lista = paises::getpaisesBD();
                if (count($lista)>0) {
                    foreach ($lista as $pais) {
                        echo '<option value="'.$pais->getIdPais().'">'.$pais->getPais().'</option>';
                    }
                }
                ?>
            </select>
        </label>
        <h3 id="idPais">Pais: </h3>
        <h3>ciudades</h3>
        <label id="ciudades"></label>
</body>
</html>