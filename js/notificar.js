$(async function BUSCA() {

    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'contar_notificacao'
        },
        success: function(data) {
            quant = data.map(d => d.quant);
            var cols = "";
            cols += '<li>' + '<a href="/loja_virtual/tela_vizualizar_trasferencia.php">' + 'Existe ' + quant + ' transferência pendete de aprovação' + '</a>' + '</li>';
            $("#notifica").html(cols);
            if (quant == 0) {
                $('#contador').html();
            } else {
                $('#contador').html(quant);
            }
        },
        complete: function(data) {
            setTimeout(BUSCA, 60000);
        }
    });

});


function pesquisaPermissoes(id_usuario) {
    //  exibir_mensagem();
    $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'PERMISSOES',
            parametro: id_usuario
        },
        success: function(data) {
            permissao = data.map(d => d.permissao);
            caixa = data.map(d => d.DATA_ABERTURA);

            if (permissao == "Administrador") {
                document.getElementById("clientes").style.display = 'flex';
                document.getElementById("caixa").style.display = 'flex';


                document.getElementById("empresa").style.display = 'flex';
                document.getElementById("produto-1").style.display = 'flex';
                document.getElementById("fornecedor").style.display = 'flex';
                document.getElementById("estoque").style.display = 'flex';
                document.getElementById("relatorios").style.display = 'flex';
                document.getElementById("usuario").style.display = 'flex';

            } else if (permissao == "Caixa") {
                document.getElementById("clientes").style.display = 'flex';
                document.getElementById("caixa").style.display = 'flex';
                document.getElementById("caixa_adm").style.display = 'none';

            } else if (permissao == "Estoque_caixa") {
                document.getElementById("clientes").style.display = 'flex';
                document.getElementById("caixa").style.display = 'flex';
                document.getElementById("caixa_adm").style.display = 'none';
                document.getElementById("produto-1").style.display = 'flex';
                document.getElementById("estoque").style.display = 'flex';
                document.getElementById("fornecedor").style.display = 'flex';

            } else if (permissao == "Estoque") {
                document.getElementById("produto-1").style.display = 'flex';
                document.getElementById("estoque").style.display = 'flex';
            }
        }
    });
    console.log(document.getElementsByClassName("celular").length);
    if (document.getElementsByClassName("celular").length >= 1) {

        id('celular').onkeyup = function() {

            mascara(this, mtel);

        }
        id('fixo').onkeyup = function() {
            mascara(this, mtel);
        }
    }
    if (document.getElementsByClassName("modalDialog").length >= 1) {
        fechamdal();
    }
}


function mascara(o, f) {
    v_obj = o
    v_fun = f
    setTimeout("execmascara()", 1)
}

function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}

function mtel(v) {
    v = v.replace(/\D/g, ""); //Remove tudo o que não é dígito
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v = v.replace(/(\d)(\d{4})$/, "$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}

function id(el) {
    return document.getElementById(el);
}




$(document).keyup(function(e) {
    if (e.keyCode == 27) {
        fechamdal();
    }
});



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

function chama_teste() {

    $.ajax({
        url: "back_end/busca_autocomplete.php",
        async: false,
        dataType: "json",
        data: {
            acao: 'BUSCA_CAIXA_ABERTO'
        },
        success: function(data) {
            DATA_ABERTURA = data.map(d => d.DATA_ABERTURA);
            DATA_FECHAMENTO = data.map(d => d.DATA_FECHAMENTO);
        }
    });
    if ((DATA_ABERTURA != "" && DATA_FECHAMENTO != "") || (DATA_ABERTURA == "" && DATA_FECHAMENTO == "")) {
        $('#mensagem').html("Para efetuar vendas o caixa precisa estar aberto!");
        $('#conteiner-1').css("display", "flex");
        return false;
    }

}


function valida_caixa_aberto() {

    $.ajax({
        url: "back_end/busca_autocomplete.php",
        async: false,
        dataType: "json",
        data: {
            acao: 'BUSCA_CAIXA_ABERTO'
        },
        success: function(data) {
            DATA_ABERTURA = data.map(d => d.DATA_ABERTURA);
            DATA_FECHAMENTO = data.map(d => d.DATA_FECHAMENTO);
        }
    });
    var hoje = new Date().toDateString();
    if (DATA_ABERTURA != hoje) {
        $('#mensagem').html("Há um caixa que não foi aberto hoje! Feche-o primeiro! ");
        $('#conteiner-1').css("display", "flex");
        return false;
    }

}

function valida_caixa_aberto1() {

    $.ajax({
        url: "back_end/busca_autocomplete.php",
        async: false,
        dataType: "json",
        data: {
            acao: 'BUSCA_CAIXA_ABERTO'
        },
        success: function(data) {
            DATA_ABERTURA = data.map(d => d.DATA_ABERTURA);
            DATA_FECHAMENTO = data.map(d => d.DATA_FECHAMENTO);
        }
    });
    var hoje = new Date().toDateString();
    if (DATA_ABERTURA != hoje) {
        $('#mensagem').html("Há um caixa que não foi aberto hoje!");
        $('#conteiner-1').css("display", "flex");
        return false;
    }

}


function fechamodal_menu() {

    $.ajax({
        url: "back_end/busca_autocomplete.php",
        async: false,
        dataType: "json",
        data: {
            acao: 'BUSCA_CAIXA_ABERTO'
        },
        success: function(data) {
            DATA_ABERTURA = data.map(d => d.DATA_ABERTURA);
            DATA_FECHAMENTO = data.map(d => d.DATA_FECHAMENTO);
        }
    });
    var hoje = new Date().toDateString();
    if (DATA_ABERTURA != hoje) {
        $('#conteiner-1').css("display", "none");
        window.location.href = "Tela_fechar_caixa.php";
    } else {
        $('#conteiner-1').css("display", "none");
    }

}