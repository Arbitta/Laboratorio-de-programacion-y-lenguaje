<?php 
class Usuario_class {
    private $nombre;
    private $listaTareaPendiente;

    private $listaTareaFinalizada;

    private $cantVisita;
    private $ultimaConexion;

    public function __construct($nombre){
        $this->nombre = $nombre;
        $this->listaTareaPendiente = [];
        $this->listaTareaFinalizada = [];
        $this->cantVisita = 0;
        $this->ultimaConexion = date("H:i");
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getListaTareaPendiente(){
        return $this->listaTareaPendiente;
    }

    public function getListaTareaFinalizada(){
        return $this->listaTareaFinalizada;
    }

    public function getCantVisita(){
        return $this->cantVisita;
    }

    public function getUltimaConexion (){
        return $this->ultimaConexion;
    }

    public function agregarTareaPendiente($tarea){
        $this->listaTareaPendiente[] = $tarea;
    }
    
}
?>