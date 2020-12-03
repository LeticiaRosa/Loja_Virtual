
$('#unidade_medida').on('change', function() {
    var select = document.getElementById('unidade_medida');
    var tipo = select.options[select.selectedIndex].value
    console.log(tipo);
    if(tipo == "") {
        $('#valor_medida').prop("disabled", true);
    }
    else if(tipo != "") {
        $('#valor_medida').prop("disabled", false);
        document.form.valor_medida.focus();
    }
  });