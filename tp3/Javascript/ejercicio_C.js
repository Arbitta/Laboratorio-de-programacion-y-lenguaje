function pedido(){
    var num1, num2;
    alert("Ingrese 2 número, primer numero es menor se realiza la division, si es mayor se realizara la potencia");
    num1 = parseInt(prompt("Ingrese el numero 1:"));
    num2 = parseInt(prompt("Ingrese el numero 2:"));

    if (num1 > num2) {
        potencia(num1, num2);
    }else{
        resto(num1, num2);
    }
}

function potencia(a, b){
    var operacion;
    operacion = a ** b;
    alert("El resultado de la potencia es: " + operacion);
}

function resto(a, b){
    var cociente = 0;
    while(b >= a){
        b = b - a;
        cociente = cociente + 1;
    }
    alert("El resto de la division es de: " + cociente);
}