<?php 
class calendario {
    private $dias;
    public function __construct($dias) {
        $this->dias = $dias;    
    }

    public function getDias(){
        return $this->dias;
    }
    public function creacioTabla (){
        $html = "<table>";
        $html .= "<tr><th>Do</th><th>Lu</th><th>Ma</th><th>Mi</th><th>Ju</th><th>Vi</th><th>Sa</th></tr>";
        $html .= $this->agregarDias();
        echo $html;
    }

    public function agregarDias() {
        $html = "";
        $html .="<tr>";
        $contador = 0;



        foreach ($this->getDias() as $value) {
            $posicionSemana = $contador % 7;
            $clase = '';
            if ($posicionSemana == 0) {
            $clase = 'domingo';
            } elseif ($posicionSemana == 6) {
            $clase = 'sabado';
            }
            $html .= "<td class='$clase'>$value</td>";
            if ($value % 7 == 0) {
                $html .= "</tr><tr>";
            }  
            $contador++; 
        }
        $html .= "</tr>";
        $html .= "</table>";
        return $html;
    }
}
?>