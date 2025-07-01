<?php

class Producto_class
{
    private $idProducto;
    private $nombreProducto;

    private $supermercado;
    private $precio;
    private $ubicacion;

    function __construct(){
    }

    public function getIdProducto(){
        return $this->idProducto;
    }

    public function setIdProducto($idProducto){
        $this->idProducto = $idProducto;
    }

    public function getNombreProducto(){
        return $this->nombreProducto;
    }

    public function setNombreProducto($nombreProducto){
        $this->nombreProducto = $nombreProducto;
    }
    public function getSupermercado(){
        return $this->supermercado;
    }

    public function setSupermercado($supermercado){
        $this->supermercado = $supermercado;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
    }

    public function getUbicacion(){
        return $this->ubicacion;
    }

    public function setUbicacion($ubicacion){
        $this->ubicacion = $ubicacion;
    }

    public static function getProductosBD(){
        $listaProducto =array();
        $bd = new  mysqli("localhost", "root", "", "comparador");
        $query = "SELECT * FROM producto";
        $resultado = $bd->query($query);
        while ($registro = $resultado->fetch_object()) {
            $producto = new Producto_class();
            $producto->setIdProducto($registro->id_producto);
            $producto->setNombreProducto($registro->nombre);
            $listaProducto[] = $producto;
        }
        return $listaProducto;
    }

    public static function getFiltroProducto($producto){
        $listaResultado = array();
        $bd = new mysqli("localhost", "root", "", "comparador");
        $query = "SELECT s.nombre, p.precio , s.ubicacion 
                FROM producto pr 
                INNER JOIN precios p ON pr.id_producto = p.id_producto 
                INNER JOIN supermercado s ON p.id_supermercado = s.id_supermercado 
                WHERE pr.nombre = '$producto'";
        $resultado = $bd->query($query);
        while ($registro = $resultado->fetch_object()) {
            $producto = new Producto_class();
            $producto->setSupermercado($registro->nombre);
            $producto->setPrecio($registro->precio);
            $producto->setUbicacion($registro->ubicacion);
            $listaResultado[] = $producto;
        }
        return $listaResultado;
    }
}