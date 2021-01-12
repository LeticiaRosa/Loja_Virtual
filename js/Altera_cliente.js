 $(async function() {
     // Atribui evento e função para limpeza dos campos
     // $('#clicar').on('input', limpaCampos);


     await $.ajax({
         url: "back_end/busca_autocomplete.php",
         dataType: "json",
         data: {
             acao: 'lista_cliente_p',
             parametro: $('#id').val()
         },

         success: function(data) {
             id = data.map(d => d.id_cliente);
             nome = data.map(d => d.nome);
             cpf = data.map(d => d.cpf);
             e_mail = data.map(d => d.e_mail);
             fixo = data.map(d => d.fixo);
             celular = data.map(d => d.celular);
             endereco = data.map(d => d.endereco);
             cep = data.map(d => d.cep);
             observacao = data.map(d => d.observacao);
             data_cadastro = data.map(d => d.data_cadastro);

             document.getElementById('id').value = id;
             document.getElementById('nome').value = nome;
             document.getElementById('cpf').value = cpf;
             document.getElementById('E-MAIL').value = e_mail;
             document.getElementById('fixo').value = fixo;
             document.getElementById('celular').value = celular;
             document.getElementById('endereco').value = endereco;
             document.getElementById('CEP').value = cep;
             document.getElementById('observacao').value = observacao;



         }

     });

 });