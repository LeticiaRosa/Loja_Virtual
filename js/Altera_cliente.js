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


     $(document).ready(function() {

         if (document.getElementsByClassName("celular").length >= 1) {
             id('celular').onkeyup = function() {
                 mascara(this, mtel);

             }
             id('fixo').onkeyup = function() {
                 mascara(this, mtel);
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

     });

 });



 function fechamodal_menu() {
     $('#conteiner-1').css("display", "none");
 }