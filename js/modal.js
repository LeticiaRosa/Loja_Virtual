var select = document.getElementById('pega').value;
if (select == "Produto inserido com sucesso") {
    // console.log(select);
    $('#conteiner').css("display", "flex");

}


function fechamodal() {
    $('#conteiner').css("display", "none");
}