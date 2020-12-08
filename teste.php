<? php

require_once __DIR__. '/Tela_login_nova.php' ;

$ mpdf = new \ Mpdf \ Mpdf ([ 'tempDir' => __DIR__. '/ tmp' ]);
$ mpdf -> WriteHTML ( '<h1> Olá, mundo! </h1>' );
$ mpdf -> Saída ();

?>