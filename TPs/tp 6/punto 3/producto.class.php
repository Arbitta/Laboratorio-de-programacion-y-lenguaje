<?php
class Producto_class{
    private $idProducto;
    private $nombre;
    private $importe;
    private $cantidad;
    public function __construct(){
    }
    
    public function getIdProducto(){
        return $this->idProducto;
    }

    public function setIdProducto($id){
        $this->idProducto = $id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getImporte(){
        return $this->importe;
    }

    public function setImporte($importe){
        $this->importe = $importe;
    }

    public function getCantidad(){
        return $this->cantidad;
    }

    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }

    //este es para el select
    public static function buscaTodoProducto(){
        $listaProducto = array();
        $bd = new mysqli("localhost", "root", "", "punto345");
        $query = "SELECT * FROM producto";
        $listado = $bd->query($query);
        while ($registro = $listado->fetch_object()) {
            $productoTemp = new Producto_class();
            $productoTemp->setIdProducto($registro->id);
            $productoTemp->setNombre($registro->nombre);
            $listaProducto[] = $productoTemp;
        }
        $bd->close();
        $listado->free();
        return $listaProducto;
    }

    public static function buscaUnProducto($idProducto){
        $unProducto = NULL;
        $bd = new mysqli("localhost", "root", "", "punto345");
        $query = "SELECT * FROM producto WHERE id = $idProducto";
        $lista = $bd->query($query);
        while ($registro = $lista->fetch_object()) {
            $unProducto = new Producto_class();
            $unProducto->setIdProducto($registro->id);
            $unProducto->setNombre($registro->nombre);
            $unProducto->setImporte($registro->precio);
            $unProducto->setCantidad($registro->stock);
        }
        return $unProducto;
    }
}
?>