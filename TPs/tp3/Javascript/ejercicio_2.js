function parImpar(numero){
    if (numero % 2 == 0) {
        document.write("El numero ingresado es par");
    } else {
        document.write("El numero ingresado es impar");
    }
}

function divisible(numero){
    if (numero % 2 == 0) {
        document.write("El numero es divisible por 2 <br>");
    } 
    if (numero % 3 == 0) {
        document.write("El numero es divisible por 3 <br>");
    } 
    if (numero % 5 == 0) {
        document.write("El numero es divisible por 5 <br>");
    }
}

function primos(numero){
    if (numero % 1 == 0 && numero % numero ==0) {
        document.write("El numero es primo");
    }
}


function principal(){
    var dato;
    
    dato = parseInt(prompt("Ingrese un numero entero"));
    document.write("<p>El numero ingresado fue: " + dato + "</p>");
    parImpar(dato);
    document.write("<br>")
    divisible(dato);
    primos(dato);
}
