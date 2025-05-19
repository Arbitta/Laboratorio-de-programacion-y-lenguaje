function juegoTrivia() {
  const preguntas = [
    {
      pregunta: "¿Cuál es la capital de Francia?",
      opciones: ["Madrid", "París", "Roma"],
      respuesta: "París"
    },
    {
      pregunta: "¿Cuánto es 5 + 3?",
      opciones: ["6", "8", "10"],
      respuesta: "8"
    },
    {
      pregunta: "¿Qué color resulta de mezclar azul y amarillo?",
      opciones: ["Verde", "Rojo", "Violeta"],
      respuesta: "Verde"
    }
  ];

  let puntos = 0;
  preguntas.forEach(p => {
    let entrada = prompt(`${p.pregunta}\nOpciones: ${p.opciones.join(", ")}`);
    if (entrada.toLowerCase() === p.respuesta.toLowerCase()) {
      alert("¡Correcto!");
      puntos++;
    } else {
      alert(`Incorrecto. Era: ${p.respuesta}`);
    }
  });

  alert(`Puntaje final: ${puntos}/${preguntas.length}`);
}
