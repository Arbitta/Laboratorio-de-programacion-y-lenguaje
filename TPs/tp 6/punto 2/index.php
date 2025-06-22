<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>punto 2</title>
    <script>
        function buscoDni() {
            var dni = document.getElementById("idDni").value;
            var peticion = new XMLHttpRequest();
            peticion.open("GET", "json.php?idDni="+dni, true);
            peticion.onreadystatechange = cargoDni;
            peticion.send(null);

            function cargoDni(){
                if ((peticion.readyState == 4) && (peticion.status == 200)) {
                    var objeto = JSON.parse(peticion.responseText);
                    var doc = document.getElementById("documento");
                    var ape = document.getElementById("apellido");
                    var nom = document.getElementById("nombre");
                    var fecha = document.getElementById("fecha_nacimiento");
                    var domi = document.getElementById("domicilio");
                    var prod = document.getElementById("producto_comprados");
                    doc.innerHTML = "Documento: " + objeto.documento;
                    ape.innerHTML = "Apellido: " + objeto.apellido;
                    nom.innerHTML = "Nombre: " + objeto.nombre;
                    fecha.innerHTML = "Fecha de Nacimiento: " + objeto.fechaNacimiento;
                    domi.innerHTML = "Domicilio: " +objeto.domicilio;
                    prod.innerHTML = "Producto Comprados: " +objeto.productoComprados;
                }
            }
        }
    </script>
</head>
<body>
    <header><h1>Busqueda por documento</h1></header>
        <fieldset>
            <legend>Busqueda</legend>
            <label>Ingrese un DNI valido: </label>
            <input type="number" id="idDni">
            <button onclick="buscoDni();">Buscar</button>
        </fieldset>
    <div>
        <h3>Persona</h3>
        <label id="documento">Documento: </label>
        <label id="apellido">Apellido: </label>
        <label id="nombre">Nombre: </label>
        <label id="fecha_nacimiento">Fecha de nacimiento: </label>
        <label id="domicilio">Domicilio: </label>
        <label id="producto_comprados">Productos comprados: </label>
    </div>
</body>
</html>