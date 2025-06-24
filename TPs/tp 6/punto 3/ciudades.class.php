<?php 
class Ciudades_class {
    private $idCiudad;
    private $nombreCiudad;
    private $importe;

    function __construct(){
    }

    public function getIdeCiudad(){
        return $this->idCiudad;
    }
    
    public function setIdCiudad($idCiudad){
        $this->idCiudad = $idCiudad;
    }

    public function getNombreCiudad(){
        return $this->nombreCiudad;
    }

    public function setNombreCiudad($nombreCiudad){
        $this->nombreCiudad = $nombreCiudad;
    }

    public function getImporte(){
        return $this->importe;
    }

    public function setImporte($importe){
        $this->importe = $importe;
    }

    public static function getCiudadesBD($idPais){
        $listaCiudades = array();
        $bd = new mysqli("localhost", "root", "", "punto345");
        $query = "SELECT c.id, c.nombre, e.costo_envio FROM ciudad c JOIN envio e ON c.id = e.id_ciudad WHERE id_pais = $idPais";
        $resultado = $bd->query($query);
        while ($registro = $resultado->fetch_object()) {
            $ciudad = new Ciudades_class();
            $ciudad->setIdCiudad($registro->id);
            $ciudad->setNombreCiudad($registro->nombre);
            $ciudad->setImporte($registro->costo_envio);
            $listaCiudades[] = $ciudad;
        }
        return $listaCiudades;
    }
}
?>