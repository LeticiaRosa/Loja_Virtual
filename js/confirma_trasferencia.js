 $(async function() {
     // Atribui evento e função para limpeza dos campos
     // $('#clicar').on('input', limpaCampos);
     await $.ajax({
         url: "back_end/busca_autocomplete.php",
         dataType: "json",
         data: {
             acao: 'Confirma_notificacao',
             parametro: $('#id_tras').val()
         },
         success: function(data) {

             EMPRESA = data.map(d => d.EMPRESA);
             EMPRESA_TRASFERENCIA = data.map(d => d.EMPRESA_TRASFERENCIA);
             nome_usuario = data.map(d => d.nome_usuario);
             qtd_trasfere = data.map(d => d.qtd_trasfere);
             produto = data.map(d => d.produto);
             id_produto = data.map(d => d.id_produto);
             CODIGO_REFERENCIA = data.map(d => d.CODIGO_REFERENCIA);
             document.getElementById('cod_referencia').value = CODIGO_REFERENCIA;
             document.getElementById('id_produto').value = id_produto;
             document.getElementById('nome').value = EMPRESA;
             document.getElementById('produto4').value = produto;
             document.getElementById('Qtd_tras').value = qtd_trasfere;
             document.getElementById('empresa4').value = EMPRESA_TRASFERENCIA;

         }
     });
 });