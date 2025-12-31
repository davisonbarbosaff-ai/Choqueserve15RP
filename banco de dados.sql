-- Criar banco de dados
CREATE DATABASE IF NOT EXISTS choque_rp;
USE choque_rp;

-- Tabela de usuários
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) UNIQUE NOT NULL,
    role VARCHAR(20) NOT NULL
);

-- Inserir usuários ADM
INSERT INTO usuarios (nome, role) VALUES 
('subbarbosa', 'admin'),
('ana', 'admin'),
('paivaz', 'admin');

-- Tabela de notícias
CREATE TABLE IF NOT EXISTS noticias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL,
    texto TEXT NOT NULL,
    imagem LONGBLOB,
    data_publicacao DATETIME NOT NULL
);

-- Inserir notícia de exemplo
INSERT INTO noticias (titulo, texto, data_publicacao) VALUES
('Boas-vindas ao Choque RP', 'Portal oficial do Choque RP ativo e funcionando!', NOW());

-- Tabela de inscrições
CREATE TABLE IF NOT EXISTS inscricoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    id_rp VARCHAR(50),
    motivo TEXT,
    cargo VARCHAR(50) DEFAULT 'SOLDADO',
    status VARCHAR(50) DEFAULT 'Em análise',
    data_enviado DATETIME NOT NULL
);

-- Inserir inscrição de exemplo
INSERT INTO inscricoes (nome, id_rp, motivo, cargo, status, data_enviado) VALUES
('ExemploRP', '12345', 'Quero fazer parte do Choque para ajudar nas operações.', 'SOLDADO', 'Em análise', NOW());
