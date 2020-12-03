$('#valor_medida').prop("disabled", true);
 $('#valor_medida').css("display", "none");
$('#unidade_medida').on('change', function() {
    var select = document.getElementById('unidade_medida');
    var tipo = select.options[select.selectedIndex].value
    console.log(tipo);
    if(tipo != "") {
        $('#valor_medida').prop("disabled", false);
        $('#valor_medida').css("display", "flex");
        document.form.valor_medida.focus();
        
    }
    else if (tipo == ""){
        $('#valor_medida').prop("disabled", true);
 $('#valor_medida').css("display", "none");
    }
  });