const premios = ["Un caramelo 🍬", "Un viaje a Marte 🚀", "Un pancho 🌭", "Nada 😢", "Una sorpresa 🎁"];
const resultado = document.getElementById("resultado");
const boton = document.getElementById("girar");

boton.addEventListener("click", () => {
  const indice = Math.floor(Math.random() * premios.length);
  const premio = premios[indice];
  resultado.textContent = `🎉 Tu premio es: ${premio}`;
});
