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

echo '<p>Tipo figura: '.$figura->GetTipoFigura().'</p>';
echo '<p>Área: '.round($figura->Area(), 2).'</p>';
echo '<p>Perímetro: '.round($figura->Perimetro(), 2).'</p>';
?>