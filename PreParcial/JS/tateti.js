let cuadros = document.getElementsByClassName("cuadro");
let turnoActual = "X";
let juegoActivo = true;

let tablero = ["", "", "", "", "", "", "", "", ""];

const turnoTexto = document.getElementById("turnos");
const resultadoTexto = document.getElementById("resultado");
const botonReinicio = document.getElementById("btnJugar");

for (let i = 0; i < cuadros.length; i++) {
    cuadros[i].addEventListener('click', function(){
        juego(i);
    });    
}

function juego(indice) {
    if (!juegoActivo || tablero[indice] !== "") return;

    tablero[indice] = turnoActual;
    cuadros[indice].textContent = turnoActual;

    if (verificarGanador()) {
        resultadoTexto.textContent = `¡Ganó el jugador ${turnoActual}!`;
        juegoActivo = false;
        return;
    }

    if (!tablero.includes("")) {
        resultadoTexto.textContent = "¡Empate!";
        juegoActivo = false;
        return;
    }

    turnoActual = turnoActual === "X" ? "O" : "X";
    turnoTexto.textContent = `Turno del jugador: ${turnoActual}`;
}

function verificarGanador() {
    const combinaciones = [
        [0,1,2], [3,4,5], [6,7,8], 
        [0,3,6], [1,4,7], [2,5,8], 
        [0,4,8], [2,4,6]         
    ];

    return combinaciones.some(comb => {
        const [a, b, c] = comb;
        return tablero[a] && tablero[a] === tablero[b] && tablero[a] === tablero[c];
    });
}

function jugarDeNuevo() {
    tablero = ["", "", "", "", "", "", "", "", ""];
    turnoActual = "X";
    juegoActivo = true;
    resultadoTexto.textContent = "";
    turnoTexto.textContent = "Turno del jugador: X";

    for (let i = 0; i < cuadros.length; i++) {
        cuadros[i].textContent = "";
    }
}