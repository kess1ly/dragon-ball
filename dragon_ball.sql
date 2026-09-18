-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/09/2026 às 04:06
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
-- Banco de dados: `dragon_ball`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `personagens`
--

CREATE TABLE `personagens` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `raca` varchar(50) NOT NULL,
  `planeta_origem` varchar(100) NOT NULL,
  `tecnica_principal` varchar(100) NOT NULL,
  `transformacao` varchar(100) DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `personagens`
--

INSERT INTO `personagens` (`id`, `nome`, `raca`, `planeta_origem`, `tecnica_principal`, `transformacao`, `imagem`) VALUES
(1, 'Goku', 'Saiyajin', 'Planeta Vegeta', 'Kamehameha', 'Super Saiyajin', 'https://i.pinimg.com/736x/4c/ec/13/4cec13a6450152d07c148abb7c5dc79c.jpg'),
(2, 'Vegeta', 'Saiyajin', 'Planeta Vegeta', 'Galick Ho', 'Super Saiyajin Blue', 'https://i.pinimg.com/1200x/2d/d9/e0/2dd9e073adce4936a305be9456ef518e.jpg'),
(3, 'Gohan', 'Saiyajin', 'Terra', 'Masenko', 'Super Saiyajin 2', 'https://i.pinimg.com/736x/a0/67/0e/a0670e507373df1747bdc575ada3ddd7.jpg'),
(4, 'Piccolo', 'Namekuseijin', 'Planeta Namekusei', 'Makankosappo', 'Orange Piccolo', 'https://i.pinimg.com/736x/3d/c0/9f/3dc09f1c8fffca181d2150e4bcead6aa.jpg'),
(5, 'Kuririn', 'Humano', 'Terra', 'Kienzan', 'Sem transformação', 'https://i.pinimg.com/736x/f6/73/7e/f6737e547054db9a4ccfe78506265f21.jpg'),
(6, 'Trunks', 'Saiyajin', 'Terra', 'Final Flash', 'Super Saiyajin', 'https://i.pinimg.com/736x/df/fc/e9/dffce9752db57ff8eb85119fc12eeaf7.jpg'),
(7, 'Freeza', 'Raça de Freeza', 'Planeta Freeza 79', 'Death Ball', 'Golden Freeza', 'https://i.pinimg.com/736x/8b/70/2b/8b702bae474d5c3a7f54e15f3f6bfa46.jpg'),
(8, 'Cell', 'Bio-Android', 'Terra', 'Kamehameha', 'Super Perfect Cell', 'https://i.pinimg.com/736x/cc/5f/b6/cc5fb6cafeada200169d0fea9db84eb0.jpg'),
(9, 'Majin Boo', 'Majin', 'Desconhecido', 'Majin Kamehameha', 'Super Boo', 'https://i.pinimg.com/736x/71/c4/4c/71c44c79bd480430e896fbd7d3dee073.jpg'),
(10, 'Beerus', 'Deus da Destruição', 'Planeta Beerus', 'Hakai', 'Sem transformação', 'https://i.pinimg.com/736x/c9/2c/f5/c92cf55418388e2b9484a9c87a2e6f4b.jpg'),
(11, 'Yamcha', 'Humano', 'Terra', 'Sokidan', 'Sem transformação', 'https://i.pinimg.com/736x/0b/6a/43/0b6a4380a7ff78e43716a823bb0bdae0.jpg'),
(12, 'Tenshinhan', 'Humano', 'Terra', 'Kikoho', 'Sem transformação', 'https://i.pinimg.com/736x/92/bd/37/92bd379554782116d461549b23c6686d.jpg'),
(13, 'Mestre Kame', 'Humano', 'Terra', 'Kamehameha', 'Sem transformação', 'https://i.pinimg.com/736x/9a/27/ec/9a27ec7d94ef834289a5cea7f4b50635.jpg'),
(14, 'Goten', 'Saiyajin', 'Terra', 'Kamehameha', 'Super Saiyajin', 'https://i.pinimg.com/1200x/db/70/7b/db707b5d7fc79330ee3dd8d084154503.jpg'),
(15, 'Android 18', 'Android', 'Terra', 'Destructo Disc', 'Sem transformação', 'https://i.pinimg.com/736x/3f/00/c6/3f00c618a476a275e27773107ad3daab.jpg'),
(16, 'Android 17', 'Android', 'Terra', 'Power Blitz', 'Sem transformação', 'https://i.pinimg.com/1200x/8e/3a/51/8e3a5102d5c773c4ecba38530b1ff755.jpg'),
(17, 'Raditz', 'Saiyajin', 'Planeta Vegeta', 'Double Sunday', 'Sem transformação', 'https://i.pinimg.com/1200x/5e/8e/7f/5e8e7fe69b06ba775e3d2df33f334810.jpg'),
(18, 'Nappa', 'Saiyajin', 'Planeta Vegeta', 'Break Cannon', 'Sem transformação', 'https://i.pinimg.com/1200x/90/3d/55/903d5518d5ed7274f73175a99d64190a.jpg'),
(19, 'Broly', 'Saiyajin', 'Planeta Vegeta', 'Gigantic Meteor', 'Super Saiyajin Lendário', 'https://i.pinimg.com/736x/56/3a/ad/563aad8a92d7fb52a884eb2a3fde659a.jpg'),
(20, 'Jiren', 'Humanoide', 'Universo 11', 'Power Impact', 'Full Power', 'https://i.pinimg.com/736x/fb/45/4c/fb454cd51b573da7f1512024cc74ced1.jpg'),
(21, 'Tenshinhan', 'Humano', 'Terra', 'Kikoho', 'Sem transformação', 'https://i.pinimg.com/736x/92/bd/37/92bd379554782116d461549b23c6686d.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `email`, `senha`, `data_cadastro`) VALUES
(14, 'kessily', 'kessily', 'kessily@gmail.com', '$2y$10$.QjmE15bcCmmFUqPcG9q8uGk9EgFUQYKW449XuUvmgCp8IhuNWXCi', '2026-09-17 23:09:45');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `personagens`
--
ALTER TABLE `personagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `personagens`
--
ALTER TABLE `personagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
