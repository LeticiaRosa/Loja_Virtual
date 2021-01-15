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

    $.ajax({
            url: "back_end/busca_autocomplete.php",
            dataType: "json",
            data: {
                acao: 'PERMISSOES',
                parametro: id_usuario
            },
            success: function(data) {
                permissao = data.map(d => d.permissao);



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
                    document.getElementById("caixa").style.display = 'flex';
                } else if (permissao == "Estoque_caixa") {
                    document.getElementById("clientes").style.display = 'flex';
                    document.getElementById("caixa").style.display = 'flex';
                    document.getElementById("produto-1").style.display = 'flex';
                    document.getElementById("estoque").style.display = 'flex';
                } else if (permissao == "Estoque") {
                    document.getElementById("produto-1").style.display = 'flex';
                    document.getElementById("estoque").style.display = 'flex';
                }


            }

        }

    );
    /*Administrador, Caixa, Estoque_caixa */

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