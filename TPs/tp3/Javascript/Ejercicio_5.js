function crearVentana(src){
var srcImagen;
var newWindow;

srcImagen = src;
newWindow = window.open("", "", "width=600,height=450,status=yes,resizable=yes,menubar=no");
newWindow.document.write("<body oncontextmenu='return false;'>");
newWindow.document.write("<h2 style='text-align:center;'>Imagen de Naruto</h2>");
newWindow.document.write("<img src='" + srcImagen + "' style='max-width:100%; height:auto;'><br><br>");
newWindow.document.write("<input id=\"botonCerrar\" name=\"botonCerrar\" type=\"button\" onclick=\"window.close();\" value=\"Cerrar ventana\" />");
newWindow.document.write("</body>");
}