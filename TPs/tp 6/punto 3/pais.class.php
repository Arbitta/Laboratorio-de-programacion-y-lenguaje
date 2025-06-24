<?php 
class Pais_class{
    private $idPais;
    private $nombrePais;

    function __construct(){
    }

    public function getIdPais(){
        return $this->idPais;
    }

    public function setIdPais($pais){
        $this->idPais = $pais;
    }

    public function getNombrePais(){
        return $this->nombrePais;
    }

    public function setNombrePais($nombre){
        $this->nombrePais = $nombre;
    }

    public static function getPaisBD (){
        $listaPaises = array();
        $bd = new mysqli("localhost", "root", "", "punto345");
        $query = "SELECT * FROM  pais";
        $resultado = $bd->query($query);
        while ($registro = $resultado->fetch_object()) {
            $pais = new Pais_class();
            $pais->setIdPais($registro->id);
            $pais->setNombrePais($registro->nombre);
            $listaPaises[] = $pais;
        }
        return $listaPaises;
    }
}
?>