-- Criar usuário e banco para o sistema de contatos
CREATE USER 'contatos_user'@'localhost' IDENTIFIED BY 'senha123';
CREATE DATABASE contatos_db;

GRANT ALL PRIVILEGES ON contatos_db.* TO 'contatos_user'@'localhost';
FLUSH PRIVILEGES;

-- Usar o banco 
USE contatos_db;

-- Criar tabela de contatos
CREATE TABLE contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    telefone VARCHAR(20)
);
