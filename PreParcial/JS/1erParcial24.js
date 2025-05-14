const divComienzo = document.getElementById("id_comienzo");
const div_juego = document.getElementById("id_juego");
const div_longitud = document.getElementById("id_longitud");
const div_resultado = document.getElementById("id_resultado");

const nombreGuardado = localStorage.getItem("nombreUsuario");

const long7 = ["gaviota", "informe", "revista", "esquema"];
const long8 = ["ambiente", "historia", "personas"];
const long10 = ["calendario", "transporte" ,"desarrollo"];
let estadoVisible = [];
let letrasPistasMostradas = [];
let palabraOculta = "";

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
    switch (longSeleccionado) {
        case "7":
            palabraOculta = long7[Math.floor(Math.random() * long7.length)];
            break;
        case "8":
            palabraOculta = long8[Math.floor(Math.random() * long8.length)];
            break;
        case "10":
            palabraOculta = long10[Math.floor(Math.random() * long10.length)];
            break;
    }
    estadoVisible = Array(palabraOculta.length).fill("_");
    palabra.textContent = estadoVisible.join(" ");
}

function jugar() {
    const letra = document.getElementById("id_palabraIngresada").value.toLowerCase(); //para que pueda ingresar mayuscull o minuscula
    const labelAdivinada = document.getElementById("adivinada");
    const labelPista = document.getElementById("pista");

    let acierto = false;

        for (let i = 0; i < palabraOculta.length; i++) {
            if (palabraOculta[i] === letra) {
                estadoVisible[i] = letra;
                acierto = true;
            }
        }

        if (acierto) {
            document.getElementById("palabra_secreta").textContent = estadoVisible.join(" ");
            contadorAdivinado += 1;
            labelAdivinada.textContent = "Letras Adivinadas: " + contadorAdivinado;
        } else {
            for (let i = 0; i < palabraOculta.length; i++) {
                const letrasPista = palabraOculta[i];
                if (estadoVisible[i] === "_"  && !letrasPistasMostradas.includes(letrasPista)) {
                    for (let j = 0; j < palabraOculta.length; j++) {
                        if (palabraOculta[j] === letrasPista && estadoVisible[j]) {
                            estadoVisible[j] = letrasPista;
                        }
                    }
                    document.getElementById("palabra_secreta").textContent = estadoVisible.join(" ");
                    contadoPistas += 1;
                    labelPista.textContent = "Letras Pistas: " + contadoPistas;
                    break;                
                }
            }
        }

        if (!estadoVisible.includes("_")) {
            div_resultado.style.display = "block";
            const label = document.createElement("h2");
            label.textContent("Respuestas:");
            div_resultado.appendChild(label); 
        }

}