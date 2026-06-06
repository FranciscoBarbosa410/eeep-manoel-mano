<?php
    //Conexao com o BD
    define('HOST', 'localhost');
    define('USUARIO', 'root');
    define('SENHA', '');
    define('DB', 'eeepmm');

    $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die('Não foi possível conectar');

    //Notícias
    function contar_noticias($conexao, $pesquisa = '') {
        if (!empty($pesquisa)) {
            $pesquisa = mysqli_real_escape_string($conexao, trim($pesquisa));
            $sqlContar = "SELECT COUNT(*) as total FROM noticias 
                        WHERE titulo LIKE '%$pesquisa%' 
                        OR descricao_noticia LIKE '%$pesquisa%'";
        } else {
            $sqlContar = "SELECT COUNT(*) as total FROM noticias";
        }

        $resultado = mysqli_query($conexao, $sqlContar);
        if (!$resultado) {
            die("Erro ao contar notícias: " . mysqli_error($conexao));
        }

        $dados = mysqli_fetch_assoc($resultado);
        return intval($dados['total']);
    }

    function buscar_noticias($conexao, $pesquisa = '', $limite = null, $offset = null) {
        if (!empty($pesquisa)) {
            $pesquisa = mysqli_real_escape_string($conexao, trim($pesquisa));
            $sqlBuscar = "SELECT * FROM noticias 
                        WHERE titulo LIKE '%$pesquisa%' 
                        OR descricao_noticia LIKE '%$pesquisa%' 
                        ORDER BY data_noticia DESC";
        } else {
            $sqlBuscar = "SELECT * FROM noticias ORDER BY data_noticia DESC";
        }

        if ($limite !== null && $offset !== null) {
            $limite = intval($limite);
            $offset = intval($offset);
            $sqlBuscar .= " LIMIT $limite OFFSET $offset";
        }

        $resultado = mysqli_query($conexao, $sqlBuscar);

        if (!$resultado) {
            die("Erro na consulta ao banco de dados: " . mysqli_error($conexao));
        }

        $noticias = [];
        while($noticia = mysqli_fetch_assoc($resultado)) {
            $noticias[] = $noticia;
        }

        return $noticias;
    }

    function buscar_noticia($conexao, $id) {
        $id = intval($id);
        
        $sqlBuscar = "SELECT * FROM noticias WHERE id_noticia = $id";
        $resultado = mysqli_query($conexao, $sqlBuscar);

        if (!$resultado) {
            die("Erro na consulta ao banco de dados: " . mysqli_error($conexao));
        }

        if (mysqli_num_rows($resultado) > 0) {
            return mysqli_fetch_assoc($resultado);
        }

        return null;
    }

    //Cursos
    function buscar_cursos($conexao) {
        $sqlBuscar = "SELECT * FROM curso ORDER BY id_curso ASC";
        $resultado = mysqli_query($conexao, $sqlBuscar);

        if (!$resultado) {
            die("Erro na consulta ao banco de dados: " . mysqli_error($conexao));
        }

        $cursos = [];
        while($curso = mysqli_fetch_assoc($resultado)) {
            $cursos[] = $curso;
        }

        return $cursos;
    }

    function buscar_curso($conexao, $id) {
        $id = intval($id);
        
        $sqlBuscar = "SELECT * FROM curso WHERE id_curso = $id";
        $resultado = mysqli_query($conexao, $sqlBuscar);

        if (!$resultado) {
            die("Erro na consulta ao banco de dados: " . mysqli_error($conexao));
        }

        if (mysqli_num_rows($resultado) > 0) {
            return mysqli_fetch_assoc($resultado);
        }

        return null;
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

    //Administradores
    function buscar_admins($conexao) {
        $sqlBuscar = "SELECT * FROM coordenacao ORDER BY id_coordenacao ASC";
        $resultado = mysqli_query($conexao, $sqlBuscar);

        if (!$resultado) {
            die("Erro na consulta ao banco de dados: " . mysqli_error($conexao));
        }

        $admins = [];

        while($admin = mysqli_fetch_assoc($resultado)) {
            $admins[] = $admin;
        }

        return $admins;
    }

    function buscar_classificados($conexao) {
        // Ordenado pelo ID de forma decrescente para exibir os últimos cadastrados primeiro
        $sqlBuscar = "SELECT * FROM classificados ORDER BY id_classificado DESC";
        $resultado = mysqli_query($conexao, $sqlBuscar);

        if (!$resultado) {
            die("Erro na consulta ao banco de dados: " . mysqli_error($conexao));
        }

        $classificados = [];

        while($classificado = mysqli_fetch_assoc($resultado)) {
            $classificados[] = $classificado;
        }

        return $classificados;
    }
?>