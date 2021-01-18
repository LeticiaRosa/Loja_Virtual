<!DOCTYPE html>


<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/css_caixa.css">
    <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">

    <title>Finalizar Venda</title>
</head>
<html>
<div class="center">
    <section class="cover-form">
        <div class="form-container">
            <a href="#close" title="Close" class="close">X</a>
            <form method="POST" name="form" action="back_end/caixa.php">
                <h1>Confirmar Venda</h1>
                <div class="form-wraper">
                    <div class="col10">
                        <p> Vendedor: *</p>
                        <input type="text" name="Vendedor" id="Vendedor" required placeholder="Vendedor" autocomplete="off">
                    </div>
                    <div class="col10">
                        <p> Cliente: *</p>
                        <input type="text" name="Cliente" id="Cliente" placeholder="Cliente" autocomplete="off">
                    </div>
                </div>
                <div class="form-wraper">
                    <div class="col10">
                        <p>Total De Itens: *</p>
                        <input type="text" name="total_itens" id="total_itens" required placeholder="Total De itens" autocomplete="off">
                    </div>
                    </div>
                    
                

                <div class="form-wraper">
                    <div class="col-1">
                        <p>Forma de Pagamento:</p>
                        <select name="pagamento" id="pagamento" required placeholder="Forma de Pagamento">
                            <option selected disabled value="">Selecione</option>
                            <option value="credito">Cartão de Credito</option>
                            <option value="debito">Cartão de Debito</option>
                            <option value="Dinehiro">Dinehiro</option>
                            <option value="Anotar">Anotar</option>
                        </select>
                    </div>
                    <div class="col-1">
                        <p>Quantidade de Parcelas</p>
                        <select name="pagamento" id="pagamento" placeholder="Forma de Pagamento">
                            <option selected disabled value="">Selecione</option>
                            <option value="a_vista">A vista</option>
                            <option value="1x">1x</option>
                            <option value="2x">2x</option>
                            <option value="3x">3x</option>
                            <option value="4x">4x</option>
                            <option value="5x">5x</option>
                            <option value="6x">6x</option>
                            <option value="7x">7x</option>
                            <option value="8x">8x</option>
                            <option value="9x">9x</option>
                            <option value="10x">10x</option>
                            <option value="11x">11x</option>
                            <option value="12x">12x</option>
                        </select>
                    </div>

                </div>
                <div class="col11 limpa">
                        <p> Valor Total Da Venda: *</p>
                        <input type="text" name="Valor_total" id="Valor_total" required placeholder="Valor" autocomplete="off">
                    </div>
                
                    
                    <div class="col11 limpa">
                    <div class="texto">
                    <p>Porcentagem de Desconto:</p> 
                    </div>
                     <input type="text" name="desconto" id="desconto" required placeholder=" %Valor" autocomplete="off">
                    </div>

                <div class="col11 limpa">
                    <p> Valor Total Após Desconto: *</p>
                    <input type="text" name="tl_fim" id="tl_fim" placeholder="Nome">
                </div>


                <div class="enviar">
                    <input type="submit" name="Confirmar" id="Confirmar" value="Confirmar" />

                    <input type="button" name="Cancelar" id="Cancelar" value="Cancelar" onclick="window.location.href='tela_caixa.php'">



            </form>
        </div>
    </section>
</div>

<body>
</body>

</html>