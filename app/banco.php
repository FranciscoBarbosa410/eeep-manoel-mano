<?php
    //Conexao com o BD
    define('HOST', 'localhost');
    define('USUARIO', 'root');
    define('SENHA', '');
    define('DB', 'eeepmm');

    $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die('Não foi possível conectar');

    
    function buscar_noticias($conexao) {
        $sqlBusca = 'SELECT * FROM noticias';
        $resultado = mysqli_query($conexao, $sqlBusca);

        $noticias = [];

        while($noticia = mysqli_fetch_assoc($resultado)) {
            $noticias[] = $noticia;
        }

        return $noticias;
    }

?>