<?php
class script1 {
    private $rango;
    public function __construct($rango) {
        $this->rango = $rango;
    }

    public function getRango(){
        return $this->rango;
    }
    
    public function par (){
        echo "Numeros pares: <br>" ;
        foreach ($this->getRango() as $value) {
            if($value %2 == 0){
                echo $value.", ";
            }
        }
        echo"<br>";
    }

    public function impar (){
        echo "Numero Impares: <br>";
        foreach ($this->getRango() as $value) {
            if($value %2 != 0){
                echo $value.", ";
            }
        }
        echo "<br>";    
    }

    public function primos() {
        echo "Números primos: <br>";
        foreach ($this->getRango() as $value) {
            if ($this->esPrimo($value)) {
                echo $value . ", ";
            }
        }
        echo "<br>";
    }

    private function esPrimo($num) {
        if ($num < 2) return false;
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) return false;
        }
        return true;
    }
}
?>