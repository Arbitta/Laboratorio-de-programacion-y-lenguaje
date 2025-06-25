<?php 
class Empresas_class{
    private $idEmpresa;
    private $nombreEmpresa;
    private $paisEmpresa;
    private $webEmpresa;
    private $logoEmpresa;
    private $cantServicios;

    function __construct(){
    }

    public function getIdEmpresa(){
        return $this->idEmpresa;
    }

    public function setIdEmpresa($idEmpresa){
        $this->idEmpresa = $idEmpresa;
    }

    public function getNombreEmpresa(){
        return $this->nombreEmpresa;
    }

    public function setNombreEmpresa($nombreEmpresa){
        $this->nombreEmpresa = $nombreEmpresa;
    }
    
    public function getPaisEmpresa(){
        return $this->paisEmpresa;
    }

    public function setPaisEmpresa($pais){
        $this->paisEmpresa = $pais;
    }

    public function getWebEmpresa(){
        return $this->webEmpresa;
    }

    public function setWebEmpresa($web){
        $this->webEmpresa = $web;
    }

    public function getLogoEmpresa(){
        return $this->logoEmpresa;
    }

    public function setLogoEmpresa($logoEmpresa){
        $this->logoEmpresa = $logoEmpresa;
    }

    public function getCantVisita(){
        return $this->cantServicios;
    }

    public function setCantVisita($cantVisita){
        $this->cantServicios = $cantVisita;
    }

    public static function getListaTrenesUnFiltro($filtro){
        $listaEmpresa = array();
        $bd = new mysqli("localhost", "root", "","raileurope");
        $query = "SELECT DISTINCT e.idEmpresa, e.nombreEmpresa, e.paisEmpresa, e.logoEmpresa, e.webEmpresa, COUNT(s.idServicio) AS cantidadServicios FROM empresas e INNER JOIN servicios s ON e.idEmpresa = s.idEmpresa WHERE s.ciudadOrigenServicio = '$filtro' GROUP BY e.idEmpresa;";
        $resultado = $bd->query($query);
        while ($registro = $resultado->fetch_object()){
            $empresa = new Empresas_class();
            $empresa->setIdEmpresa($registro->idEmpresa);
            $empresa->setNombreEmpresa($registro->nombreEmpresa);
            $empresa->setPaisEmpresa($registro->paisEmpresa);
            $empresa->setWebEmpresa($registro->webEmpresa);
            $empresa->setLogoEmpresa($registro->logoEmpresa);
            $empresa->setCantVisita($registro->cantidadServicios);
            $listaEmpresa[] = $empresa;
        }
        return $listaEmpresa;
    }

    public static function getListaTrenesDosFiltro($filtro){
        $listaEmpresa = array();
        $bd = new mysqli("localhost", "root", "", "raileurope");
        $query = "SELECT DISTINCT e.idEmpresa, e.nombreEmpresa, e.paisEmpresa, e.logoEmpresa, e.webEmpresa, COUNT(s.idServicio) AS cantidadServicios FROM empresas e INNER JOIN servicios s ON e.idEmpresa = s.idEmpresa WHERE s.ciudadDestinoServicio = '$filtro' GROUP BY e.idEmpresa;";
        $resultado = $bd->query($query);
        while ($registro = $resultado->fetch_object()) {
            $empresa = new Empresas_class();
            $empresa->setIdEmpresa($registro->idEmpresa);
            $empresa->setNombreEmpresa($registro->nombreEmpresa);
            $empresa->setPaisEmpresa($registro->paisEmpresa);
            $empresa->setWebEmpresa($registro->webEmpresa);
            $empresa->setLogoEmpresa($registro->logoEmpresa);
            $empresa->setCantVisita($registro->cantidadServicios);
            $listaEmpresa[] = $empresa;
        }
        return $listaEmpresa;
    }

    public static function getListaAmbosFiltros($filtro1 , $filtro2){
        $listaEmpresa = array();
        $bd = new mysqli("localhost", "root", "", "raileurope");
        $query = "SELECT DISTINCT e.idEmpresa, e.nombreEmpresa, e.paisEmpresa, e.logoEmpresa, e.webEmpresa, COUNT(s.idServicio) AS cantidadServicios FROM empresas e INNER JOIN servicios s ON e.idEmpresa = s.idEmpresa WHERE s.ciudadOrigenServicio = '$filtro1'  AND s.ciudadDestinoServicio = '$filtro2' GROUP BY e.idEmpresa";
        $respuesta = $bd->query($query);
        while ($registro = $respuesta->fetch_object()) {
            $empresa = new Empresas_class();
            $empresa->setIdEmpresa($registro->idEmpresa);
            $empresa->setNombreEmpresa($registro->nombreEmpresa);
            $empresa->setPaisEmpresa($registro->paisEmpresa);
            $empresa->setWebEmpresa($registro->webEmpresa);
            $empresa->setLogoEmpresa($registro->logoEmpresa);
            $empresa->setCantVisita($registro->cantidadServicios);
            $listaEmpresa[] = $empresa;
        }
        return $listaEmpresa;
    }
}
?>