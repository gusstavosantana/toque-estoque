DROP DATABASE IF EXISTS bd_toque_estoque;

CREATE DATABASE bd_toque_estoque;

CREATE TABLE tb_loja ( 
	id_loja INT NOT NULL AUTO_INCREMENT,
    nome_loja VARCHAR(50) NOT NULL,
    usuario_loja VARCHAR(50) NOT NULL UNIQUE,
    senha_loja VARCHAR(50) NOT NULL,
    PRIMARY KEY (id_loja)
);

CREATE TABLE tb_produto (
	id_produto INT NOT NULL AUTO_INCREMENT,
    nome_produto VARCHAR(30) NOT NULL,
    descricao_produto VARCHAR(100) NOT NULL,
    preco_produto DECIMAL(8,2) NOT NULL,
    qtd_produto INT NOT NULL,
    id_loja INT NOT NULL,
    PRIMARY KEY (id_produto),
    FOREIGN KEY (id_loja) REFERENCES tb_loja(id_loja)
);

CREATE TABLE tb_pedido (
	id_pedido INT NOT NULL AUTO_INCREMENT,
    data_pedido DATE NOT NULL,
    id_loja INT NOT NULL,  
    PRIMARY KEY (id_pedido),
    FOREIGN KEY (id_loja) REFERENCES tb_loja(id_loja)
);

CREATE TABLE tb_produto_pedido (
    id_produto INT NOT NULL,
    id_pedido INT NOT NULL,
    FOREIGN KEY (id_produto) REFERENCES tb_produto(id_produto),
    FOREIGN KEY (id_pedido) REFERENCES tb_pedido(id_pedido)
);