var tabla = document.getElementById("tablasEmpresa");
var peticion;

function listadoEmpresa() {
    var selectFiltro1 = document.getElementById("primerFiltro").value;
    var selectFiltro2 = document.getElementById("segundoFiltro").value;

    tabla.innerHTML = "";
    // lleno la tabla con los encabezado
    var encabezado = document.createElement("tr");
    var logo = document.createElement("th");
    var nombre =document.createElement("th");
    var paisRegistrado = document.createElement("th");
    var direccion = document.createElement("th");

    logo.textContent = "Logo";
    nombre.textContent = "Nombre de la empresa";
    paisRegistrado.textContent = "Pais registrado";
    direccion.textContent = "Enlace";

    encabezado.appendChild(logo);
    encabezado.appendChild(nombre);
    encabezado.appendChild(paisRegistrado);
    encabezado.appendChild(direccion);

    tabla.appendChild(encabezado);

    if (selectFiltro1 !== "0" && selectFiltro2 ==="0") {
        soloUnFiltro(selectFiltro1);
    } else if (selectFiltro1 === "0" && selectFiltro2 !== "0") {
        soloDosFiltro(selectFiltro2);
    } else if (selectFiltro1 !== "0" && selectFiltro2 !== "0"){
        ambosFiltros(selectFiltro1, selectFiltro2);
    }

}

function soloUnFiltro(filtro) {
    peticion = new XMLHttpRequest();
    peticion.open("GET", "jsonEmpresa.php?filtro1="+ filtro, true);
    peticion.onreadystatechange = cargoEmpresa;
    peticion.send(null);


}

function soloDosFiltro(filtro) {
    peticion = new XMLHttpRequest();
    peticion.open("GET", "jsonEmpresa.php?filtro2="+ filtro, true);
    peticion.onreadystatechange = cargoEmpresa;
    peticion.send(null);
}

function ambosFiltros(filtro1, filtro2) {
    peticion = new XMLHttpRequest();
    peticion.open("GET", "jsonEmpresa.php?filtro1=" + filtro1 + "&filtro2=" + filtro2, true);
    peticion.onreadystatechange = cargoEmpresa;
    peticion.send(null);
}

function cargoEmpresa(){
    if ((peticion.readyState == 4) && (peticion.status==200)){
        var myObj = JSON.parse(peticion.responseText);
        myObj.forEach(element => {
            var fila = document.createElement("tr");
            var celdaLogo = document.createElement("td");
            var img = document.createElement("img");

            var celdaNombre = document.createElement("td");
            var celdaPaisRegistrado = document.createElement("td");
            var celdaEnlace = document.createElement("td");
            var a = document.createElement("a");

            img.src = element.logoEmpresa;
            img.alt = "logo de la empresa";
            img.width = 50;
            //este es para la 4ta Zona anashe
            img.addEventListener("click", function() {
                var origen = document.getElementById("primerFiltro").value;
                var destino = document.getElementById("segundoFiltro").value;
                mostrarServiciosEmpresa(element.idEmpresa, origen, destino);
            });
            //// 
            celdaLogo.appendChild(img);

            celdaNombre.textContent = element.nombreEmpresa;

            celdaPaisRegistrado.textContent = element.paisEmpresa;

            a.href = element.webEmpresa;
            a.text = element.webEmpresa;
            a.target = "_blank";
            celdaEnlace.appendChild(a);

            fila.appendChild(celdaLogo);
            fila.appendChild(celdaNombre);
            fila.appendChild(celdaPaisRegistrado);
            fila.appendChild(celdaEnlace);

            tabla.appendChild(fila);
            
        });
        
    }
}

function mostrarServiciosEmpresa(idEmpresa, origen, destino) {
    divCuarto = document.getElementById("resultadoSecundarios");
    divCuarto.innerHTML = "";

    if (origen !== "0" && destino === "0") {
        ///solo se ve la empresa con el origen
    } else if (origen === "0" && destino !== "0") {
        //
    } else if (origen !== "0" && destino !== "0"){

    }
}
