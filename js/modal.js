var select = document.getElementById('pega').value;


if (select == "Atualizado Com Sucesso") {

    $('#conteiner').css("display", "flex");

} else if (select == "Excluido Com Sucesso") {
    $('#conteiner').css("display", "flex");


} else if (select == "Produto inserido com sucesso") {
    $('#conteiner').css("display", "flex");


} else if (select == "Trasferencia Criada") {
    $('#conteiner').css("display", "flex");


} else if (select == "Produto Não Salvo") {
    $('#conteiner').css("display", "flex");

}



function fechamodal() {
    $('#conteiner').css("display", "none");
}