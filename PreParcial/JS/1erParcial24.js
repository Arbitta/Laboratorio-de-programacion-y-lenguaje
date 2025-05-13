const divComienzo = document.getElementById("id_comienzo");
const div_juego = document.getElementById("id_juego");
const div_longitud = document.getElementById("id_longitud");
const div_resultado = document.getElementById("id_resultado");

const nombreGuardado = localStorage.getItem("nombreUsuario");

const long7 = ["gaviota", "informe", "revista", "esquema"];
const long8 = ["ambiente", "historia", "personas"];
const long10 = ["calendario", "transporte" ,"desarrollo"];

let contadorAdivinado = 0;
let contadoPistas = 0;
//contador de ganadas¿?

if (nombreGuardado) {
    divComienzo.innerHTML = `
    <h2>Bienvenido de nuevo, ${nombreGuardado}</h2>
    <label>Tu ultimo acceso fue el: </label>
    <label>Ya ganaste x partidas</label>
    <button onclick="mostrarLongitud();">Ingresar a Jugar</button>
    `;
} else {
    divComienzo.innerHTML = `
    <h2>Bienvenido Nuevo usuario</h2>
    <label>Por favor ingrese su nombre: </label>
    <input type="text" id="id_nombre">
    <button onclick="mostrarLongitud();">Ingresar a Jugar</button>
    `;
}

function mostrarLongitud() {
    divComienzo.style.display = "none";
    div_longitud.style.display = "block";
}

function mostrarJuego() {
    div_longitud.style.display = "none";
    ingresoLongitud();
    div_juego.style.display = "block";
}

function ingresoLongitud() {
    const longSeleccionado = document.getElementById("idjuegoSeleccionado").value;
    const palabra = document.getElementById("palabra_secreta");
    let palabra_seleccionada = "";
    switch (longSeleccionado) {
        case "7":
            palabra_seleccionada = long7[Math.floor(Math.random() * long7.length)];
            palabra.textContent = palabra_seleccionada;
            break;
        case "8":
            palabra_seleccionada = long8[Math.floor(Math.random() * long8.length)];
            palabra.textContent = palabra_seleccionada;
            break;
        case "10":
            palabra_seleccionada = long10[Math.floor(Math.random() * long10.length)];
            palabra.textContent = palabra_seleccionada;
            break;
    }
}

