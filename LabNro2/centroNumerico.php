<?php 
class CentroNumerico {
    private $NroDeJuego;
    private $CentrosNumericos; 
    private $puntaje;
    private $numero;
    private $listaDeNumeroIngresado;

    public function __construct() {
        $this->CentrosNumericos = false;
        $this->numero = 0;
        $this->NroDeJuego = 0;
        $this->puntaje = 10;
        $this->listaDeNumeroIngresado = [];
    }
    public function getNrODeJuego() {
        return $this->NroDeJuego;
    }
    public function getPuntaje() {
        return $this->puntaje;
    }

    public function setPuntaje($puntaje) {
        $this->puntaje = $puntaje;
    }

    public function getCentroNumerico() {
        return $this->CentrosNumericos;
    }

    public function setNroDeJuego($NroDeJuego){
        $this->NroDeJuego = $NroDeJuego;
    }

    public function getListaDeNumeroIngresad(){
        return $this->listaDeNumeroIngresado;
    }

    public function esCentroNumerico($numeroIngresado){
        $numIzquierdo = 0;
        $numDerecho = 0;
        $CentroNumerico = 0;
        for ($i=0; $i < $numeroIngresado ; $i++) { 
            $numIzquierdo += $i;
        }
        for ($i=$numeroIngresado+1; $i <= $numIzquierdo; $i++) { 
            $numDerecho += $i;
            if ($numIzquierdo == $numDerecho) {
                $CentroNumerico = $numIzquierdo;
                $this->numero = $CentroNumerico;
                return true;
            }
        }
        return false;
    }
    public function arriesgar (int $numeroIngresado){
        $this->puntaje -= 1;
        $condicion = $this->esCentroNumerico($numeroIngresado);
        if ($condicion) {
            echo "¡Felicidades! Has encontrado el centro numérico.";
        } else {
            $distancia = abs($numeroIngresado - $this->numero);
            if ($distancia <= 5) {
                echo "El número ingresado está muy cerca del centro numérico.";
            } else {
                echo "El número ingresado está lejos del centro numérico.";
            }

        }
    }

    public function setear(){
        $this->puntaje = 10;
        $this->NroDeJuego += 1;
    }
}
?>