function juegoBlackjack() {
  let total = 0;

  while (total < 21) {
    let carta = Math.floor(Math.random() * 10) + 1; // 1 a 10
    total += carta;
    let seguir = confirm(`Te salió un ${carta}. Total: ${total}\n¿Querés otra carta?`);
    if (!seguir) break;
  }

  if (total === 21) {
    alert("¡Blackjack! Ganaste");
  } else if (total > 21) {
    alert("¡Te pasaste! Perdiste");
  } else {
    alert(`Te plantaste con ${total}`);
  }
}
