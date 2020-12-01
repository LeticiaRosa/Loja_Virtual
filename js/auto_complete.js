$(function() {

    // Atribui evento e função para limpeza dos campos
    $('#categoria').on('input', limpaCampos);

    // Dispara o Autocomplete a partir do segundo caracter
    $( "#categoria" ).autocomplete({
	    minLength: 2,
	    source: function( request, response ) {
	        $.ajax({
	            url: "back_end/busca_autocomplete.php",
	            dataType: "json",
	            data: {
	            	acao: 'autocomplete',
	                parametro: $('#categoria').val()
	            },
	            success: function(data) {
	               response(data);
	            }
	        });
	    },
	    focus: function( event, ui ) {
	        $("#categoria").val( ui.item.nome );
	        carregarDados();
	        return false;
	    },
	    select: function( event, ui ) {
	        $("#categoria").val( ui.item.nome );
	        return false;
	    }
    })
    .autocomplete( "instance" )._renderItem = function( ul, item ) {
      return $( "<li>" )
        .append( "<a><b>Nome: </b>" + item.nome  )
        .appendTo( ul );
    };

    // Função para limpar os campos caso a busca esteja vazia
    function limpaCampos(){
       var busca = $('#categoria').val();

       if(busca == ""){
	   $('#categoria').val('');
         
       }
    }
});