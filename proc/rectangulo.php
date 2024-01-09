<?php

class Rectangulo extends FiguraGeometrica implements PerimetroM {
    public $lado2;

    public function SetLado2($lado2) {
        $this -> lado2 = $lado2;
    }
    public function GetLado2() {
        return $this -> lado2;
    }

    function __construct($tipoFigura, $lado1, $lado2) {
        $this -> SetTipoFigura($tipoFigura);
        $this -> SetLado1($lado1);
        $this -> SetLado2($lado2);
    }

    public function Perimetro() {
        return 2 * (floatval($this -> lado1) + floatval($this -> lado2));
    }

    public function Area() {
        return  floatval($this -> lado1) * floatval($this -> lado2);
    }

    function __toString()
    {
        return "Rectangulo, lado1: ".$this -> lado1.", lado2: ".$this -> lado2;
    }
}

?>