// Codigo_129.js
function chequeoVisita() {
    var nomCookie = "visitas";
    var vigencia = 60;
    
    // Verifico si la cookie está guardada
    var posCookie = document.cookie.search(nomCookie);
    
    if (posCookie == -1) {
        // No hay cookies guardadas. Es la primera visita
        // Creo la cookie
        document.cookie = nomCookie + "=1; max-age=" + vigencia;
        // Muestro la bienvenida
        document.getElementById("visitasSite").innerHTML = "¡Esta es su primera visita!";
    } else {
        // Hay cookies guardadas. Actualizo el contador
        // Accedo a la cookie para obtener el valor
        var posIgual = document.cookie.indexOf("=", posCookie);
        var contador = parseInt(document.cookie.substring(posIgual + 1)) + 1;
        document.cookie = nomCookie + "=" + contador + "; max-age=" + vigencia;
        // Muestro el mensaje
        document.getElementById("visitasSite").innerHTML = "Esta es su visita número " + contador;
    }
}
