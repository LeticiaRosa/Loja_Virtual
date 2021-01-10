$(document).ready(function() {
    $('#clicar').click(function() {
        generateRange(1, $('#qtd_etiquetas').val());
    });
});

function generateRange(numberBegin, numberEnd) {
    html = "";
    for (i = numberBegin; i <= numberEnd; i++) {
        html += '<div class="cod_barra" style ="padding:15px;;page-break-after:always;width: 8.7cm;height: 4cm;display: flex; flex-direction: row;align-items: center;justify-items: center;justify-content: space-between;text-align:center;" >'
        for (j = 0; j < 1; j++) {
            html += '<div class="codigo_barras"  style ="justify-content: center;   margin-right: 0.9cm; display: flex;    flex-direction:column;    width: 4cm;    height: 4cm;    align-items: center;    justify-items: center;text-align:center;"> ' +
                '<h1 style =" text-align:center; font-size: 10px;color: black;font-weight: bold;">' + $('#produto1').val() + '</h1>' +
                '        <img  id="barcodeImage_' + i + '" class="codeBarImage" />' +
                '<h1 style ="margin-top:15px;font-size: 20px;color: black;font-weight: bold;">R$:' + $('#valor_produto').val() + '</h1>' +
                '</div>';
            i++;
        }
        for (j = 0; j < 1; j++) {
            html += '<div class="codigo_barras_1"  style ="justify-content: center;  margin-left:0.9cm;  display: flex;    flex-direction:column;    width: 4cm;    height: 4cm;    align-items: center;    justify-items: center; text-align:center;"> ' +
                '<h1 style =" text-align:center; font-size: 10px;color: black;font-weight: bold;">' + $('#produto1').val() + '</h1>' +
                '        <img  id="barcodeImage_' + i + '" class="codeBarImage" />' +
                '<h1 style ="margin-top:15px;font-size: 20px;color: black;font-weight: bold;">R$:' + $('#valor_produto').val() + '</h1>' +
                '</div>';
            i++;
        }
        i--;
        html += '</div>';
    }
    $("#barcodeDiv").append(html);
    for (i = numberBegin; i <= numberEnd; i++) {
        number = pad_with_zeroes($('#codigo').val(), 3);
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
    barcodeImage.attr('src', barcode.exportToBase64(width, 90, 0));
}

function pad_with_zeroes(number, length) {
    var my_string = '' + number;
    while (my_string.length < length) {
        my_string = '0' + my_string;
    }
    return my_string;
}