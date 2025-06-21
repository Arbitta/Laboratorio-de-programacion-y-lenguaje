<?php 
class jugador {
    private $nombreJugador;
    private $puntuacion;
    private $tiradas;
    private $numeroJuego;
    private $mensaje;
    public function __construct($nombreJugador) {
        $this->nombreJugador = $nombreJugador;
        $this->puntuacion = 20;
        $this->tiradas = 0;
        $this->numeroJuego = 1;
        $this->mensaje = "";
    }

    public function getNombreJugador(){
        return $this->nombreJugador;
    }

    public function getPuntuacion (){
        return $this->puntuacion;
    }

    public function setPuntuacion($puntuacion){
        $this->puntuacion = $puntuacion;
    }

    public function getTiradas(){
        return $this->tiradas;
    }

    public function getNroDeJuego(){
        return $this->numeroJuego;
    }
    public function getMensaje(){
        return $this->mensaje;
    }
    public function setMensaje($mensaje){
        $this->mensaje = $mensaje;
    }

    public function seteaDatos(){
        $this->puntuacion = 20;
        $this-> tiradas = 0;
        $this->mensaje = "";
    }

    public function setNroDeJuego($numeroJuego){
        $this->numeroJuego = $numeroJuego;
    }

    public function jugar($dado, jugador $oponente){
        $this->tiradas++;
        $this->setMensaje("Jugador " . $this->getNombreJugador() . " ha tirado y salio " . $dado);
        switch ($dado) {
            case '1':
                $this->puntuacion += 6;
                $oponente->setPuntuacion($oponente->getPuntuacion() - 6);
                break;
            case '2':
                break;
            case '3':
                $this->puntuacion -=2;
                $oponente->setPuntuacion($oponente->getPuntuacion() + 4);
                break;
            case '4':
                $this->puntuacion += 4;
                $oponente->setPuntuacion($oponente->getPuntuacion() - 2);
                break;
            case '5':
                $this->puntuacion -= 3;
                $oponente->setPuntuacion($oponente->getPuntuacion() - 3);
                break;
            case '6':
                $this->puntuacion += 1;
                $oponente->setPuntuacion($oponente->getPuntuacion() - 3);
                break;    
            default:
                echo "error";
            break;
            
        }
        
    }


}
?>