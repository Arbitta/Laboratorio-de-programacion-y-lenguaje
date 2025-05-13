const porcentaje = [0.3, 0.05, 0.1, 0.3, 0.25];

function mostrarDiv(){
    const divComienzo = document.getElementById("id_comienzo");
    const divDatos = document.getElementById("div_usuario");
    divComienzo.style.display = "none";
    divDatos.style.display = "block";
}

function mostrarPreguntas() {
    const divDatos = document.getElementById("div_usuario");
    const divPreguntas = document.getElementById("div_preguntas");
    divDatos.style.display = "none";
    divPreguntas.style.display = "block";
}

function calcularResultado() {
    let sumatotal = 0;
    for (let i = 1; i <= 5; i++) {
        let seleccionadoRadio;
        let sumas = 0;
        let seleccionadoCheck;
        const nombre = "preg" + i;

        if (i === 2 || i === 3) { //son la respuesta unicas
            seleccionadoRadio = document.querySelector(`input[name="${nombre}"]:checked`); //checked solo los que fueron seleccionados
            sumas = hacerSumas(porcentaje[i - 1], seleccionadoRadio);
            //funcion para imprimi¿?
            sumatotal = sumatotal + sumas;
        } else {
            seleccionadoCheck = document.querySelectorAll(`input[name="${nombre}"]:checked`);
            sumas = hacerSumasCheck(seleccionadoCheck, porcentaje[i - 1]);
            //funcion para imprimir¿?
            sumatotal = sumatotal + sumas;
        }
        rellenarDivResultado(i, sumas);
    }
    ponerResultadofinal(sumatotal);
    mostrarResultado();
}


function hacerSumas(porcentaje, seleccionado) {
    return parseFloat(seleccionado.value) * porcentaje;
}

function hacerSumasCheck(seleccionado, porcentaje) {
    let suma = 0;
    seleccionado.forEach(element => {
        const valor = parseInt(element.value);
        suma += valor;
    });;
    return suma * porcentaje;
}

function rellenarDivResultado(contador, puntaje) {
    const divRespuesta = document.getElementById("div_resultados");
    const texto = document.createElement("p");
    texto.innerHTML =`Pregunta ${contador}: ${puntaje} pts`;
    divRespuesta.appendChild(texto);
}

function ponerResultadofinal(suma) {
    const divRespuesta = document.getElementById("div_resultados");
    const texto = document.createElement("label");
    const profesion = document.createElement("label");
    texto.innerHTML = `Tu puntaje Final es: ${suma}`;

    if (suma >= 8) {
        profesion.innerHTML = `Estas calificado para ser Cocinero!!!`;   
    } else if (suma >= 6){
        profesion.innerHTML = `Estas calificado para ser ayudante de cocina`;
    } else {
        profesion.innerHTML = `Lo sentimos, no aprobaste el test por lo tanto no califica para ningun puesto`;
    }
    divRespuesta.appendChild(texto);
    divRespuesta.appendChild(profesion);
}

function mostrarResultado(){
    const divPreguntas = document.getElementById("div_preguntas");
    const divRespuesta = document.getElementById("div_resultados");
    divPreguntas.style.display = "none";
    divRespuesta.style.display = "block";
}