-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/11/2023 às 17:43
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alergia`
--

CREATE TABLE `alergia` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alergia`
--

INSERT INTO `alergia` (`id`, `nome`, `descricao`) VALUES
(1, 'Pollen', 'Allergic reaction to pollen'),
(2, 'Penicillin', 'Allergic reaction to penicillin');

-- --------------------------------------------------------

--
-- Estrutura para tabela `alergia_usuario`
--

CREATE TABLE `alergia_usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_alergia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `contato_emergencia`
--

CREATE TABLE `contato_emergencia` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `contato_emergencia`
--

INSERT INTO `contato_emergencia` (`id`, `id_usuario`, `nome`, `email`, `telefone`) VALUES
(1, 1, 'Emergency Contact 1', 'emergency1@example.com', '123-456-7890'),
(2, 2, 'Emergency Contact 2', 'emergency2@example.com', '987-654-3210');

-- --------------------------------------------------------

--
-- Estrutura para tabela `doenca`
--

CREATE TABLE `doenca` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `doenca`
--

INSERT INTO `doenca` (`id`, `nome`, `descricao`) VALUES
(1, 'Hypertension', 'High blood pressure'),
(2, 'High Cholesterol', 'Elevated levels of cholesterol in the blood');

-- --------------------------------------------------------

--
-- Estrutura para tabela `informacoes_emergencia`
--

CREATE TABLE `informacoes_emergencia` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome_contato` varchar(255) NOT NULL,
  `email_contato` varchar(255) NOT NULL,
  `telefone_contato` varchar(255) NOT NULL,
  `parentesco` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `informacoes_emergencia`
--

INSERT INTO `informacoes_emergencia` (`id`, `id_usuario`, `nome_contato`, `email_contato`, `telefone_contato`, `parentesco`) VALUES
(1, 1, 'Emergency Contact 1', 'emergency1@example.com', '123-456-7890', 'Call 911 in case of emergency'),
(2, 2, 'Emergency Contact 2', 'emergency2@example.com', '987-654-3210', 'Administer prescribed medication as needed');

-- --------------------------------------------------------

--
-- Estrutura para tabela `medicamento`
--

CREATE TABLE `medicamento` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `dosagem` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medicamento`
--

INSERT INTO `medicamento` (`id`, `nome`, `descricao`, `dosagem`) VALUES
(1, 'Metformin', 'Used to treat type 2 diabetes', 1000),
(2, 'Insulin', 'Hormone for blood sugar control', 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `registro_saude`
--

CREATE TABLE `registro_saude` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `data` date NOT NULL,
  `nivel_acucar_sangue` float NOT NULL,
  `peso` float NOT NULL,
  `altura` float NOT NULL,
  `pressao_arterial` float NOT NULL,
  `glicose_na_urina` tinyint(1) NOT NULL,
  `hipoglicemia` tinyint(1) NOT NULL,
  `hiperglicemia` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `registro_saude`
--

INSERT INTO `registro_saude` (`id`, `id_usuario`, `data`, `nivel_acucar_sangue`, `peso`, `altura`, `pressao_arterial`, `glicose_na_urina`, `hipoglicemia`, `hiperglicemia`) VALUES
(1, 1, '2023-10-01', 130, 71.2, 175, 1.5, 0, 0, 1),
(2, 2, '2023-10-02', 150, 63.5, 160, 1.44444, 1, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` char(1) NOT NULL,
  `tipo_diabetes` varchar(255) NOT NULL,
  `data_diagnostico` date NOT NULL,
  `nivel_acucar_sangue` float NOT NULL,
  `peso` float NOT NULL,
  `altura` float NOT NULL,
  `pressao_arterial` varchar(255) DEFAULT NULL,
  `historico_medico` varchar(255) NOT NULL,
  `medicamentos` varchar(255) NOT NULL,
  `alergias` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `cpf`, `data_nascimento`, `sexo`, `tipo_diabetes`, `data_diagnostico`, `nivel_acucar_sangue`, `peso`, `altura`, `pressao_arterial`, `historico_medico`, `medicamentos`, `alergias`) VALUES
(1, 'John Doe', 'john.doe@example.com', '12345678901', '1990-05-15', 'M', 'Type 1', '2020-03-10', 120, 70.5, 175, '120/80', 'None', 'Insulin', 'cu'),
(2, 'Jane Smith', 'jane.smith@example.com', '98765432101', '1988-09-20', 'F', 'Type 2', '2018-06-25', 140, 62.3, 160, '130/90', 'High blood pressure', 'Metformin', 'Pollen allergy'),
(9, '', 'caramelo@gmail.com', '88877766655', '0000-00-00', 'm', '2', '2010-10-22', 130, 60, 190, '80', 'none', 'gardenal', 'rua'),
(17, '', 'amandamilleo2@gmail.com', '08458771942', '0000-00-00', 'f', '1', '2010-10-22', 130, 30, 170, '80', 'none', 'gardenal', 'none'),
(24, 'fsdfsdfsf', '', 'fdsfsfsdfsd', '0000-00-00', '', '', '0000-00-00', 0, 0, 0, '', '', '', ''),
(25, '', '', '', '0000-00-00', '', '', '0000-00-00', 0, 0, 0, '', '', '', ''),
(26, '', '', '', '0000-00-00', '', '', '0000-00-00', 0, 0, 0, '', '', '', ''),
(30, '', '', '', '0000-00-00', '', '', '0000-00-00', 0, 0, 0, '', '', '', ''),
(32, '', '', '', '0000-00-00', '', '', '0000-00-00', 0, 0, 0, '', '', '', ''),
(33, '', '', '', '0000-00-00', '', '', '0000-00-00', 0, 0, 0, '', '', '', ''),
(34, '', '', '', '0000-00-00', '', '', '0000-00-00', 0, 0, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario_doenca`
--

CREATE TABLE `usuario_doenca` (
  `id_usuario` int(11) NOT NULL,
  `id_doenca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario_medicamento`
--

CREATE TABLE `usuario_medicamento` (
  `id_usuario` int(11) NOT NULL,
  `id_medicamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alergia`
--
ALTER TABLE `alergia`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `alergia_usuario`
--
ALTER TABLE `alergia_usuario`
  ADD PRIMARY KEY (`id_usuario`,`id_alergia`),
  ADD KEY `id_alergia` (`id_alergia`);

--
-- Índices de tabela `contato_emergencia`
--
ALTER TABLE `contato_emergencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `doenca`
--
ALTER TABLE `doenca`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `informacoes_emergencia`
--
ALTER TABLE `informacoes_emergencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `registro_saude`
--
ALTER TABLE `registro_saude`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario_doenca`
--
ALTER TABLE `usuario_doenca`
  ADD PRIMARY KEY (`id_usuario`,`id_doenca`),
  ADD KEY `id_doenca` (`id_doenca`);

--
-- Índices de tabela `usuario_medicamento`
--
ALTER TABLE `usuario_medicamento`
  ADD PRIMARY KEY (`id_usuario`,`id_medicamento`),
  ADD KEY `id_medicamento` (`id_medicamento`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alergia`
--
ALTER TABLE `alergia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `contato_emergencia`
--
ALTER TABLE `contato_emergencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `doenca`
--
ALTER TABLE `doenca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `informacoes_emergencia`
--
ALTER TABLE `informacoes_emergencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `registro_saude`
--
ALTER TABLE `registro_saude`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `alergia_usuario`
--
ALTER TABLE `alergia_usuario`
  ADD CONSTRAINT `alergia_usuario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `alergia_usuario_ibfk_2` FOREIGN KEY (`id_alergia`) REFERENCES `alergia` (`id`);

--
-- Restrições para tabelas `contato_emergencia`
--
ALTER TABLE `contato_emergencia`
  ADD CONSTRAINT `contato_emergencia_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `contato_emergencia_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `informacoes_emergencia`
--
ALTER TABLE `informacoes_emergencia`
  ADD CONSTRAINT `informacoes_emergencia_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `registro_saude`
--
ALTER TABLE `registro_saude`
  ADD CONSTRAINT `registro_saude_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `registro_saude_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `usuario_doenca`
--
ALTER TABLE `usuario_doenca`
  ADD CONSTRAINT `usuario_doenca_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `usuario_doenca_ibfk_2` FOREIGN KEY (`id_doenca`) REFERENCES `doenca` (`id`);

--
-- Restrições para tabelas `usuario_medicamento`
--
ALTER TABLE `usuario_medicamento`
  ADD CONSTRAINT `usuario_medicamento_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `usuario_medicamento_ibfk_2` FOREIGN KEY (`id_medicamento`) REFERENCES `medicamento` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
