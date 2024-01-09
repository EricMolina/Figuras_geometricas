<?php

abstract class FiguraGeometrica {
    public $tipoFigura;
    public $lado1;
    abstract function Area();

    public function SetTipoFigura($tipoFigura) {
        $this -> tipoFigura = $tipoFigura;
    }

    public function SetLado1($lado1) {
        $this -> lado1 = $lado1;
    }

    public function GetTipoFigura() {
        return $this -> tipoFigura;
    }

    public function GetLado1() {
        return $this -> lado1;
    }

    function __construct($tipoFigura, $lado1) {
        $this -> SetTipoFigura($tipoFigura);
        $this -> SetLado1($lado1);
    }

    function __destruct() {
        echo '<script type="text/javascript">' .
          'console.log("Figura '.$this -> tipoFigura.' destruida.");</script>';
    }
}

?>