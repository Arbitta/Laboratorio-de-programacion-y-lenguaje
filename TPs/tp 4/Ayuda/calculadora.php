<?php
class Calculadora{
    private $num1;
    private $num2;
public function __construct($num1, $num2){
    $this->num1 = $num1;
    $this->num2 = $num2;
}

public function getNum1(){
    return $this->num1;
}
public function getNum2(){
    return $this->num2;
}
//binomica
public function binomica (){
    $num = $this->getNum1();
    $num2 = $this->getNum2();
    echo "Forma binomica del num1: ". $num[0]."  ".$num[1]."i <br>";
    echo "Forma binomica del num2: ". $num2[0]."  ".$num2[1]."i <br>";
}

public function modulo (){
    $num = $this ->getnum1();
    $num2 = $this ->getnum2();
    $respuesta =0;
    $respuesta = $this->raiz($num);
    echo "Modulo del 1er num: ".$respuesta. "<br>";
    $respuesta = $this->raiz($num2);
    echo "Modulo del 2do num: ".$respuesta. "<br>";
}

public function raiz($num){
    return sqrt($num[0]**2 + $num[1]**2);
}

public function conjugado(){
    $num1 = $this -> getnum1();
    $num2 = $this -> getnum2(); 
    echo "Conjungado del 1er num: ". $num1[0]."," . (-1*$num1[1])."i<br>";
    echo "Conjungado del 2do num: ". $num2[0]."," . (-1*$num2[1])."i<br>";
}

public function suma(){
    $real = $this->getNum1()[0] + $this->getNum2()[0];
    $imag = $this->getNum1()[1] + $this->getNum2()[1];
    echo "Suma de los numeros: ".$real." ".$imag."i<br>";
}
}
?>