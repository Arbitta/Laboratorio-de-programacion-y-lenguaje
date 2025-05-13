function cadenaDeTexto(){
    var cadena;

    cadena = prompt("ingrese una cadena de texto");
    document.write("<h1>Texto ingresado:</h1>");
    document.write("<p>" + cadena + "</p>");
    devolverCadena(cadena);
}

function devolverCadena(a){
    if (a === a.toUpperCase()) {
        document.write("<p>Esta cadena esta echa con solo MAYUSCULAS</p>");
    } else if (a === a.toLowerCase()){
        document.write("<p>Esta cadena esta echa con minusculas</p>");
    } else {
        document.write("<p>Esta cadena es una combinacion de mayusculas y minusculas</p>");
    }
}