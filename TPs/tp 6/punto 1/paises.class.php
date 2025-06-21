<?php 
class paises {
  private $idPais;
  private $pais; 
  private $ciudades = [];

  function __construct(){
  }
  public function getIdPais(){
    return $this->idPais;
  }

  public function setIdPais($idPais){
    $this->idPais = $idPais;
  }

  public function getPais(){
    return $this->pais;
  }

  public function setPais($pais){
    $this->pais = $pais;
  }

  public function getCiudades (){
    return $this->ciudades;
  }

  public function agregarCiudades($ciudad){
    $this->ciudades[] = $ciudad;
  }

  public static function getpaisesBD(){
    $listaProductos = array();
    $bd = new mysqli("localhost", "root", "", "pais");
    $query = "SELECT p.id_pais, p.nombre AS pais, c.nombre AS ciudad FROM pais p JOIN ciudad c ON p.id_pais = c.id_pais 
    ORDER BY p.id_pais";
    $listadoPaises = $bd->query($query) or die ("No se pudo realizar la consulta");
    $datosAgrupados = [];
    while ($registro = $listadoPaises->fetch_object()){
        $id = $registro->id_pais;

        if (!isset($datosAgrupados[$id])) { //si comparte la id del pais
            $unPais = new paises();
            $unPais->setIdPais($id);
            $unPais->setPais($registro->pais);
            $datosAgrupados[$id] = $unPais;
        }

        $datosAgrupados[$id]->agregarCiudades($registro->ciudad); //guarda en la ciudad
    }
    return $datosAgrupados;
  }

  public static function getPaisBD($id){
    $unPais = NULL;
    $bd = new mysqli("localhost", "root", "", "pais");
    $query = "SELECT p.id_pais, p.nombre AS pais, c.nombre AS ciudad 
              FROM pais p 
              JOIN ciudad c ON p.id_pais = c.id_pais 
              WHERE p.id_pais = $id 
              ORDER BY c.nombre";
    $resultado = $bd->query($query) or die("Error en la consulta");

    while ($registro = $resultado->fetch_object()) {
        if ($unPais === null) {
            $unPais = new paises();
            $unPais->setIdPais($registro->id_pais);
            $unPais->setPais($registro->pais);
        }
        $unPais->agregarCiudades($registro->ciudad);
    }

    $bd->close();
    return $unPais; 
  }
}
?>