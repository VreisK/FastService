-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/01/2024 às 21:02
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
-- Banco de dados: `fastservice`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `anuncio`
--

CREATE TABLE `anuncio` (
  `ID_anuncio` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `preco` float NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `entrega` varchar(3) NOT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `caminho` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `anuncio`
--

INSERT INTO `anuncio` (`ID_anuncio`, `titulo`, `descricao`, `preco`, `idUsuario`, `entrega`, `categoria`, `caminho`) VALUES
(21, 'Pintor', 'Trabalho com qualquer tipo de tinta', 100, 11, 'Sim', 'Trabalho doméstico', 'anuncio/6566722037331.png'),
(32, 'FAXINEIRA ', 'Faço faxina', 150, 19, 'Sim', 'Trabalho domÃ©stico', 'anuncio/658b9853c8aca.jpg'),
(33, 'Cento do brigadeiro', 'Cem brigadeiros tradicionais.', 120, 20, 'Nao', 'comida', 'anuncio/658df75a58576.jpg'),
(34, 'Cuido de cachorros', 'Cuido do seu cachorro aqui em minha casa', 100, 18, 'Nao', 'trabalho de cuidado', 'anuncio/658e1538615fc.jpg'),
(35, 'ServiÃ§o de pintura', 'trabalho com pintura em geral. 2 anos de experiênica', 100, 13, 'Sim', 'Trabalho domÃ©stico', 'anuncio/658e167d5f6cc.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `chat`
--

CREATE TABLE `chat` (
  `id_conversa` int(11) NOT NULL,
  `conversa` varchar(200) NOT NULL,
  `id_usuarioEnvia` int(11) DEFAULT NULL,
  `id_usuarioRecebe` int(11) DEFAULT NULL,
  `dataHora` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `chat`
--

INSERT INTO `chat` (`id_conversa`, `conversa`, `id_usuarioEnvia`, `id_usuarioRecebe`, `dataHora`) VALUES
(3, 'Muito bom', 21, 20, '2024-01-16 16:41:30'),
(4, 'Muito bom', 21, 20, '2024-01-16 16:42:11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `ID_comentario` int(11) NOT NULL,
  `comentario` varchar(200) NOT NULL,
  `ID_anuncio` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `avaliacao` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `comentario`
--

INSERT INTO `comentario` (`ID_comentario`, `comentario`, `ID_anuncio`, `idUsuario`, `avaliacao`) VALUES
(12, 'rápido e prático recomendo', 21, 20, 'Otimo'),
(13, 'Muito bom ', 35, 11, 'Bom');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) NOT NULL,
  `dataNasc` date NOT NULL,
  `caminho` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `email`, `senha`, `genero`, `estado`, `cidade`, `telefone`, `dataNasc`, `caminho`) VALUES
(9, 'Antonio Jorge', 'antonioteste@gmail.com', '1234.TESTE', 'masculino', 'BA', 'Salvador', '(71) 98804-0478', '2023-11-06', 'arquivos/6577bed039be2.png'),
(11, 'Ricardo Mendes ', 'davidjocamm@gmail.com', 'DAVID100@', 'masculino', 'PE', 'Recife', '(71) 98379-1290', '2004-06-11', 'arquivos/65875727b3ed3.jpg'),
(13, 'Luana Silva', 'marcela@assemany.com', 'MARCELA100', 'feminino', 'GO', 'GoiÃ¢nia', '(71) 99999-9999', '2004-01-30', 'arquivos/658e182692b01.jpg'),
(14, 'Cleiton Lucas', 'david.moreira@ba.estudante.senai.br', 'David100@', 'masculino', 'PI', 'Teresina', '(87) 98765-3329', '2004-06-11', 'arquivos/6577be1de065b.png'),
(15, 'Aviador ', 'aviador@gmail', 'Aviador100@', 'masculino', 'GO', 'GoiÃ¢nia', '(71) 99999-9999', '3221-04-11', 'arquivos/6580da82cb9a0.png'),
(17, 'Jamille Araujo', 'jamillearaujo3007@gmail.com', 'Jamille0.', 'feminino', 'BA', 'Salvador', '(71) 99981-6613', '2005-07-30', 'arquivos/658e17d683aed.jpg'),
(18, 'Iolanda', 'iolandaborges21@gmail.com', ',10Iolanda', 'feminino', 'BA', 'Salvador', '(71) 98290-5166', '1981-01-30', 'arquivos/658e14df9fcea.jpg'),
(19, 'Amanda Fiuza ', 'amanda14fiuza@gmail.com', '18ad04sV@', 'feminino', 'BA', 'Salvador', '(71) 98240-5607', '2004-06-08', 'arquivos/658e178657ab8.jpg'),
(20, 'Claudia Santana', 'claudia@gmail.com', 'C@123456', 'feminino', 'BA', 'Salvador', '(71) 98849-7942', '2010-01-30', 'arquivos/658df61952a60.jpg'),
(21, 'Rato Bigodudo', 'ratinhobigodudo@gmail.com', 'Bigodudo123@', 'masculino', 'AP', 'Ferreira Gomes', '(71) 93506-4766', '2023-12-31', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `anuncio`
--
ALTER TABLE `anuncio`
  ADD PRIMARY KEY (`ID_anuncio`),
  ADD KEY `fk_id` (`idUsuario`);

--
-- Índices de tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_conversa`),
  ADD KEY `fk_ID_usuarioEnvia` (`id_usuarioEnvia`),
  ADD KEY `fk_ID_usuarioRecebe` (`id_usuarioRecebe`);

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`ID_comentario`),
  ADD KEY `fk_ID_anuncio` (`ID_anuncio`),
  ADD KEY `fk_ID_usuario` (`idUsuario`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anuncio`
--
ALTER TABLE `anuncio`
  MODIFY `ID_anuncio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `id_conversa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `ID_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `anuncio`
--
ALTER TABLE `anuncio`
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Restrições para tabelas `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `fk_ID_usuarioEnvia` FOREIGN KEY (`id_usuarioEnvia`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `fk_ID_usuarioRecebe` FOREIGN KEY (`id_usuarioRecebe`) REFERENCES `usuario` (`idUsuario`);

--
-- Restrições para tabelas `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_ID_anuncio` FOREIGN KEY (`ID_anuncio`) REFERENCES `anuncio` (`ID_anuncio`),
  ADD CONSTRAINT `fk_ID_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
