<?php
    //Conexao com o BD
    define('HOST', 'localhost');
    define('USUARIO', 'root');
    define('SENHA', '');
    define('DB', 'eeepmm');

    $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die('Não foi possível conectar');

    //Notícias
    function buscar_noticias($conexao) {
        $sqlBuscar = "SELECT * FROM noticias ORDER BY data_noticia DESC";
        $resultado = mysqli_query($conexao, $sqlBuscar);

        $noticias = [];

        while($noticia = mysqli_fetch_assoc($resultado)) {
            $noticias[] = $noticia;
        }

        return $noticias;
    }

    //Profissionais
    function buscar_profissionais($conexao) {
    $sqlBuscar = "SELECT * FROM profissionais ORDER BY nome_profissional ASC";
    $resultado = mysqli_query($conexao, $sqlBuscar);

    if (!$resultado) {
        die("Erro na consulta ao banco de dados: " . mysqli_error($conexao));
    }

    $profissionais = [];

    while($profissional = mysqli_fetch_assoc($resultado)) {
        $profissionais[] = $profissional;
    }

    return $profissionais;
}
?>