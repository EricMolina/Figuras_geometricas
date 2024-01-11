// ERIC MOLINA MOLINA - DAW 2

var figuraSeleccionada = "";
const figuras = {
    "triangulo": 2,
    "rectangulo": 2,
    "cuadrado": 1,
    "circulo": 1
}

window.onload = function() {
    document.getElementById('lado1').addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            CargarFigura();
        }
    });
    
    document.getElementById('lado2').addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            CargarFigura();
        }
    });
}

function CargarLadosForm(figura) {
    figuraSeleccionada = figura;
    

    lado1.style.display = "inline-block";
    lado1_.style.display = "inline-block";
    lado2.style.display = figuras[figuraSeleccionada] == 2 ? "inline-block" : "none";
    lado2_.style.display = figuras[figuraSeleccionada] == 2 ? "inline-block" : "none";
    document.getElementsByClassName("lados_margin")[0].style.display = figuras[figuraSeleccionada] == 2 ? "none" : "inline-block";

    //Transicion: figuras -> lados

    document.getElementById("figuras_container").classList.remove('in_anim');
    document.getElementById("figuras_container").classList.add('out_anim');

    document.getElementById("lados_container").classList.remove('initial_display_none');
    document.getElementById("lados_container").classList.remove('out_anim');
    document.getElementById("lados_container").classList.add('in_anim');

    //document.getElementById("figuras_container").style.display = "none";
    //document.getElementById("lados_container").style.display = "inline-block";
}

function CargarFigura() {
    const valorLado1 = document.getElementById("lado1").value;
    const valorLado2 = document.getElementById("lado2").value;

    var ajax = new XMLHttpRequest();
    ajax.open('POST', './proc/calcular.php');

    var formData = new FormData();
    formData.append('tipoFigura', figuraSeleccionada);
    formData.append('valorLado1', valorLado1);
    formData.append('valorLado2', valorLado2);

    ajax.onload = function () {
        if (ajax.status == 200) {
            document.getElementById("result").innerHTML = ajax.responseText;

            resultado_texto_lado2.style.display = figuras[figuraSeleccionada] == 2 ? "inline-block" : "none";
            document.getElementsByClassName("resultado_margin")[0].style.display = figuras[figuraSeleccionada] == 2 ? "none" : "inline-block";

            //Transicion: lados -> resultado

            document.getElementById("lados_container").classList.remove('in_anim');
            document.getElementById("lados_container").classList.add('out_anim');

            document.getElementById("resultado_container").classList.remove('initial_display_none');
            document.getElementById("resultado_container").classList.remove('out_anim');
            document.getElementById("resultado_container").classList.add('in_anim');

            //document.getElementById("lados_container").style.display = "none";
            //document.getElementById("resultado_container").style.display = "inline-block";

        } else {
            alert("algo ha ido mal");
        }
    }
    ajax.send(formData);
    return true;
}

function ClearFigura() {

    document.getElementById("lado1").value = 0;
    document.getElementById("lado2").value = 0;

    //Transicion: resultado -> figuras

    document.getElementById("resultado_container").classList.remove('in_anim');
    document.getElementById("resultado_container").classList.add('out_anim');

    document.getElementById("figuras_container").classList.remove('out_anim');
    document.getElementById("figuras_container").classList.add('in_anim');


    //document.getElementById("resultado_container").style.display = "none";
    //document.getElementById("figuras_container").style.display = "inline-block";
}