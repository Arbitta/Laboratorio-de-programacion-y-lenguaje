function pedido(){
    var num1, num2, operacion;
    var cociente = 0;
    num1 = parseInt(prompt("Ingrese el numero 1:"));
    num2 = parseInt(prompt("Ingrese el numero 2:"));

    if (num1 > num2) {
        operacion = num1 ** num2;
        document.write("<h1>El resultado de la potencia es: " + operacion + "</h1>");
    }else{
        while (num2 >= num1) {
            num2 = num2 - num1;
            cociente = cociente + 1;
        }
        document.write("<h1>El resultado de la division es: " + cociente + "</h1>");
    }
}