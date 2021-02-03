$('#valor_medida').prop("disabled", true);
$('#valor_medida').css("display", "none");

$('#gerar_codigo').prop("disabled", true);
$('#gerar_codigo').css("display", "none");



$('input[type=radio]').on('change', function() {

    var tipo = getRadioValor('barras');
    if (tipo == "N") {
        $('#gerar_codigo').prop("disabled", false);
        $('#gerar_codigo').css("display", "flex");
        document.form.gerar_codigo.focus();

    } else if (tipo == "S") {
        $('#gerar_codigo').prop("disabled", true);
        $('#gerar_codigo').css("display", "none");
    }
});


$('#unidade_medida').on('change', function() {
    var select = document.getElementById('unidade_medida');
    var tipo = select.options[select.selectedIndex].value
    if (tipo != "") {
        $('#valor_medida').prop("disabled", false);
        $('#valor_medida').css("display", "flex");
        document.form.valor_medida.focus();

    } else if (tipo == "") {
        $('#valor_medida').prop("disabled", true);
        $('#valor_medida').css("display", "none");
    }
});

var select = document.getElementById('pega').value;
if (select == "Produto inserido com sucesso") {
    $('#conteiner').css("display", "flex");

}


function fechamodal() {
    $('#conteiner').css("display", "none");
}




function getRadioValor(name) {
    var rads = document.getElementsByName(name);
    //console.log(rads);
    for (var i = 0; i <= rads.length; i++) {
        if (rads[i].checked) {
            return rads[i].value;
        }

    }

    return null;
}

function openConfirmacao(tipo) {

    $('#conteiner').css("display", "flex");
    if (tipo == "salvar") {
        $('#Texto').html(" Confirma alteração ? ");

        return false;
    } else if (tipo == "excluir") {
        $('#Texto').html(" Confirma exclusão ? ");
        return false;
    }


}


function confirma() {

    var texto = document.getElementById("Texto").innerHTML;

    if (texto == " Confirma exclusão ? ") {
        var OK = document.getElementById("teste").elements[17].name = "Excluir";
        fechamodal();
        return true;
    } else if (texto == " Confirma alteração ? ") {
        var OK = document.getElementById("teste").elements[17].name = "Salvar";
        fechamodal();
        return true;
    }

}


function gerar_cod() {
    window.location.href = "Gera_codigo_barra.php?id=" + document.getElementById("id").value;
}

function fechamodal_menu() {
    $('#conteiner-1').css("display", "none");
}



function custo(custo) {
    document.getElementById('preco_custo').value = formatarMoeda(custo);

}

function venda(venda) {
    document.getElementById('preco_venda').value = formatarMoeda(venda);

}

function formatarMoeda(moeda) {

    var valor = moeda;

    valor = valor + '';
    valor = parseInt(valor.replace(/[\D]+/g, ''));
    valor = valor + '';
    valor = valor.replace(/([0-9]{2})$/g, ",$1");

    if (valor.length > 6) {
        valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
    }
    return valor;

}


$(function() {
    $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'buscar_cod',
        },
        success: function(data) {
            cod = data.map(d => d.cod);
            document.getElementById('cod_referencia').value = cod;

        }
    });

});