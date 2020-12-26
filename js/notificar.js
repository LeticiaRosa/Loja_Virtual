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
            cols += '<li>' + '<a href="/loja_virtual/tela_vizualizar_trasferencia.php">' + 'Existe ' + quant + ' trasferencia pendete de aprovação' + '</a>' + '</li>';

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