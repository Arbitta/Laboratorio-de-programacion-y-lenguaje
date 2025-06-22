<?php 
class Persona_class{
    private $documento;
    private $apellido;
    private $nombre;
    private $fechaNacimiento;
    private $domicilio;
    private $productoComprados = [];

    function __construct(){
    }
    
    public function getDocumento (){
        return $this->documento;
    }
    public function setDocumento($documento){
        $this->documento = $documento;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre ($nombre){
        $this->nombre = $nombre;
    }
    public function getFechaNacimiento(){
        return $this->fechaNacimiento;
    }
    public function setFechaNacimiento ($fechaNacimiento){
        $this->fechaNacimiento = $fechaNacimiento;
    }
    public function getDomicilio(){
        return $this->domicilio;
    }
    public function setDomicilio ($domicilio){
        $this->domicilio = $domicilio;
    }
    public function getProductos(){
        return $this->productoComprados; 
    }
    public function agregarProductos ($productos){
        $this->productoComprados[] = $productos;
    }

    public static function buscarDni($dni){
        $bd = new mysqli("localhost", "root", "", "punto2");
        $query = "SELECT c.dni, c.apellido, c.nombre, c.fecha_nacimiento, c.domicilio, p.nombre_producto FROM clientes c INNER JOIN productos p ON c.dni = p.dni_cliente
                WHERE c.dni = $dni";
        $lista = $bd->query($query);
        $persona = NULL;
        while($registro = $lista->fetch_object()){
            if ($persona === null) {
                $persona = new Persona_class();
                $persona->setDocumento($registro->dni);
                $persona->setApellido($registro->apellido);
                $persona->setNombre($registro->nombre);
                $persona->setFechaNacimiento($registro->fecha_nacimiento);+
                $persona->setDomicilio($registro->domicilio);
            }
            $persona->agregarProductos($registro->nombre_producto);
        }
        return $persona;
    }

}
?>