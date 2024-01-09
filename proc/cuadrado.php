<?php

class Cuadrado extends FiguraGeometrica implements PerimetroM {

    public function Perimetro() {
        return 4 * floatval($this -> lado1);
    }

    public function Area() {
        return  floatval($this -> lado1) * floatval($this -> lado1);
    }

    function __toString()
    {
        return "Cuadrado, lado1: ".$this -> lado1;
    }
}

?>