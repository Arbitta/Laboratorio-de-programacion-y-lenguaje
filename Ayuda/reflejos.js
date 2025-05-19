let startTime;
let endTime;
const button = document.getElementById("reactionButton");
const result = document.getElementById("result");

function aparecerBoton() {
  // Espera entre 2 y 5 segundos para mostrar el botón
  const delay = Math.random() * 3000 + 2000;

  result.textContent = "Esperá que aparezca el botón...";
  button.style.display = "none";

  setTimeout(() => {
    button.style.display = "inline-block";
    startTime = new Date().getTime(); // Comienza a contar desde que aparece
  }, delay);
}

button.addEventListener("click", () => {
  endTime = new Date().getTime();
  const tiempoReaccion = ((endTime - startTime) / 1000).toFixed(3);
  result.textContent = `¡Tiempo de reacción: ${tiempoReaccion} segundos!`;
  button.style.display = "none";
  setTimeout(aparecerBoton, 2000); // Vuelve a iniciar
});

window.onload = aparecerBoton;
