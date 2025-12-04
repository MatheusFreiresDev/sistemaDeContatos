-- Criar banco e usuário MySQL
CREATE DATABASE IF NOT EXISTS contatos_db;
CREATE USER IF NOT EXISTS 'contatos_user'@'localhost' IDENTIFIED BY 'senha123';
GRANT ALL PRIVILEGES ON contatos_db.* TO 'contatos_user'@'localhost';
FLUSH PRIVILEGES;

-- Usar o banco
USE contatos_db;

-- Tabela de contatos
CREATE TABLE IF NOT EXISTS contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    telefone VARCHAR(20)
);

-- Tabela de usuários compatível com login.php
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Inserir usuário de teste
INSERT INTO usuarios (usuario, senha, email) 
VALUES ('admin', '12345', 'admin@email.com');
