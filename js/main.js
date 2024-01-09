// ERIC MOLINA MOLINA - DAW 2

const desplegableID = "figuras";
const submitID = "submit";
const figuras = {
    "triangulo": 2,
    "rectangulo": 2,
    "cuadrado": 1,
    "circulo": 1
}

window.onload = function () {
    document.getElementById(desplegableID).onchange = CargarLadosForm;
    document.getElementById(submitID).onclick = CargarFigura;
    document.getElementById("clear").onclick = ClearFigura;
}

function CargarLadosForm() {
    const desplegable = document.getElementById(desplegableID);
    lado1.style.display = "inline-block";
    lado1_.style.display = "inline-block";
    lado2.style.display = figuras[desplegable.value] == 2 ? "inline-block" : "none";
    lado2_.style.display = figuras[desplegable.value] == 2 ? "inline-block" : "none";
}

function CargarFigura() {

    const desplegable = document.getElementById(desplegableID);
    const tipoFigura = desplegable.value;
    const valorLado1 = document.getElementById("lado1").value;
    const valorLado2 = document.getElementById("lado2").value;

    var ajax = new XMLHttpRequest();
    ajax.open('POST', './proc/calcular.php');

    var formData = new FormData();
    formData.append('tipoFigura', tipoFigura);
    formData.append('valorLado1', valorLado1);
    formData.append('valorLado2', valorLado2);

    ajax.onload = function () {
        if (ajax.status == 200) {
            document.getElementById("result").innerHTML = ajax.responseText;
            document.getElementById("result").style.display = "inline-block";
            document.getElementById("result_container").style.display = "inline-block";

        } else {
            alert("algo ha ido mal");
        }
    }
    ajax.send(formData);
    return true;
}

function ClearFigura() {
    document.getElementById("lado1").value = "";
    document.getElementById("lado2").value = "";
    document.getElementById("result").innerHTML = "";
    document.getElementById("result").style.display = "none";
    document.getElementById("result_container").style.display = "none";
}