<?php 
class Aumento {
    private $salario;
    private $antiguedad;
    private $nombre;

    public function __construct($nombre, $salario, $antiguedad){
        $this->nombre = $nombre;
        $this->salario = $salario;
        $this->antiguedad = $antiguedad;
    }

    public function getSalario () {
        return $this->salario;
    }

    public function getAntiguedad () {
        return $this->antiguedad;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function calculoSalarial(){
        $aumento = 0;
        $porcentaje = $this->calculoAntiguedad($this->getAntiguedad());
        if ($this->getSalario() < 200000) {
            $aumento = $this->getSalario() * $porcentaje;
            $aumento += $this->getSalario();
            return $aumento;
        } else if ($this->getSalario() <= 300000) {
            $porcentaje = $porcentaje * 0.50;
            $aumento = $this->getSalario() * $porcentaje;
            $aumento += $this->getSalario();
            return $aumento;
        } else {
            $porcentaje = $porcentaje * 0.10;
            $aumento = $this->getSalario() * $porcentaje;
            $aumento += $this->getSalario();
            return $aumento;
        }
        
    }

    public function calculoAntiguedad ($antiguedad){
        if ($antiguedad <= 5) {
            return 0.20;
        } else if($antiguedad <= 10){
            return 0.18;
        } else  if ($antiguedad <= 15) {
            return 0.15;
        }
        return 0.12;
    }

}
?>