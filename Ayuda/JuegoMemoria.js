function juegoMemoria() {
  const cartas = ['🐶','🐱','🐶','🐱'];
  const mezcladas = cartas.sort(() => 0.5 - Math.random());
  const seleccionadas = [];

  for (let i = 0; i < mezcladas.length; i++) {
    const eleccion = prompt(`Carta ${i + 1}: (escribí "ver" para dar vuelta)`);
    if (eleccion === "ver") {
      alert("Carta: " + mezcladas[i]);
      seleccionadas.push(mezcladas[i]);
    }
  }

  if (seleccionadas[0] === seleccionadas[1] && seleccionadas.length === 2) {
    alert("¡Encontraste un par!");
  } else {
    alert("No eran iguales. Intenta otra vez.");
  }
}
