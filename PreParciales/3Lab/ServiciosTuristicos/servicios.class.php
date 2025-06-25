<?php 
class Servicios_class{
    private $idServicio;
    private $ciudadOrigenServicio;
    private $ciudadDestinoServicio;

    private $nroServicio;
    private $estacionOrigen;
    private $estacionDestino;
    private $horaSalida;
    private $horaLlegada;
    private $frecuencia;
    private $precio;

    function __construct(){
    }

    public function getIdServicio(){
        return $this->idServicio;
    }

    public function setIdServicio($id){
        $this->idServicio = $id;
    }

    public function getCiudadOrigen(){
        return $this->ciudadOrigenServicio;
    }

    public function setCiudadOrigen($ciudadOrigen){
        $this->ciudadOrigenServicio = $ciudadOrigen;
    }

    public function getCiudadDestino(){
        return $this->ciudadDestinoServicio;
    }

    public function setCiudadDestino($ciudadDestino){
        $this->ciudadDestinoServicio = $ciudadDestino;
    }

    public function getNroServicio (){
        return $this->nroServicio;
    }

    public function setNroServicio($nroServicio){
        $this->nroServicio = $nroServicio;
    }

    public function getEstacionOrigen(){
        return $this->estacionOrigen;
    }

    public function setEstacionOrigen($estacionOrigen){
        $this->estacionOrigen = $estacionOrigen;
    }

    public function getEstacionDestino (){
        return $this->estacionDestino;
    }

    public function setEstacionDestino($estacionDestino){
        $this->estacionDestino =$estacionDestino;
    }

    public function getHoraSalida(){
        return $this->horaSalida;
    }

    public function setHoraSalida($horaSalida){
        $this->horaSalida = $horaSalida;
    }

    public function getHoraLlegada(){
        return $this->horaLlegada;
    }

    public function setHoraLlegada($horaLlegada){
        $this->horaLlegada =$horaLlegada;
    }

    public function getFrecuencia(){
        return $this->frecuencia;
    }

    public function setFrecuencia($frecuencia){
        $this->frecuencia = $frecuencia;
    }

    public function getPrecio (){
        return $this->precio;
    }

    public function setPrecio ($precio){
        $this->precio = $precio;
    }

    public static function getServicioOrigenBD(){
        $listaServicio = array();
        $bd = new mysqli("localhost", "root", "", "raileurope");
        $query = "SELECT DISTINCT ciudadOrigenServicio FROM servicios";
        $resultado = $bd->query($query);
        while ($registro = $resultado->fetch_object()) {
            $servico = new Servicios_class();
            $servico->setCiudadOrigen($registro->ciudadOrigenServicio);
            $listaServicio[] = $servico;
        }
        return $listaServicio;
    }

    public static function getServicioDestinoBD(){
        $listaServicios = array();
        $bd = new mysqli("localhost", "root", "", "raileurope");
        $query = "SELECT DISTINCT ciudadDestinoServicio FROM servicios";
        $resultado = $bd->query($query);
        while ($registro = $resultado->fetch_object()) {
            $servicio = new Servicios_class();
            $servicio->setCiudadDestino($registro->ciudadDestinoServicio);
            $listaServicios[] = $servicio;
        }
        return $listaServicios;
    }

    public static function serviciosUnFiltro($idEmpresa, $primerFiltro){
        $listaServicios = array();
        $bd = new mysqli("localhost", "root", "", "raileurope");
        $query = "SELECT nroServicio, estacionOrigenServicio, estacionDestinoServicio, horaSalidaServicio, horaLlegadaServicio, frecuenciaServicio, precioServicio FROM servicios WHERE idEmpresa = '$idEmpresa' AND ciudadOrigenServicio = '$primerFiltro';";
        $resultado = $bd->query($query);
        while ($registro = $resultado->fetch_object()) {
            $servicios = new Servicios_class();
            $servicios->setNroServicio($registro->nroServicio);
            $servicios->setEstacionOrigen($registro->estacionOrigenServicio);
            $servicios->setEstacionDestino($registro->estacionDestinoServicio);
            $servicios->setHoraSalida($registro->horaSalidaServicio);
            $servicios->setHoraLlegada($registro->horaLlegadaServicio);
            $servicios->setFrecuencia($registro->frecuenciaServicio);
            $servicios->setPrecio($registro->precioServicio);
            $listaServicios[] = $servicios;
        }
        return $listaServicios;
    }

    public static function serviciosDosFiltro($idEmpresa, $segundoFiltro){
        $listaServicios = array();
        $bd = new mysqli("localhost", "root", "", "raileurope");
        $query = "SELECT nroServicio, estacionOrigenServicio, estacionDestinoServicio, horaSalidaServicio, horaLlegadaServicio, frecuenciaServicio, precioServicio FROM servicios WHERE idEmpresa = '$idEmpresa' AND ciudadDestinoServicio = '$segundoFiltro';";
        $resultado = $bd->query($query);
        while ($registro = $resultado->fetch_object()) {
            $servicios = new Servicios_class();
            $servicios->setNroServicio($registro->nroServicio);
            $servicios->setEstacionOrigen($registro->estacionOrigenServicio);
            $servicios->setEstacionDestino($registro->estacionDestinoServicio);
            $servicios->setHoraSalida($registro->horaSalidaServicio);
            $servicios->setHoraLlegada($registro->horaLlegadaServicio);
            $servicios->setFrecuencia($registro->frecuenciaServicio);
            $servicios->setPrecio($registro->precioServicio);
            $listaServicios[] = $servicios;
        }
        return $listaServicios;
    } 

    public static function serviciosAmbosFiltros($idEmpresa, $primerFiltro, $segundoFiltro){
        $listaServicios = array();
        $bd = new mysqli("localhost", "root", "", "raileurope");
        $query = "SELECT nroServicio, estacionOrigenServicio, estacionDestinoServicio, horaSalidaServicio, horaLlegadaServicio, frecuenciaServicio, precioServicio FROM servicios WHERE idEmpresa = '$idEmpresa' AND ciudadOrigenServicio ='$primerFiltro' AND ciudadDestinoServicio = '$segundoFiltro';";
        $resultado = $bd->query($query);
        while ($registro = $resultado->fetch_object()) {
            $servicios = new Servicios_class();
            $servicios->setNroServicio($registro->nroServicio);
            $servicios->setEstacionOrigen($registro->estacionOrigenServicio);
            $servicios->setEstacionDestino($registro->estacionDestinoServicio);
            $servicios->setHoraSalida($registro->horaSalidaServicio);
            $servicios->setHoraLlegada($registro->horaLlegadaServicio);
            $servicios->setFrecuencia($registro->frecuenciaServicio);
            $servicios->setPrecio($registro->precioServicio);
            $listaServicios[] = $servicios;
        }
        return $listaServicios;
    }

}
?>