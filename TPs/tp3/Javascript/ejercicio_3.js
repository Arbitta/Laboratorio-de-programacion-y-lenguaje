function verificacionDNI(event){
    event.preventDefault(); 
    
    const letras =['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B','N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
    var dni = document.getElementById("idDni").value;
    var letraIngresada = document.getElementById("idLetra").value;

    division(dni, letraIngresada, letras);
}

function division(var1, var2, var3){
    var resto;
    var letraEsperada;

    resto = var1 % 23;
    letraEsperada = var3[resto];

    if (letraEsperada == var2) {
        alert("BIENVENIDO!!!");
    } else {
        alert("La letra es incorrecta");
        alert("La letra esperada era: " + letraEsperada);
    }
}