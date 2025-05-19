const opciones = ["piedra", "papel", "tijera"];

let jugador = prompt("Elige: piedra, papel o tijera").toLowerCase();
let pc = opciones[Math.floor(Math.random() * 3)];

alert("PC eligió: " + pc);

if (jugador === pc) {
  alert("¡Empate!");
} else if (
  (jugador === "piedra" && pc === "tijera") ||
  (jugador === "papel" && pc === "piedra") ||
  (jugador === "tijera" && pc === "papel")
) {
  alert("¡Ganaste!");
} else {
  alert("Perdiste :(");
}
