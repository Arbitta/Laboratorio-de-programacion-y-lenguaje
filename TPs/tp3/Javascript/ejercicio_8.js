const botonesN = document.querySelectorAll(".btnNumero");
const resultado = document.getElementById("resultado");
const botonesO = document.querySelectorAll(".btnOperacionBasica");
const botonesE = document.querySelectorAll(".btnOperacionCientifica");
const igual = document.getElementById("btnIgual");
const btnRetr = document.getElementById("btnRetr");
const btnCE = document.getElementById("btnCE");
const btnC = document.getElementById("btnC");

let expresion = "";

botonesN.forEach(boton => {
    boton.addEventListener("click", () => rellenarNumero(boton.value));
});


function rellenarNumero(numero) {
    expresion += numero
    resultado.value = expresion;
};

botonesO.forEach(boton => {
    boton.addEventListener("click", () =>rellenarOperaciones(boton.value))
});

function rellenarOperaciones(operacion) {
    if (resultado.value === "") {
        alert("Ingrese primero un numero");
        return
    }
    expresion += operacion
    resultado.value = expresion;
}

igual.addEventListener("click", () => realizarOperaciones());

function realizarOperaciones() {
    try {
        expresion = eval(expresion).toString();
        resultado.value = expresion;
    } catch {
        resultado.value = "Error"
    }
}

botonesE.forEach(boton => {
    boton.addEventListener("click", () => operacionEspecial(boton.value))
})


function operacionEspecial(signo) {
    let numero = parseFloat(expresion);

    if (isNaN(numero) && signo !== ".") {
        alert("Operación inválida para el valor actual.");
        return;
    }

    switch(signo) {
        case "Raiz":
            if (numero < 0) {
                alert("No se puede calcular la raíz de un número negativo");
                return;
            }
            numero = Math.sqrt(numero);
            expresion = numero.toString();
            resultado.value = expresion;
            break;

        case "%":
            numero = numero / 100;
            expresion = numero.toString();
            resultado.value = expresion;
            break;

        case "1/x":
            if (numero === 0) {
                alert("No se puede dividir por cero");
                return;
            }
            numero = 1 / numero;
            expresion = numero.toString();
            resultado.value = expresion;
            break;

        case "+/-":
            numero = -numero;
            expresion = numero.toString();
            resultado.value = expresion;
            break;

        case ".":
            if (!expresion.includes(".")) {
                expresion += ".";
                resultado.value = expresion;
            }
            break;

        default:
            alert("Operación especial no reconocida");
    }
}

btnRetr.addEventListener("click", () => {
    expresion = expresion.slice(0, -1);
    resultado.value = expresion;
});


btnCE.addEventListener("click", () => {
    expresion = "";
    resultado.value = expresion;
});

btnC.addEventListener("click", () => {
    expresion = "";
    resultado.value = expresion;
});