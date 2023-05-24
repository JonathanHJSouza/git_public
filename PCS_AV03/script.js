var carro="";
var vetorCarros = [];
var stringCarros = "";

function preencheObjeto{
    
    var Marca = document.getElementById("textMarca").value;
    var Modelo = document.getElementById("txtModelo").value;
    var Ano = parse(document.getElementById("txtAno").value);
    var Cor = document.getElementById("txtCor").value:

    carro = ["Marca: "  marca, "Modelo: " + modelo "Ano: " + Ano,"Cor: " + Cor];
    vetorCarros.push(carro);

    limpaTxt;
    
}

function mostrarCarro(){
   
    var lblMostrarCarro = document.getElementById("lblMostraCarro");
    lblMostrarCarro.innerHTML = stringCarros;

    stringCarros = vetorCarros.join(<br>);
}

function limpaTxt()
    document.getElementById("txtMarca").value = "";
    document.getElementById("txtModelo").value = "";
    document.getElementById("txtAno").value = "";
    document.getElementById("txtCor").value = "";
}