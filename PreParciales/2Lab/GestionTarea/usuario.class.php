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
    
    public function limpiarTareas(){
        $this->listaTareaPendiente = [];
        $this->listaTareaFinalizada = [];
    }

    public function agregarTareaFinalizada($tarea){
        $this->listaTareaFinalizada[]=$tarea;
        $indice = array_search($tarea, $this->listaTareaPendiente);
        unset($this->listaTareaPendiente[$indice]);
        $this->listaTareaPendiente = array_values($this->listaTareaPendiente);
    }

    public function actualizarVisita(){
        $this->cantVisita++;
        $this->ultimaConexion = date("H:i");
    }
}
?>