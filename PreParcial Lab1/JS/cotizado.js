let contador = 0;

function mostrarDivs(){
    const select = document.getElementById("idTipoServicios");
    const valor = select.value;
    const divAcuario = document.getElementById("acuarioCampo");
    const divMascota = document.getElementById("mascotaCampo");

    divAcuario.style.display = valor === "limpieza_de_acuario" ? "block" : "none";
    divMascota.style.display = valor !== "limpieza_de_acuario" && valor !== "" ? "block" : "none";    
}

function agregarServicio() {
    const tipoDeServicios = document.getElementById("idTipoServicios").value;
    let precio = 0;
    if (!tipoDeServicios) {
      alert("Seleccione un tipo de servicio");
      return;
    }

    if (tipoDeServicios === "limpieza_de_acuario") {
        const alto = document.getElementById("alto").value;
        const ancho = document.getElementById("ancho").value;
        const cantidadPeces = document.getElementById("peces").value;
        precio = calculoLiempiezaAcuario(alto, ancho);
    } else {
        const cantidadAnimal = document.getElementById("cantidadAnimal").value;
        const razaAnimal = document.getElementById("raza").value;
        const pesoAnimal = document.getElementById("peso").value;
        const agresivoAnimal = document.getElementById("idAgresivo").value;
        const veterinariaAnimal = document.getElementById("idVeterinaria").value;
        precio = calculoMascota(cantidadAnimal, pesoAnimal, tipoDeServicios);
    }

    rellenarTablas(tipoDeServicios, precio) //posible parametro
    limpiarFormulario();
}
function rellenarTablas(tipoServicios, precio) {
    const tablaBody = document.querySelector("#tablaServicios tbody");
    const fila = document.createElement("tr");
    contador = contador + 1;
    fila.innerHTML =  `
    <td>${contador}</td>
    <td>${tipoServicios}</td>
    <td>${'$'+ precio}</td>
    `;
    tablaBody.appendChild(fila);
}

function limpiarFormulario() {
    document.getElementById("form_cotizador").reset();
    document.getElementById("acuarioCampo").style.display = "none";
    document.getElementById("mascotaCampo").style.display = "none";
}

function confirmarFormulario() {
    if (contador === 0) {
        alert("Agregue por lo menos un servicios");
    } else{
        alert("Se envio correctamente el formulario :D");
    }
}

function calculoMascota(cantidad, pesoMascota, tipoServicios){
    switch (tipoServicios) {
        case 'peluqueria':
            return calculoPeluqueria(cantidad, pesoMascota);
        case 'baño':
            return calculoBaño(cantidad, pesoMascota);
        case 'vacunacion':
            return calculoVacunacion(cantidad);
        case 'consulta_medica':
            return calculoConsultaMedica(cantidad);
    }
}

function calculoPeluqueria(cantidad, kilo){
    let precio = 0;   
    while (cantidad > 0) {
        if (kilo <= 25) {
            precio = precio + 300;
        } else {
            const adicional = kilo - 25;
            precio = precio + 300 + (adicional *28);
        }
        cantidad = cantidad - 1;
    }
    return precio;
}

function calculoBaño(cantidad, kilo) {
    let precio = 0;
    while (cantidad > 0) {
        if (kilo <= 35) {
            precio = precio + 250;
        } else {
            const adicional = kilo - 35;
            precio = precio + 250 + (adicional * 15);
        }
        cantidad = cantidad - 1;
    }
    return precio;
}

function calculoLiempiezaAcuario(alto, ancho) {
    area = alto * ancho;
    precio = area * 125;
    return precio;
}

function calculoVacunacion(cantidad) {
    let precio = 0;

    precio = cantidad * (150 + 55)
    return precio;
}

function calculoConsultaMedica(cantidad) {
    let precio = 0;
    while (cantidad > 0) {
        precio = precio + 180;
        cantidad = cantidad - 1;
    }
    return precio;
}