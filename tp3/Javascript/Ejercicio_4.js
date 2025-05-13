function factorial(){
    var numeroIngresado = parseInt(document.getElementById("idFactorial").value);
    var enDiv = document.getElementById("contenedor");
    var oldParrafo = document.getElementById("parrafoNuevo");

    if (oldParrafo) {
        padre = oldParrafo.parentNode;
        padre.removeChild(oldParrafo);
    }

    var resultado = 1;
    for (let i = 1; i <= numeroIngresado; i++) {
        resultado *= i;        
    }

    var parrafo = document.createElement("p");
    parrafo.setAttribute("id", "parrafoNuevo");
    parrafo.innerHTML = "El factorual de " + numeroIngresado + " es: " + resultado;
    enDiv.appendChild(parrafo);
};
