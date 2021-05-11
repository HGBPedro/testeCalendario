-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Maio-2021 às 06:59
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `testecalendario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_tarefas`
--

CREATE TABLE `tbl_tarefas` (
  `id_Tarefa` bigint(11) NOT NULL,
  `dt_DataInicio` date NOT NULL,
  `dt_DataFim` date DEFAULT NULL,
  `hr_HoraInicio` time DEFAULT NULL,
  `hr_HoraFim` time DEFAULT NULL,
  `de_TituloTarefa` varchar(100) NOT NULL,
  `de_Descricao` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbl_tarefas`
--

INSERT INTO `tbl_tarefas` (`id_Tarefa`, `dt_DataInicio`, `dt_DataFim`, `hr_HoraInicio`, `hr_HoraFim`, `de_TituloTarefa`, `de_Descricao`) VALUES
(5, '2021-05-12', '2021-05-13', '00:00:00', '00:00:00', 'Teste pelo front', 'teste de  inclusao pelo frontend'),
(6, '2021-05-14', '2021-05-15', '00:00:00', '23:59:59', 'Teste 2 pelo front', 'teste 2 pelo front end'),
(7, '2021-05-29', '2021-05-30', '00:00:00', '23:59:59', 'teste edit data', 'testando edit data');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbl_tarefas`
--
ALTER TABLE `tbl_tarefas`
  ADD PRIMARY KEY (`id_Tarefa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_tarefas`
--
ALTER TABLE `tbl_tarefas`
  MODIFY `id_Tarefa` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
