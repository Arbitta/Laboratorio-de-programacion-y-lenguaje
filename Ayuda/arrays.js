// ==== ARRAY CHEAT SHEET EN JS ====

// 1. CREACIÓN Y ACCESO
let arr = [1, 2, 3];
console.log(arr[0]);       // 1
console.log(arr.length);   // 3

// 2. AGREGAR Y QUITAR ELEMENTOS
arr.push(4);               // [1, 2, 3, 4]
arr.pop();                 // [1, 2, 3]
arr.unshift(0);            // [0, 1, 2, 3]
arr.shift();               // [1, 2, 3]
arr.splice(1, 1);          // Elimina 1 en pos 1 -> [1, 3]
arr.splice(1, 0, 'x');     // Inserta 'x' en pos 1 -> [1, 'x', 3]

// 3. COPIAR ELEMENTOS
let sliceExample = arr.slice(0, 2);  // Copia desde 0 hasta 2 (no incluye 2)
console.log(sliceExample);           // [1, 'x']

// 4. RECORRIDO Y TRANSFORMACIÓN
arr = [1, 2, 3, 4];
arr.forEach(el => console.log('Elemento:', el));

let dobles = arr.map(x => x * 2);       // [2, 4, 6, 8]
let mayores = arr.filter(x => x > 2);   // [3, 4]
let encontrado = arr.find(x => x > 2);  // 3
let indiceEncontrado = arr.findIndex(x => x === 3); // 2

let todos = arr.every(x => x > 0);      // true
let alguno = arr.some(x => x > 3);      // true

let suma = arr.reduce((acc, val) => acc + val, 0); // 10

// 5. ORDENAR Y REVERTIR
let desordenado = [3, 1, 4, 2];
desordenado.sort();             // [1, 2, 3, 4] (orden string por defecto)
desordenado.sort((a, b) => b - a); // [4, 3, 2, 1]
desordenado.reverse();          // [1, 2, 3, 4]

// 6. BÚSQUEDA Y COMPARACIÓN
console.log(arr.includes(2));       // true
console.log(arr.indexOf(3));        // 2
console.log(arr.lastIndexOf(2));    // 1

// 7. COMBINAR Y DIVIDIR
let arr1 = [1, 2];
let arr2 = [3, 4];
let combinado = arr1.concat(arr2); // [1, 2, 3, 4]

let texto = combinado.join('-');   // "1-2-3-4"

let cadena = "a,b,c";
let convertido = cadena.split(','); // ["a", "b", "c"]

// 8. VERIFICACIONES Y CREACIÓN
console.log(Array.isArray(arr));    // true
console.log(Array.from("hola"));    // ['h', 'o', 'l', 'a']
console.log(Array.of(5, 6, 7));     // [5, 6, 7]
console.log(arr.at(-1));            // último elemento

// ==== FIN DEL CHEAT SHEET ====
