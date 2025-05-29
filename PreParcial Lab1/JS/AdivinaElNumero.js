let numeroSecreto = numeroRandom();
let intento = 0;
const maxIntento= 10;

function adivinar (){
    const btnJugar = document.getElementById("btnJugar");
    const btnRendirse = document.getElementById("rendirse");
    var numeroIngresado = document.getElementById("id_numero").value;
    intento = intento + 1;
    nroIntento("Nro  de Intento: " + intento);
    if (intento === maxIntento) {
        btnJugar.disabled = true;
        btnRendirse.disabled = true;
        mostrarMensaje("El numero secreto era: " + numeroSecreto);
        mostrarResultado("Usted ha perdido :c");
        return
    }
    if (numeroIngresado > numeroSecreto) {
        mostrarMensaje("Tu número " + numeroIngresado + " es mayor");
        
    } else  if (numeroIngresado < numeroSecreto) {
        mostrarMensaje("Tu número " + numeroIngresado + " es menor");
    } else{
        mostrarMensaje("Tu numero " + numeroIngresado + " es igual al numero secreto");
        mostrarResultado("Usted ha ganado!!!! :D");
        btnJugar.disabled = true;
        btnRendirse.disabled = true;
    }


}

function rendirse() {
    const btnJugar = document.getElementById("btnJugar");
    btnJugar.disabled = true;
    nroIntento("Nro de Intento: " + intento);
    mostrarMensaje("El numero secreto era: " + numeroSecreto);
    mostrarResultado("Usted se ha rendido :c");

}

function jugarDeNuevo() {
    const btnJugar = document.getElementById("btnJugar");
    const btnRendirse = document.getElementById("rendirse");
    btnJugar.disabled = false;
    btnRendirse.disabled = false;

    resetearValores();
    nroIntento("Nro de Intento: " + intento);
    mostrarMensaje("");
    mostrarResultado("");
}


function numeroRandom (){
    return Math.floor(Math.random() * 101);
}

function resetearValores(){
    numeroSecreto = numeroRandom();
    intento = 0;
}

    
function mostrarMensaje(texto) {
    var divMensaje = document.getElementById("mensaje");
    divMensaje.textContent = texto; // Cambia directamente el texto
}

function nroIntento(texto) {
    document.getElementById("nroIntento").textContent = texto;
}

function mostrarResultado(texto) {
    var divResultado = document.getElementById("resultado_final");
    var oldParrafo = document.getElementById("parrafoNuevo");
    if (oldParrafo) {
        padre = oldParrafo.parentNode;
        padre.removeChild(oldParrafo);
    }
    var parrafo = document.createElement("p");
    parrafo.setAttribute("id", "parrafoNuevo");
    parrafo.textContent = texto;
    divResultado.appendChild(parrafo);
}