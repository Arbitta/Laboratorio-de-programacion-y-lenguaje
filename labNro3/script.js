var divtabla = document.getElementById("tablaPrecio");
var tabla = document.getElementById("tabla");
var peticion;

function buscarPrecio() {
    var filtroProducto = document.getElementById("primerFiltro").value;
    var filtroUbicacion = document.getElementById("segundoFiltro").value;
    llenarEncabezado();

    if (filtroProducto !== "0" && filtroUbicacion === "0") {
        filtroPorProducto(filtroProducto);
    } else if (filtroProducto ==="0" && filtroUbicacion !== "0") {
        filtroPorUbicacion(filtroUbicacion);
    } else if (filtroProducto !== "0" && filtroUbicacion !== "0"){
        ambosFiltros(filtroProducto, filtroUbicacion);
    }
}

function filtroPorProducto(producto) {
    peticion = new XMLHttpRequest();
    peticion.open("GET", "peticionSupermercado.php?idProducto="+ producto, true);
    peticion.onreadystatechange = cargoInformacion;
    peticion.send(null);
}

function filtroPorUbicacion(ubicacion){
    peticion = new XMLHttpRequest();
    peticion.open("GET", "peticionSupermercado.php?ubicacion="+ ubicacion, true);
    peticion.onreadystatechange = cargoInformacion;
    peticion.send(null);
}

function ambosFiltros(producto, ubicacion) {
    peticion = new XMLHttpRequest();
    peticion.open("GET", "peticionSupermercado.php?idProducto="+ producto +"&ubicacion="+ ubicacion, true);
    peticion.onreadystatechange = cargoInformacion;
    peticion.send(null);
}

function cargoInformacion() {
    if ((peticion.readyState == 4) && (peticion.status== 200)){
        //añadir un evento al presionar el producto
        var myObj = JSON.parse(peticion.responseText);
        myObj.forEach(element => {
            var fila = document.createElement("tr");
            var celdaProducto = document.createElement("td");
            var celdaPrecio = document.createElement("td");
            var celdaNombre = document.createElement("td");
            var celdaUbicacion = document.createElement("td");
            var a = document.createElement("a");
            a.href = "#";
            a.textContent = element.nombreProducto;
            a.onclick = function() {
                mostrarDetalle(element.nombreProducto);
            };
            celdaProducto.appendChild(a);
            celdaPrecio.textContent = element.precio;
            celdaNombre.textContent = element.nombreSupermercado;
            celdaUbicacion.textContent = element.ubicacion;


            fila.appendChild(celdaProducto);
            fila.appendChild(celdaPrecio);
            fila.appendChild(celdaNombre);
            fila.appendChild(celdaUbicacion);
            
            tabla.appendChild(fila);
        });
    }
}

function mostrarDetalle(nombreproducto) {
    var tablaDetalle = document.getElementById("tablaDetalle");
    var divDetalle = document.getElementById("detalleProducto");
    tablaDetalle.innerHTML = "";

    var encabezado = document.createElement("tr");
    var supermecado = document.createElement("th");
    var precio = document.createElement("th");
    var ubicacion = document.createElement("th");

    supermecado.textContent = "SUPERMERCADO";
    precio.textContent = "PRECIO";
    ubicacion.textContent = "UBICACION";

    encabezado.appendChild(supermecado);
    encabezado.appendChild(precio);
    encabezado.appendChild(ubicacion);

    tablaDetalle.appendChild(encabezado);

    var peticionDetalle = new XMLHttpRequest();
    peticionDetalle.open("GET", "peticionProducto.php?nombreProducto=" +nombreproducto, true);
    peticionDetalle.onreadystatechange = cargoProductoDetalle;
    peticionDetalle.send(null);

    function cargoProductoDetalle() {
        if ((peticionDetalle.readyState == 4) && (peticionDetalle.status== 200)){
            var myObj = JSON.parse(peticionDetalle.responseText);
            myObj.forEach(element => {
                var fila = document.createElement("tr");
                var celdaSupermercado = document.createElement("td");
                var celdaPrecio = document.createElement("td");
                var celdaUbicacion = document.createElement("td");

                celdaSupermercado.textContent = element.supermercado;
                celdaPrecio.id = "precio";
                celdaPrecio.textContent = element.precio;
                celdaUbicacion.textContent = element.ubicacion;

                fila.appendChild(celdaSupermercado);
                fila.appendChild(celdaPrecio);
                fila.appendChild(celdaUbicacion);

                tablaDetalle.appendChild(fila);
            });
        }
    }
    /// MOSTAR EL PRECIO MAS BAJO ENTRE LOS SUPERMERCADOS ///
}


function llenarEncabezado() {
    tabla.innerHTML ="";

    var encabezado = document.createElement("tr");
    var producto = document.createElement("th");
    var precio = document.createElement("th");
    var supermecado = document.createElement("th");
    var ubicacion = document.createElement("th");

    producto.textContent = "PRODUCTO";
    precio.textContent = "PRECIO";
    supermecado.textContent = "SUPERMECADO";
    ubicacion.textContent = "UBICACION";

    encabezado.appendChild(producto);
    encabezado.appendChild(precio);
    encabezado.appendChild(supermecado);
    encabezado.appendChild(ubicacion);

    tabla.appendChild(encabezado);
}