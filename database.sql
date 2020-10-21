DROP DATABASE IF EXISTS bd_toque_estoque;

CREATE DATABASE bd_toque_estoque;

CREATE TABLE tb_loja ( 
	id_loja INT NOT NULL AUTO_INCREMENT,
    nome_loja VARCHAR(50) NOT NULL,
    usuario_loja VARCHAR(50) NOT NULL UNIQUE,
    senha_loja VARCHAR(50) NOT NULL,
    PRIMARY KEY (id_loja)
);

INSERT INTO tb_loja (nome_loja, usuario_loja, senha_loja) VALUES ('Lojinha da Ana', 'admin', 'admin123');

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

INSERT INTO tb_produto (nome_produto, descricao_produto, preco_produto, qtd_produto, id_loja) VALUES 
('Calça Jeans', 'Calça Jeans 100% algodão na cor preta', 149.90, 10, 1),
('Camisa Raglan', 'Camiseta Raglan 100% algodão na cor azul', 69.90, 15, 1),
('Gorro de Lã', 'Gorro para inverno', 49.90, 4, 1),
('Jaqueta Jeans', 'Jaqueta Jeans 100% algodão na cor preta', 149.90, 0, 1),
('Saia Longa', 'Saia na cor lilás', 129.90, 24, 1),
('All Star Cano Alto', 'Tênis All Star branco', 179.90, 2, 1),
('Body Bege', 'Body 100% algodão na cor bege', 29.90, 0, 1);

CREATE TABLE tb_pedido (
	id_pedido INT NOT NULL AUTO_INCREMENT,
    data_pedido DATE NOT NULL,
    valor_pedido DECIMAL(8,2) NOT NULL,
    id_loja INT NOT NULL,  
    PRIMARY KEY (id_pedido),
    FOREIGN KEY (id_loja) REFERENCES tb_loja(id_loja)
);

INSERT INTO tb_pedido (data_pedido, valor_pedido, id_loja) VALUES 
('2020-10-09', 129.90, 1),
('2020-11-05', 79.90, 1),
('2020-12-05', 99.80, 1),
('2020-10-08', 149.90, 1),
('2020-10-10', 129.90, 1);

CREATE TABLE tb_produto_pedido (
    id_produto_pedido INT NOT NULL AUTO_INCREMENT,
    id_produto INT NOT NULL,
    qtd_produto INT NOT NULL,
    id_pedido INT NOT NULL,
    PRIMARY KEY (id_produto_pedido),
    FOREIGN KEY (id_produto) REFERENCES tb_produto(id_produto),
    FOREIGN KEY (id_pedido) REFERENCES tb_pedido(id_pedido)
);