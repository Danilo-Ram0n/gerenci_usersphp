para criação do banco de dados e verificação reversa:

CREATE DATABASE company;

USE company;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

-- Exemplo de dados iniciais para a tabela de usuários
INSERT INTO users (name, email) VALUES
('João Silva', 'joao@example.com'),
('Maria Souza', 'maria@example.com');
