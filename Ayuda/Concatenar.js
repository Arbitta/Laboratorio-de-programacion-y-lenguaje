// Ejemplo completo de los métodos más comunes para acceder a elementos HTML con JS

// 1. getElementById: selecciona un único elemento por su ID
const elemPorId = document.getElementById("miId"); 
console.log("getElementById:", elemPorId); 
// Devuelve el elemento con id="miId" o null si no existe

// 2. getElementsByClassName: devuelve todos los elementos que tengan la clase especificada
const elemsPorClase = document.getElementsByClassName("miClase");
console.log("getElementsByClassName:", elemsPorClase); 
// Devuelve una colección HTMLCollection (parecida a array, pero no es)

if (elemsPorClase.length > 0) {
  console.log("Primer elemento con clase 'miClase':", elemsPorClase[0]);
}

// 3. getElementsByTagName: devuelve todos los elementos con esa etiqueta (tag)
const elemsPorTag = document.getElementsByTagName("p");
console.log("getElementsByTagName:", elemsPorTag);

// 4. querySelector: selecciona el primer elemento que coincida con el selector CSS
const primerSelector = document.querySelector("#miId"); // selector por id
console.log("querySelector (#miId):", primerSelector);

const primerSelectorClase = document.querySelector(".miClase"); // selector por clase
console.log("querySelector (.miClase):", primerSelectorClase);

const primerSelectorCompuesto = document.querySelector("div > p"); // selector CSS complejo
console.log("querySelector (div > p):", primerSelectorCompuesto);

// 5. querySelectorAll: selecciona todos los elementos que coincidan con el selector CSS
const todosLosElems = document.querySelectorAll(".miClase");
console.log("querySelectorAll (.miClase):", todosLosElems);
// devuelve un NodeList, parecido a array, se puede usar forEach

todosLosElems.forEach((el, index) => {
  console.log(`Elemento ${index} con clase 'miClase':`, el);
});

// 6. Acceder a los nodos hijos (incluye nodos de texto y comentarios) con childNodes
const nodosHijos = document.body.childNodes;
console.log("childNodes de body:", nodosHijos);

// 7. Acceder solo a los elementos hijos con children (excluye nodos de texto)
const elementosHijos = document.body.children;
console.log("children de body:", elementosHijos);

// 8. Acceder al padre de un elemento con parentNode o parentElement
if (elemPorId) {
  const padre = elemPorId.parentNode; // o parentElement (normalmente lo mismo)
  console.log("parentNode de #miId:", padre);
}

// 9. Ejemplo de acceso a elementos dentro de otro elemento (anidado)
if (elemPorId) {
  const hijos = elemPorId.children; // elementos hijos dentro del elemento con id "miId"
  console.log("children dentro de #miId:", hijos);
}

// 10. Convertir una HTMLCollection o NodeList a Array para usar métodos de array como map, filter
const arrayDeElems = Array.from(elemsPorClase);
const textos = arrayDeElems.map(el => el.textContent);
console.log("Textos de elementos con clase 'miClase':", textos);

// 11. Otra forma para obtener el primer elemento con una clase (equivale a querySelector)
const primerElemClase = document.getElementsByClassName("miClase")[0];
console.log("Primer elemento con getElementsByClassName:", primerElemClase);

// Nota importante:
// - getElementById es rápido y único.
// - getElementsByClassName y getElementsByTagName devuelven colecciones "en vivo" (se actualizan si DOM cambia).
// - querySelector y querySelectorAll usan selectores CSS, son muy flexibles.
// - querySelectorAll devuelve NodeList estático, que no se actualiza automáticamente.

// Estos métodos son la base para luego manipular el DOM, agregar eventos, cambiar estilos, etc.

