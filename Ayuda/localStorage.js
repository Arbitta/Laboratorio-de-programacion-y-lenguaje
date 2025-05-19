// ==== LOCAL STORAGE ====

/**
 * localStorage guarda datos como texto (string) y persisten aunque cierres el navegador.
 */

// GUARDAR DATOS
localStorage.setItem("nombre", "Juan");

// O usando JSON:
let usuario = { nombre: "Ana", edad: 25 };
localStorage.setItem("usuario", JSON.stringify(usuario));

// OBTENER DATOS
let nombre = localStorage.getItem("nombre"); // "Juan"
let usuarioGuardado = JSON.parse(localStorage.getItem("usuario")); // { nombre: "Ana", edad: 25 }

// ELIMINAR UN DATO
localStorage.removeItem("nombre");

// LIMPIAR TODO
localStorage.clear();


// ==== COOKIES ====

/**
 * Las cookies se guardan en formato texto y pueden tener fecha de expiración.
 * ¡Solo pueden guardar hasta 4KB por cookie!
 */

// CREAR UNA COOKIE BÁSICA
document.cookie = "usuario=Ana";

// CREAR COOKIE CON EXPIRACIÓN (1 día)
let fechaExpira = new Date();
fechaExpira.setDate(fechaExpira.getDate() + 1);
document.cookie = `token=abc123; expires=${fechaExpira.toUTCString()}; path=/`;

// LEER TODAS LAS COOKIES
console.log(document.cookie); // "usuario=Ana; token=abc123"

// PARSEAR COOKIES (como objeto)
function getCookiesComoObjeto() {
  return Object.fromEntries(
    document.cookie.split("; ").map(c => c.split("="))
  );
}
console.log(getCookiesComoObjeto()); // { usuario: "Ana", token: "abc123" }

// ELIMINAR UNA COOKIE (poniendo fecha pasada)
document.cookie = "usuario=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";

// ==== NOTA ====
/*
- localStorage → fácil de usar, persiste, solo en cliente.
- cookies → pueden usarse para autenticación, se mandan en cada request HTTP (a diferencia de localStorage).
*/
