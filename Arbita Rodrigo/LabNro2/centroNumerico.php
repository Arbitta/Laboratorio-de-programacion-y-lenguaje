<?php 
class CentroNumerico {
    private $intentos;
    private $listaDeCentrosNumericos; 
    private $puntaje;

    public function __construct() {
        $this->listaDeCentrosNumericos = array(6, 35); // Inicializa la lista de centros numéricos conocidos
        $this->intentos = 0;
        $this->puntaje = 10;
    }
    public function getIntentos() {
        return $this->intentos;
    }
    public function getPuntaje() {
        return $this->puntaje;
    }

    public function setPuntaje($puntaje) {
        $this->puntaje = $puntaje;
    }

    public function getCentroNumerico() {
        return $this->listaDeCentrosNumericos;
    }

    public function descrementarPuntos(){
        $this->puntaje -= 1;
        if ($this->puntaje < 0) {
            $this->puntaje = 0; 
        }
    }

    public function esCentroNumerico($numeroIngresado){
        foreach ($this->getCentroNumerico() as $value) {
            if ($numeroIngresado == $value) {
                return true; 
            }
        }
        
    }
    public function distancia ($numeroIngresado){
        foreach ($this->getCentroNumerico() as $value) {
            if ($numeroIngresado == $value) {
                return 0;
            } else {
                $distancia = abs($numeroIngresado - $value);
                if ($distancia <= 5) {
                    return "cerca";
                } else {
                    return "lejos"; 
                }
            }
        }
    }
}
?>