function juegoDadosAltos() {
  const jugador1 = Math.floor(Math.random() * 6) + 1;
  const jugador2 = Math.floor(Math.random() * 6) + 1;

  alert(`Jugador 1: ${jugador1}\nJugador 2: ${jugador2}`);

  if (jugador1 > jugador2) {
    alert("Jugador 1 gana");
  } else if (jugador2 > jugador1) {
    alert("Jugador 2 gana");
  } else {
    alert("Empate");
  }
}
