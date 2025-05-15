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

let ganadasTotales = 0;
let fecha;
//contador de ganadas¿?
function usuario() {
    if (nombreGuardado) {
        const h2 = document.createElement("h2");
        const labelAcceso = document.createElement("label");
        const labelPartidas = document.createElement("label");
        const btn = document.createElement("button");

        h2.textContent = `Bienvenido de muevo, ${nombreGuardado}`;
        labelAcceso.textContent = "Tu ultimo acceso fue el:" + fecha;
        labelPartidas.textContent = "Ya ganaste xxx de partidas"
        btn.textContent = "Ingresar a jugar"
        btn.onclick = mostrarLongitud;

        divComienzo.appendChild(h2);
        divComienzo.appendChild(labelAcceso);
        divComienzo.appendChild(labelPartidas);
        divComienzo.appendChild(btn);

    } else {
        const h2 = document.createElement("h2");
        const label =document.createElement("label");
        const input = document.createElement("input");
        const btn = document.createElement("button");
        
        h2.textContent = "Bienvenido Nuevo Usuario";
        label.textContent = "Ingrese su nombre";
        input.type = "text";
        input.id = "id_nombre";
        btn.textContent = "Guargar y Jugar"
        btn.onclick = function (){
            if (input.value.trim() === "") {
                alert("Ingrese su nombre");
            } else {
                guardarDatos(input.value.trim());
                mostrarLongitud();
            }
        }
        divComienzo.appendChild(h2);
        divComienzo.appendChild(label);
        divComienzo.appendChild(input);
        divComienzo.appendChild(btn);
    }
}

function guardarDatos(nombre){
   const fechaActual = new Date().toLocaleDateString();
   const nombreGuardado = localStorage.setItem("nombreUsuario", nombre);
   fecha = localStorage.setItem("UltimoAcceso", fechaActual);
}


function mostrarLongitud() {
    divComienzo.style.display = "none";
    div_longitud.style.display = "block";
    div_juego.style.display = "none";
    div_resultado.style.display = "none";
    resetarValores();
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
            document.getElementById("btnAdivinar").disabled = true;
            const label = document.createElement("label");
            if (contadorAdivinado > contadoPistas) {
                label.textContent = "Ganaste!!!!"
            } else {
                label.textContent = "Perdiste!!!"
            }
            label.setAttribute("for", "inputRespuesta");
            div_resultado.appendChild(label);
            div_resultado.style.display = "block";
        }

}

function jugarOtraPartida() {
    document.getElementById("btnAdivinar").disabled = false;
    mostrarLongitud();
}

function resetarValores() {
    contadoPistas = 0;
    contadorAdivinado = 0;    
    const labelAdivinada = document.getElementById("adivinada");
    const labelPista = document.getElementById("pista");

    labelAdivinada.textContent = "Letras Adivinadas: 0"
    labelPista.textContent = "Letras Pistas: 0"
}

function abandonar() {
    div_juego.style.display = "none";
    divComienzo.style.display = "block";
}