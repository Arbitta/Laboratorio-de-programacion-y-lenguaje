<?php 
class Contador {
    private $visitas;

    public function __construct() {
        if (isset($_SESSION['visitas'])) {
            $this->visitas = $_SESSION['visitas'];
        } else {
            $this->visitas = 0;
        }
    }

    public function incrementar() {
        $this->visitas++;
        $_SESSION['visitas'] = $this->visitas;
    }

    public function getVisitas() {
        return $this->visitas;
    }
}
?>