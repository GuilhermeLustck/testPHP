-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/10/2024 às 20:47
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: testphp
--

-- --------------------------------------------------------

--
-- Estrutura para tabela registro
--

CREATE TABLE registro (
  IDCont int(11) NOT NULL,
  Genero varchar(100) NOT NULL,
  TLivro varchar(100) NOT NULL,
  Sinopse varchar(500) NOT NULL,
  NAutor varchar(150) NOT NULL,
  imagen varchar(200) NOT NULL,
  IDUser int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela usuario
--

CREATE TABLE usuario (
  ID int(11) NOT NULL,
  DTNasc date NOT NULL,
  CPF varchar(14) NOT NULL,
  Ender varchar(255) DEFAULT NULL,
  Sexo char(1) DEFAULT NULL,
  Email varchar(255) DEFAULT NULL,
  Senha varchar(100) DEFAULT NULL,
  Tel varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela registro
--
ALTER TABLE registro
  ADD PRIMARY KEY (IDCont),
  ADD KEY IDUser (IDUser);

--
-- Índices de tabela usuario
--
ALTER TABLE usuario
  ADD PRIMARY KEY (ID);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela registro
--
ALTER TABLE registro
  MODIFY IDCont int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela usuario
--
ALTER TABLE usuario
  MODIFY ID int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas registro
--
ALTER TABLE registro
  ADD CONSTRAINT IDUser FOREIGN KEY (IDUser) REFERENCES usuario (ID);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
