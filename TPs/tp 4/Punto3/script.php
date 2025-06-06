<?php
class Tabla {
    private $numero; 

    public function __construct($numero) {
        $this->numero = $numero;
    }
    public function getNumero() {
        return $this->numero;
    }

    public function creacioTabla() {
        $html = "<table border='1'>";
        $html .= "<tr><th colspan='5'>Tabla del ".$this->getNumero()."</th></tr>";
        for ($i = 1; $i <= 10; $i++) {
            $resultado = $i * $this->getNumero();
            $html.= "<tr><td>$i</td><td>X</td><td>".$this->getNumero()."</td><td>=</td><td>$resultado</td></tr>";
        }
        $html.="</table>";
        echo $html;
    }
    
}

?>