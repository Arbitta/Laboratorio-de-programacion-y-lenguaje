<?php
// Clase para manejar sesiones de forma encapsulada
class Session {
    
    // Constructor: se ejecuta automáticamente al crear un objeto de la clase
    public function __construct() {
        // Si no hay ninguna sesión activa, se inicia una
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Método para establecer un valor en la sesión
    public function set($clave, $valor) {
        // Guarda el valor en la sesión usando la clave proporcionada
        $_SESSION[$clave] = $valor;
    }

    // Método para obtener un valor de la sesión
    public function get($clave) {
        // Devuelve el valor de la clave si existe, o null si no está definida
        return $_SESSION[$clave] ?? null;
    }

    // Método para verificar si una clave existe en la sesión
    public function exists($clave) {
        // Devuelve true si la clave está definida, false si no
        return isset($_SESSION[$clave]);
    }

    // Método para eliminar una clave de la sesión
    public function remove($clave) {
        // Elimina la clave y su valor de la sesión
        unset($_SESSION[$clave]);
    }

    // Método para destruir completamente la sesión
    public function destroy() {
        // Destruye todos los datos de la sesión en el servidor
        session_destroy();
    }
}
?>
