<?php 
class Ciudades{
  private $Argentina = ["Buenos Aires", "Comodoro Rivadavia", "Trelew"];
  private $Francia = ["París", "Marsella", "Lyon"];
  private $EEUU = ["Nueva York", "Los Ángeles", "Chicago"];

  function __construct(){
  }

  public function getArgentina(){
    return $this->Argentina;
  }
  public function getFrancia(){
    return $this->Francia;
  }
  public function getEEUU(){
    return $this->EEUU;
  }

  public static function getCiudades(){
    $ciudades = [];
    $ciudades[] = $this->getArgentina();
    $ciudades[] = $this->Francia;
    $ciudades[] = $this->EEUU;
    return $ciudades;
  }

  public static  function getCiudad($ciudad){
    switch ($ciudad) {
      case 'Argentina':
        return $this->Argentina;
      case 'Francia':
        return $this->Francia;
      case 'EEUU':
        return $this->EEUU;
      default:
        break;
    }
  }
}


?>