CREATE DATABASE IF NOT EXISTS cinema CHARSET=utf8 COLLATE=utf8_unicode_ci;

USE cinema;
-- genero
CREATE TABLE genero(id INT AUTO_INCREMENT, 
descricao VARCHAR(20) NOT NULL, PRIMARY KEY(id), 
UNIQUE INDEX idx_genero_descricao(descricao)) ENGINE=INNODB;

-- filme (id,titulo, data_lanc, imdb, genero)
CREATE TABLE filme(id INT AUTO_INCREMENT PRIMARY KEY, 
titulo VARCHAR(50) NOT NULL, 
imdb DECIMAL(9,1) NOT NULL, 
data_lanc date not null,
genero_id INT, 
UNIQUE INDEX idx_filme_titulo_id(titulo,genero_id), 
CONSTRAINT fk_filme__genero_id FOREIGN KEY(genero_id) REFERENCES genero(id) ON DELETE RESTRICT ON UPDATE CASCADE) ENGINE= INNODB;