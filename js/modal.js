var select = document.getElementById('pega1').value;


if (select == "Atualizado Com Sucesso") {

    $('#conteiner').css("display", "flex");

} else if (select == "Excluido Com Sucesso") {
    $('#conteiner').css("display", "flex");


} else if (select == "Produto inserido com sucesso") {
    $('#conteiner').css("display", "flex");


}




function fechamodal() {
    $('#conteiner').css("display", "none");
}