$(document).ready(function () {
    $('#button_generate').click(function(){
        generateRange($('#number_begin').val(), $('#number_end').val());
    });
});
 
function generateRange(numberBegin, numberEnd){
    html = "";
    for (i = numberBegin; i <= numberEnd; i++) {
        html += '<div class="cod_barra" style ="width: 8.7cm;height: 4.6cm;display: flex; flex-direction: row;align-items: center;justify-items: center;justify-content: space-between;margin-top:-5px  " >'
                for (j = 0; j < 2; j++) {
            html += '<div class="codigo_barras"  style =" justify-content: center;    display: flex;    flex-direction:column;    width: 4cm;    height: 4cm;    align-items: center;    justify-items: center;"> '+
            '<h1 style =" font-size: 10px;color: black;font-weight: bold;margin-top:0px;">Produto:</h1>'+
            '<h1 style ="font-size: 10px;color: black;font-weight: bold;margin-top:0px;">Valor Produto:</h1>'+
                '        <img id="barcodeImage_' + i + '" class="codeBarImage" />' +
                '</div>';
                i++;    
            }
              /*for (j = 0; j < 1; j++) {   
                html +=   '<div class="codigo_barras_1"  style ="margin-top:0px;    justify-content: center;    display: flex;    flex-direction: column;    width: 4cm;    height: 4cm;    align-items: center;    justify-items: center;    "> '+
                '<h1 style =" font-size: 10px;color: black;font-weight: bold;margin-top:0px;">Produto:</h1>'+
                '<h1 style ="font-size: 10px;color: black;font-weight: bold;margin-top:0px;">Valor Produto</h1>'+
                '        <img id="barcodeImage_' + i + '" class="codeBarImage" />' +
                '</div>';
                i++;
          
        }*/
        i--;
        html += '</div>';
    }
    $("#barcodeDiv").append(html);
    for (i = numberBegin; i <= numberEnd; i++) {
        number = pad_with_zeroes(i, 3);
        updateBarcode(number, '#barcodeImage_' + i);
    }
    var w = window.open();
    $('#barcodeDiv').hide();
    var mysite = $('#barcodeDiv');
    w.document.body.innerHTML = mysite.html();
}
 
function updateBarcode(barCodeValue, tagId) {
    barCodeValue = typeof barCodeValue !== 'undefined' ? barCodeValue : '1234567890';
    var barcode = new bytescoutbarcode128();
    barcode.valueSet(barCodeValue);
    barcode.setMargins(5, 5, 5, 5);
    barcode.setBarWidth(2);
    var width = barcode.getMinWidth();
    barcode.setSize(width, 100);
    var barcodeImage = $(tagId);
    barcodeImage.attr('src', barcode.exportToBase64(width, 100, 0));
}

function pad_with_zeroes(number, length) {
    var my_string = '' + number;
    while (my_string.length < length) {
        my_string = '0' + my_string;
    }
    return my_string;
}