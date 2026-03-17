CREATE TABLE coordenacao (
    id_coordenacao INT PRIMARY KEY AUTO_INCREMENT,
    nome_coordenacao VARCHAR(100) NOT NULL,
    senha_coordenacao VARCHAR(100) NOT NULL
);

CREATE TABLE noticias (
    id_noticia INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(100) NOT NULL,
    data_noticia DATE NOT NULL,
    conteudo TEXT NOT NULL,
    foto_noticia MEDIUMBLOB
);

CREATE TABLE classificados (
    id_classificado INT PRIMARY KEY AUTO_INCREMENT,
    nome_classificado VARCHAR(255) NOT NULL,
    curso_aprovado VARCHAR(100) NOT NULL,
    instituicao_aprovada VARCHAR(100) NOT NULL,
    foto_classificado MEDIUMBLOB
);
