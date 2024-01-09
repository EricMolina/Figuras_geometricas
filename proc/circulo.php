<?php

class Circulo extends FiguraGeometrica implements PerimetroM {

    public function Perimetro() {
        return 2 * pi() * floatval($this -> lado1); //lado 1 = radio
    }

    public function Area() {
        return pi() * floatval($this -> lado1) * floatval($this -> lado1); //lado 1 = radio
    }

    function __toString()
    {
        return "Circulo, lado1: ".$this -> lado1; //lado 1 = radio
    }
}

?>