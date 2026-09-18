-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Set-2026 às 21:59
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

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
-- Estrutura da tabela `personagens`
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
-- Extraindo dados da tabela `personagens`
--

INSERT INTO `personagens` (`id`, `nome`, `raca`, `planeta_origem`, `tecnica_principal`, `transformacao`, `imagem`) VALUES
(1, 'Goku', 'Saiyajin', 'Planeta Vegeta', 'Kamehameha', 'Super Saiyajin', 'https://i.pinimg.com/736x/18/ff/19/18ff19e5b4729201c7772513f190eb43.jpg'),
(2, 'Vegeta', 'Saiyajin', 'Planeta Vegeta', 'Galick Ho', 'Super Saiyajin Blue', 'https://i.pinimg.com/736x/01/36/e4/0136e4da5be832c0680bef40e1801423.jpg'),
(3, 'Gohan', 'Saiyajin', 'Terra', 'Masenko', 'Super Saiyajin 2', 'https://i.pinimg.com/736x/10/a3/af/10a3afb7c678d12f1161a96e10da8190.jpg'),
(4, 'Piccolo', 'Namekuseijin', 'Planeta Namekusei', 'Makankosappo', 'Orange Piccolo', 'https://i.pinimg.com/736x/b5/a2/dc/b5a2dce19d83809760f7c1be02e7ec05.jpg'),
(5, 'Kuririn', 'Humano', 'Terra', 'Kienzan', 'Sem transformação', 'https://i.pinimg.com/736x/25/90/25/2590257f1b3b173504fb935a130bbb2b.jpg'),
(6, 'Trunks', 'Saiyajin', 'Terra', 'Final Flash', 'Super Saiyajin', 'https://i.pinimg.com/736x/c3/c0/bd/c3c0bda5955542b8a7caaa454f012e22.jpg'),
(7, 'Freeza', 'Raça de Freeza', 'Planeta Freeza 79', 'Death Ball', 'Golden Freeza', 'https://i.pinimg.com/736x/e2/35/6e/e2356e4702d6bcab8a53df5886337e5b.jpg'),
(8, 'Cell', 'Bio-Android', 'Terra', 'Kamehameha', 'Super Perfect Cell', 'https://i.pinimg.com/736x/64/e7/51/64e751f876e1075a02405377eecc276e.jpg'),
(9, 'Majin Boo', 'Majin', 'Desconhecido', 'Majin Kamehameha', 'Super Boo', 'https://i.pinimg.com/736x/7a/38/2a/7a382ad30af0999ea098796f0189aacd.jpg'),
(10, 'Beerus', 'Deus da Destruição', 'Planeta Beerus', 'Hakai', 'Sem transformação', 'https://i.pinimg.com/736x/64/d8/27/64d827f7a8130b52920b6c9e121316ef.jpg'),
(11, 'Yamcha', 'Humano', 'Terra', 'Sokidan', 'Sem transformação', 'https://i.pinimg.com/736x/45/80/5a/45805a127875b28ea87b847b584e1d67.jpg'),
(12, 'Tenshinhan', 'Humano', 'Terra', 'Kikoho', 'Sem transformação', 'https://i.pinimg.com/736x/50/2f/53/502f53dacbc1cd61478ec42f85c74eed.jpg'),
(13, 'Mestre Kame', 'Humano', 'Terra', 'Kamehameha', 'Sem transformação', 'https://i.pinimg.com/736x/aa/3c/da/aa3cda5bb902c5d3b9f9cd39ea27c433.jpg'),
(14, 'Goten', 'Saiyajin', 'Terra', 'Kamehameha', 'Super Saiyajin', 'https://i.pinimg.com/736x/12/57/ca/1257ca6e04a81beb397359d38412fe03.jpg'),
(15, 'Android 18', 'Android', 'Terra', 'Destructo Disc', 'Sem transformação', 'https://i.pinimg.com/736x/2b/47/2a/2b472a95043b3b0dc8290d4ca9d9af52.jpg'),
(16, 'Android 17', 'Android', 'Terra', 'Power Blitz', 'Sem transformação', 'https://i.pinimg.com/736x/da/29/71/da2971bd5dd4af2094e90ed26538eec5.jpg'),
(17, 'Raditz', 'Saiyajin', 'Planeta Vegeta', 'Double Sunday', 'Sem transformação', 'https://i.pinimg.com/736x/cd/a5/3d/cda53ddf5f333fb0fd6740a4f4e71c4c.jpg'),
(18, 'Nappa', 'Saiyajin', 'Planeta Vegeta', 'Break Cannon', 'Sem transformação', 'https://i.pinimg.com/736x/2a/6d/d2/2a6dd2dbda942958fec9becccd08bf04.jpg'),
(20, 'Jiren', 'Humanoide', 'Universo 11', 'Power Impact', 'Full Power', 'https://i.pinimg.com/736x/63/0d/f9/630df9601b708a7093f41af3e33a1985.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
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
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `email`, `senha`, `data_cadastro`) VALUES
(14, 'kessily', 'kessily', 'kessily@gmail.com', '$2y$10$.QjmE15bcCmmFUqPcG9q8uGk9EgFUQYKW449XuUvmgCp8IhuNWXCi', '2026-09-17 23:09:45');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `personagens`
--
ALTER TABLE `personagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
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
