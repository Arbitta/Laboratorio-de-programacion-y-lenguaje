<?php

class Supermercado_class{
    private $producto;
    private $precio;
    private $supermercado;
    private $ubicacion;

    function __construct(){
    }
    public function getProducto(){
        return $this->producto;
    }

    public function setProducto($producto){
        $this->producto = $producto;
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
    }

    public function getSupermercado(){
        return $this->supermercado;
    }

    public function setSupermercado($supermercado){
        $this->supermercado = $supermercado;
    }

    public function getUbicacion(){
        return $this->ubicacion;
    }

    public function setUbicacion($ubicacion){
        $this->ubicacion = $ubicacion;
    }

    public static function getFiltroProducto($producto){
        $listaResultado = array();
        $bd = new mysqli("localhost","root", "","comparador");
        //hace un alias para el nombre de producto
        $query = "SELECT pr.nombre, p.precio, s.nombre AS nombre_supermercado, s.ubicacion 
                FROM supermercado s 
                INNER JOIN precios p ON s.id_supermercado = p.id_supermercado 
                INNER JOIN producto pr ON p.id_producto = pr.id_producto 
                WHERE p.id_producto = '$producto';";
        $resultado = $bd->query($query);
        while ($registro = $resultado->fetch_object()) {
            $supermercado = new Supermercado_class();
            $supermercado->setProducto($registro->nombre);
            $supermercado->setPrecio($registro->precio);
            $supermercado->setSupermercado($registro->nombre_supermercado);
            $supermercado->setUbicacion($registro->ubicacion);
            $listaResultado[] = $supermercado;
        }
        $bd->close();
        $resultado->free();
        return $listaResultado;
    }

    public static function getFiltroUbicacion($ubicacion){
        $lista = array();
        $bd = new mysqli("localhost", "root", "", "comparador");
        $query = "SELECT pr.nombre, p.precio, s.nombre AS nombre_supermercado, s.ubicacion 
                FROM supermercado s 
                INNER JOIN precios p ON s.id_supermercado = p.id_supermercado 
                INNER JOIN producto pr ON p.id_producto = pr.id_producto 
                WHERE s.ubicacion = '$ubicacion'";
        
        $resultado = $bd->query($query);
        while ($registro = $resultado->fetch_object()) {
            $supermercado = new Supermercado_class();
            $supermercado->setProducto($registro->nombre);
            $supermercado->setPrecio($registro->precio);
            $supermercado->setSupermercado($registro->nombre_supermercado);
            $supermercado->setUbicacion($registro->ubicacion);
            $lista[] = $supermercado;
        }
        $bd->close();
        $resultado->free();
        return $lista;
    }

    public static function getAmbosFiltros($producto, $ubicacion){
        $lista = array();
        $bd = new mysqli("localhost", "root", "", "comparador");
        $query = "SELECT pr.nombre, p.precio, s.nombre AS nombre_supermercado, s.ubicacion 
                FROM supermercado s 
                INNER JOIN precios p ON s.id_supermercado = p.id_supermercado 
                INNER JOIN producto pr ON p.id_producto = pr.id_producto 
                WHERE p.id_producto = '$producto' AND s.ubicacion = '$ubicacion';";
        $resultado = $bd->query($query);
        while ($registro = $resultado->fetch_object()) {
            $supermercado = new Supermercado_class();
            $supermercado->setProducto($registro->nombre);
            $supermercado->setPrecio($registro->precio);
            $supermercado->setSupermercado($registro->nombre_supermercado);
            $supermercado->setUbicacion($registro->ubicacion);
            $lista[] = $supermercado;
        }
        $bd->close();
        $resultado->free();
        return $lista;
    }
}