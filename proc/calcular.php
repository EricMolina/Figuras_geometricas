<?php

if (!isset($_POST["tipoFigura"])) {
    header("location: ../index.html");
    exit();
}
include("figuraGeometrica.php");
include("perimetroM.php");
if ($_POST["tipoFigura"] == "triangulo") {
    include("triangulo.php");
    $figura = new Triangulo($_POST["tipoFigura"], $_POST["valorLado1"], $_POST["valorLado2"]);
} else if ($_POST["tipoFigura"] == "rectangulo") {
    include("rectangulo.php");
    $figura = new Rectangulo($_POST["tipoFigura"], $_POST["valorLado1"], $_POST["valorLado2"]);
} else if ($_POST["tipoFigura"] == "cuadrado") {
    include("cuadrado.php");
    $figura = new Cuadrado($_POST["tipoFigura"], $_POST["valorLado1"]);
} else if ($_POST["tipoFigura"] == "circulo") {
    include("circulo.php");
    $figura = new Circulo($_POST["tipoFigura"], $_POST["valorLado1"]);
} else {
    exit();
}
$lado2 = isset($figura->lado2) ? $figura->lado2 : 0;
echo '<div id="resultado_titulo">
    <button type="button" onclick="ClearFigura()">VOLVER</button>
</div>
<div id="resultado_figura">
    <img src="./img/'.$figura->GetTipoFigura().'.png" alt="figura">
</div>
<div class="resultado_margin"></div>
<div class="resultado_texto">
    <p>Lado 1: '.$figura->lado1.'</p>
</div>
<div class="resultado_texto" id="resultado_texto_lado2">
    <p>Lado 2: '.$lado2.'</p>
</div>
<div class="resultado_texto">
    <p>Área: '.round($figura->Area(), 2).'</p>
</div>
<div class="resultado_texto">
    <p>Perímetro: '.round($figura->Perimetro(), 2).'</p>
</div>';
?>