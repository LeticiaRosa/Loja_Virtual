$(window).on("load", $(async function() {
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);
    var id = [];
    var nomes = [];
    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'categoria'
        },
        success: function(data) {
            id = data.map(d => d.id_categoria);
            nome = data.map(d => d.NOME);
            descricao = data.map(d => d.DESCRICAO);
            STATUS = data.map(d => d.STATUS);
            observacao = data.map(d => d.OBSERVACAO);
            USUARIO = data.map(d => d.USUARIO);
            DATA_CADASTRO = data.map(d => d.DATA_CADASTRO);
            for (i = 0; i < data.length; i++) {
                var newRow = $('<tr class = "corpo" >');
                var cols = "";

                cols += '<td>' + nome[i] + '</td>';
                cols += '<td>' + descricao[i] + '</td>';
                cols += '<td>' + STATUS[i] + '</td>';
                cols += '<td class="sumir">' + observacao[i] + '</td>';
                cols += '<td class="sumir">' + USUARIO[i] + '</td>';
                cols += '<td class="sumir">' + DATA_CADASTRO[i] + '</td>';
                cols += '<td class="sumir2">' + id[i] + '</td>';
                newRow.append(cols);
                $("#products-table").append(newRow);


            }

        }
    });
    $(document).ready(function() {
        $('#products-table').dataTable({

        });
    });
}));









$(window).on("click", (function() {

    var tabela = document.getElementById("products-table");
    var linhas = tabela.getElementsByTagName("tr");
    for (var i = 0; i < linhas.length; i++) {
        var linha = linhas[i];

        linha.addEventListener("click", function() {
            //Adicionar ao atual

            selLinha(this, false); //Selecione apenas um
            //selLinha(this, true); //Selecione quantos quiser
        });
    }

    /**
    Caso passe true, você pode selecionar multiplas linhas.
    Caso passe false, você só pode selecionar uma linha por vez.
    **/
    function selLinha(linha, multiplos) {

        if (!multiplos) {
            var linhas = linha.parentElement.getElementsByTagName("tr");
            for (var i = 0; i < linhas.length; i++) {
                var linha_ = linhas[i];
                linha_.classList.remove("selecionado");
            }
        }
        linha.classList.toggle("selecionado");
    }

    /**
    Exemplo de como capturar os dados
    **/
    var btnVisualizar = document.getElementById("visualizarDados");

    var nome = "";
    btnVisualizar.addEventListener("click", function() {
        var selecionados = tabela.getElementsByClassName("selecionado");

        //Verificar se está selecionado

        for (var i = 0; i < selecionados.length; i++) {
            var selecionado = selecionados[i];
            selecionado = selecionado.getElementsByTagName("td");

        }
        if (selecionado[1].innerHTML !== null) {
            window.location.replace("#openModal");
            document.getElementById('id_categoria').value = selecionado[0].innerHTML;
            document.getElementById('nome').value = selecionado[1].innerHTML;
            document.getElementById('descricao').value = selecionado[2].innerHTML;

            if (selecionado[3].innerHTML == "DISPONIVEL") {

                document.getElementById('status').value = document.getElementById('S').value;
            } else {

                document.getElementById('status').value = document.getElementById('N').value;
            }
            document.getElementById('observacao').value = selecionado[4].innerHTML;


        }
    });

    function fechamodal() {
        $('#modal').css("display", "none");
    }

}));