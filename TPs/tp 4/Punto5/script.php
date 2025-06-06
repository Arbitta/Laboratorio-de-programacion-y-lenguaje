<?php 
class calculo {
    private $tipoBolsa;
    private $Cantidad;

    public function __construct($tipoBolsa, $Cantidad) {
        $this->tipoBolsa = $tipoBolsa;
        $this->Cantidad = $Cantidad;
    }

    public function getTipoBolsa() {
        return $this->tipoBolsa;
    }
    public function getCantidad() {
        return $this->Cantidad;
    }

    public function calularTotal(){
        $gramosPorMes = $this->getCantidad() * 30; // Gramos que come por mes
        $capacidadBolsa = $this->calculoCapacidad($this->getTipoBolsa()); // Capacidad de la bolsa en gramos
        $total = ceil($gramosPorMes / $capacidadBolsa); // Total de bolsas necesarias
        return  "<p style='color:green'>Debe comprar ".$total." bolsas diferentes</p>";
    }

    private function calculoCapacidad($tipoBolsa){
        switch ($tipoBolsa) {
            case '0.5':
                return 500;
            case '1':
                return 1000;
            case '3':
                return 3000;
            default:
                return 0;
        }
    }
}
?>