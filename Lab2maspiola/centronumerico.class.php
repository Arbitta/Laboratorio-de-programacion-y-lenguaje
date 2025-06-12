<?php
class Centronumerico_class{
    private $puntaje;
    private $NrodeJuego;
    private $listadeNumeroIngresado;
    private $mensaje;

    public function __construct(){
        $this->puntaje = 10;
        $this->NrodeJuego = 0;
        $this->listadeNumeroIngresado = [];
        $this->mensaje = "";   
    }

    public function getPuntaje(){
        return $this->puntaje;
    }

    public function getNrodeJuego(){
        return $this->NrodeJuego;
    }

    public function getListadeNumeroIngresado(){
        return $this->listadeNumeroIngresado;
    }

    public function setPuntaje($puntaje){
        $this->puntaje = $puntaje;
    }

    public function setNrodeJuego($NrodeJuego){
        $this->NrodeJuego = $NrodeJuego;
    }

    public function agregarNumero($numero){
        $this->listadeNumeroIngresado[] = $numero;
    }

    public function getMensaje(){
        return $this->mensaje;
    }

    public function jugar($numeroIngresado){
        $this->puntaje -= 1;
        $this->estaCerca($numeroIngresado);
        $this->agregarNumero($numeroIngresado);
    }

    public function esCentroNumerico($numeroIngresado){
        $sumaIzq = 0;
        $sumaDer = 0;
        for ($i=1; $i < $numeroIngresado ; $i++) { 
            $sumaIzq += $i;
        }
        for ($i= $numeroIngresado + 1; $i < $sumaIzq  ; $i++) { 
            $sumaDer += $i;
            if ($sumaIzq == $sumaDer) {
                return true;
            }
        }
        return false;
    }

    public function estaCerca($numero) {
        //pancho supremo//

        for ($i = $numero - 5; $i <= $numero + 5; $i++) {
            if ($i > 0 && $this->esCentroNumerico($i)) {
                if ($i === $numero) {
                    return $this->mensaje = "Encontraste un centro numérico.";
                } else {
                    return $this->mensaje = "Estás cerca de un centro numérico.";
                }
            }
        }
        return $this->mensaje = "Estás lejos de un centro numérico.";
    }

    public function setTodo(){
        $this->puntaje = 10;
        $this->listadeNumeroIngresado = [];
        $this->mensaje = "";
    }
}
?>