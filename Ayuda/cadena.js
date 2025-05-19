const texto = "Hola Mundo";

// 1. Obtener longitud de la cadena
console.log(texto.length); // 10

// 2. Acceder a un carácter por índice
console.log(texto[0]);    // "H"
console.log(texto.charAt(1)); // "o"

// 3. Convertir a mayúsculas y minúsculas
console.log(texto.toUpperCase()); // "HOLA MUNDO"
console.log(texto.toLowerCase()); // "hola mundo"

// 4. Buscar posición de un texto
console.log(texto.indexOf("Mundo"));   // 5 (posición donde inicia)
console.log(texto.lastIndexOf("o"));   // 7 (última aparición)
console.log(texto.includes("Hola"));   // true
console.log(texto.startsWith("Ho"));   // true
console.log(texto.endsWith("do"));     // true

// 5. Extraer partes de la cadena
console.log(texto.slice(0, 4));    // "Hola" (desde índice 0 hasta antes de 4)
console.log(texto.substring(5, 10)); // "Mundo" (similar a slice pero no acepta índices negativos)
console.log(texto.substr(5, 3));   // "Mun" (desde índice 5, 3 caracteres)

// 6. Reemplazar texto (solo el primero que encuentra)
console.log(texto.replace("Mundo", "JS")); // "Hola JS"

// 7. Reemplazar todas las coincidencias (con expresión regular)
const texto2 = "Hola Mundo Mundo";
console.log(texto2.replace(/Mundo/g, "JS")); // "Hola JS JS"

// 8. Dividir cadena en array
console.log(texto.split(" "));  // ["Hola", "Mundo"]

// 9. Unir array en cadena
const arr = ["Hola", "JS"];
console.log(arr.join("-")); // "Hola-JS"

// 10. Eliminar espacios en blanco al inicio y fin
const texto3 = "  espacio  ";
console.log(texto3.trim()); // "espacio"
console.log(texto3.trimStart()); // "espacio  "
console.log(texto3.trimEnd());   // "  espacio"

// 11. Convertir cadena a array de caracteres
console.log(Array.from(texto)); // ["H", "o", "l", "a", " ", "M", "u", "n", "d", "o"]

// 12. Repetir cadena
console.log("Hola ".repeat(3)); // "Hola Hola Hola "

// 13. Comparar cadenas
console.log("a" > "b");    // false (lexicográficamente)
console.log("abc" === "abc"); // true

// 14. Buscar coincidencias con expresión regular
const texto4 = "uno dos tres dos uno";
console.log(texto4.match(/dos/g)); // ["dos", "dos"]

// 15. Convertir cadena a número (si es posible)
console.log(Number("123"));  // 123 (número)
console.log(parseInt("123abc")); // 123
console.log(parseFloat("12.34abc")); // 12.34

// 16. Obtener código Unicode de un carácter
console.log(texto.charCodeAt(0)); // 72 (código de 'H')

// 17. Convertir código Unicode a carácter
console.log(String.fromCharCode(72)); // "H"

// 18. Comparar cadenas ignorando mayúsculas
console.log(texto.toLowerCase() === "hola mundo"); // true

// 19. Buscar y obtener coincidencia con posición
const busqueda = /Mundo/;
const resultado = texto.match(busqueda);
if (resultado) {
  console.log(resultado.index); // 5
  console.log(resultado[0]);     // "Mundo"
}

// 20. Comprobar si una cadena es vacía o solo espacios
function esVacia(cadena) {
  return cadena.trim().length === 0;
}
console.log(esVacia("  ")); // true
console.log(esVacia("Hola")); // false

