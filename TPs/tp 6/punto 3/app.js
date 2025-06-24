function buscoProducto() {
    var divProducto = document.getElementById("infoProducto");
    var divCompra = document.getElementById("compra");
    var idProducto = document.getElementById("idProductoSelect").value;
    var peticion = new XMLHttpRequest();
    peticion.open("GET", "json.php?idProducto="+idProducto, true);
    peticion.onreadystatechange = cargoProducto;
    peticion.send(null);

    function cargoProducto() {
        if ((peticion.readyState == 4) && (peticion.status==200)){
            var myObj = JSON.parse(peticion.responseText); 
            var idLabel = document.createElement("label");
            var nombreLabel = document.createElement("label");
            var importeLabel = document.createElement("label");
            var cantidadLabel = document.createElement("label");
            idLabel.id = myObj.idProducto;
            idLabel.textContent = "ID: "+myObj.idProducto;
            nombreLabel.textContent = "Nombre: "+myObj.nombre;
            
            importeLabel.id = "precioProducto";
            importeLabel.value = myObj.importe;
            importeLabel.textContent = "Precio: $"+myObj.importe;

            cantidadLabel.id = "cantidadProducto";
            cantidadLabel.value = myObj.cantidad;
            cantidadLabel.textContent = "Cantidad disponible: "+myObj.cantidad;

            divProducto.innerHTML = "";
            divProducto.appendChild(idLabel);
            divProducto.appendChild(nombreLabel);
            divProducto.appendChild(importeLabel);
            divProducto.appendChild(cantidadLabel);

            divCompra.style.display = "block";
        }
    }
}

function calculoCompra() {
    var label = document.getElementById("resultado");
    var numero = document.getElementById("idCompra").value;
    var precio = document.getElementById("precioProducto").value;
    
    var cantidadTexto = document.getElementById("cantidadProducto").textContent;
    var cantidadDisponible = Number(cantidadTexto.split(":")[1].trim());

    if (numero > cantidadDisponible) {
        label.textContent = "No hay stock disponible para esa solicitud";
    } else {
        label.textContent = "Importe total: $"+(numero * precio);
    }
    document.getElementById("paises").style.display = "block";
}

function mostrarCiudad() {
    var idPais = document.getElementById("idPaisSelect").value;
    var ciudadSelect = document.getElementById("idCiudadesSelect");
    ciudadSelect.innerHTML ="";
    
    if (idPais === "" || idPais ==="0") {
        ciudadSelect.innerHTML = "<option value=''>Seleccione una ciudad</option>";
        return;
    }

    var peticion = new XMLHttpRequest();
    peticion.open("GET", "jsonCiudad.php?idPais="+idPais, true);
    peticion.onreadystatechange = cargoCiudades;
    peticion.send(null);

    function cargoCiudades(){
        if ((peticion.readyState == 4) && (peticion.status==200)){
            var myObj = JSON.parse(peticion.responseText);
            myObj.forEach(element => {
                var option =document.createElement("option");
                option.value = element.importe;
                option.text = element.nombre;
                ciudadSelect.appendChild(option);
            });
        }
    }
    document.getElementById("total").style.display = "block";
}

function calculoTotal() {
    var precio = document.getElementById("precioProducto").value;
    var cantidad = document.getElementById("idCompra").value;
    var ciudadSelect = document.getElementById("idCiudadesSelect");
    var impuesto = ciudadSelect.options[ciudadSelect.selectedIndex].value;

    var total = (precio * cantidad) + ((precio * cantidad) * impuesto);
    document.getElementById("resultadoTotal").textContent = "Total: $" + total;
}