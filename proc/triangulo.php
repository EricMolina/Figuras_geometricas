<?php

class Triangulo extends FiguraGeometrica implements PerimetroM {
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
        return floatval($this -> lado1) + floatval($this -> lado2) + floatval($this -> lado2);
    }

    public function Area() {
        // Calcular la altura
        $altura = sqrt(pow(floatval($this -> lado2), 2) - pow(floatval($this -> lado1) / 2, 2));

        // Calcular el área
        $area = 0.5 * floatval($this -> lado1) * $altura;
        if (is_nan($area))
            return -1;
        return $area;
    }

    function __toString()
    {
        return "Triangulo, lado1: ".$this -> lado1.", lado2: ".$this -> lado2;
    }
}

?>