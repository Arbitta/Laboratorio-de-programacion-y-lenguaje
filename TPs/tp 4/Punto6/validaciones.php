<?php 
class Suscripcion {
    private $nombre, $apellido, $sexo, $fecha_nacimiento, $telefono, $correo, $evento, $fecha, $lugar;

    public function __construct($datos) {
        $this->nombre = $datos['nombre'];
        $this->apellido = $datos['apellido'];
        $this->sexo = $datos['sexo'];
        $this->fecha_nacimiento = $datos['fecha_nacimiento'];
        $this->telefono = $datos['telefono'];
        $this->correo = $datos['correo'];
        $this->evento = isset($datos['evento']) ? $datos['evento'] : [];
        $this->fecha = $datos['fecha'];
        $this->lugar = $datos['lugar'];
    }

    public function validar(){
        $errores = [];
        if (empty($this->nombre)) {
            $errores[] = "El nombre es obligatorio.";
        }
        if (empty($this->apellido)) {
            $errores[] = "El apellido es obligatorio.";
        }
        if (empty($this->sexo)) {
            $errores[] = "El sexo es obligatorio.";
        }
        if (empty($this->fecha_nacimiento)) {
            $errores[] = "La fecha de nacimiento es obligatoria.";
        } else{ 
            $edad = $this->validarEdad();
            if ($edad < 18) {
                $errores[] = "Debe ser mayor de 18 años para suscribirse.";
            }
        }
        if (empty($this->telefono)) {
            $errores[] = "El número de teléfono es obligatorio.";
        }
        if (empty($this->correo)) {
            $errores[] = "El correo electrónico es obligatorio.";
        }
        if (empty($this->evento)) {
            $errores[] = "Debe seleccionar al menos un evento.";
        }
        if (empty($this->fecha)) {
            $errores[] = "La fecha de realización es obligatoria.";
        }
        if (empty($this->lugar)) {
            $errores[] = "El lugar es obligatorio.";
        }
        return $errores;
    }

    private function validarEdad (){
        $fechaActual = new DateTime();
        $fechaNacimiento = new DateTime($this->fecha_nacimiento);
        $edad = $fechaActual->diff($fechaNacimiento)->y;
        return $edad;
    }

    public function mensajeExito() {
        $eventos = implode(", ", $this->evento);
        return "<p>Suscripción exitosa para {$this->nombre} {$this->apellido}. Por suscribirse al <b>{$eventos}</b>
        que se sealizara {$this->fecha} en el lugar {$this->lugar}</p>";
    }


}
?>