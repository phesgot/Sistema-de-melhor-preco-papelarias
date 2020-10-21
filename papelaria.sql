-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Dez-2018 às 18:15
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `papelaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_cat` int(11) NOT NULL,
  `nome_cat` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_cat`, `nome_cat`) VALUES
(3, 'Lápis de cor'),
(4, 'Borracha'),
(5, 'Caderno 10x1'),
(6, 'Papel sulfite A4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_end` int(11) NOT NULL,
  `cep` int(8) NOT NULL,
  `estado` varchar(40) NOT NULL,
  `cidade` varchar(40) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `endereco` varchar(80) NOT NULL,
  `fk_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_end`, `cep`, `estado`, `cidade`, `bairro`, `endereco`, `fk_usuario`) VALUES
(6, 73050100, 'DF', 'Brasília', 'SOBRADINHO', 'Quadra 10', 23),
(7, 73050989, 'DF', 'Brasília', 'ÁGUAS CLARAS', 'Quadra 12', 24),
(8, 73059999, 'DF', 'Brasília', 'SOBRADINHO', 'qudra 11', 26);

-- --------------------------------------------------------

--
-- Estrutura da tabela `escola`
--

CREATE TABLE `escola` (
  `id_escola` int(11) NOT NULL,
  `nome_escola` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `escola`
--

INSERT INTO `escola` (`id_escola`, `nome_escola`) VALUES
(2, 'Centro Educacional 02 de Sobradinho-DF'),
(3, 'Centro Educacional 03 de Sobradinho-DF'),
(4, 'Colégio Projeção'),
(6, 'CEF 04'),
(7, 'Educar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `quantidade_item` int(11) NOT NULL,
  `fk_item_lista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`id_item`, `item`, `quantidade_item`, `fk_item_lista`) VALUES
(70, 5, 5, 7),
(71, 4, 2, 7),
(72, 3, 2, 8),
(73, 4, 2, 8),
(74, 5, 2, 8),
(75, 6, 1, 8),
(76, 3, 3, 9),
(77, 4, 2, 9),
(78, 5, 2, 9),
(79, 6, 1, 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista`
--

CREATE TABLE `lista` (
  `id_lista` int(11) NOT NULL,
  `escola` int(11) NOT NULL,
  `ensino` varchar(50) NOT NULL,
  `ano` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lista`
--

INSERT INTO `lista` (`id_lista`, `escola`, `ensino`, `ano`) VALUES
(7, 4, 'Fundamental', '1º Ano Fundamental'),
(8, 2, 'Fundamental', '2º Ano Fundamental'),
(9, 7, 'Fundamental', '1º Ano Fundamental');

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `marca` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `marca`
--

INSERT INTO `marca` (`id_marca`, `marca`) VALUES
(1, 'Faber Castell'),
(2, 'Stabilo'),
(3, 'Black Out'),
(4, 'Chamequinho'),
(5, 'Chamex'),
(6, 'Sulfite 40kg'),
(7, 'Molin'),
(8, 'Cis'),
(9, 'Bic'),
(10, 'Jandaia'),
(11, 'Foroni'),
(12, 'Confetti');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_pro` int(11) NOT NULL,
  `nome_pro` varchar(80) NOT NULL,
  `preco_pro` int(10) NOT NULL,
  `imagem_pro` varchar(100) NOT NULL,
  `info_pro` varchar(4000) NOT NULL,
  `quant_pro` int(10) NOT NULL,
  `promocao_pro` int(10) NOT NULL,
  `desconto_pro` int(10) NOT NULL,
  `fk_categoria_pro` int(11) NOT NULL,
  `fk_usuario_pro` int(11) NOT NULL,
  `fk_marca_pro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_pro`, `nome_pro`, `preco_pro`, `imagem_pro`, `info_pro`, `quant_pro`, `promocao_pro`, `desconto_pro`, `fk_categoria_pro`, `fk_usuario_pro`, `fk_marca_pro`) VALUES
(1, 'Caixa De Lápis De Cor Bicolor - 48 Cores', 3099, '1537715051.jpg', 'Caixa de lápis de cor Bicolor com 48 cores.\r\nContém 24 lápis com 2 cores cada: cores em dobro, criatividade em dobro.\r\nProduzido com madeira 100% reflorestada, certificada pelo FSC®.\r\nCÓDIGO DO FORNECEDOR: 120624G\r\n', 20, 0, 0, 3, 24, 1),
(4, 'Caderno universitário capa dura 10x1 200fl', 1600, '1538134050.jpg', 'Capa Dura; \r\nVerniz localizado; \r\nEasy pocket; \r\nFrontispício e divisórias personalizadas; \r\n200 folhas (10 matérias); \r\nFolhas pautadas; 4 furos para arquivo; \r\nMicrosserrilha; \r\nProduto certificado FSC; \r\nFormato: 215mm x 275mm; \r\nCapa e contracapa: Papelão (750g/m²) e revestimento:Papel Couché (120gr/m²); \r\nFolhas Internas 56g/m²;\r\n Divisórias 90g/²; Guarda: off-set (90g/m²)', 10, 0, 0, 5, 24, 3),
(5, 'Borracha Faber-castell Tk com Cinta Plástica Grande ', 690, '1542708876.jpg', 'Fórmula livre de PVC com máxima apagabilidade Capa protetora ergonômica que mantém a borracha sempre limpa e facilita o uso', 20, 0, 0, 4, 24, 1),
(6, 'Papel Sulfite Chamequinho A4 100 Folhas Cor Branco', 1090, '1542709015.jpg', 'O papel sulfite Chamequinho é de altíssima qualidade, possui tamanho A4 210x297.', 10, 0, 0, 6, 24, 4),
(7, 'Caderno Universitário Espiral Capa Dura 10X1 200 Folhas Confetti Colors Salmão -', 3290, '1542709716.jpg', 'Caderno decorado universitário com capa plástica em polipropileno Colors, 200 folhas pautadas impressa 10x1 em papel 60g/m2, com acessorios porta documento e elastico, fechamento em espiral cor Salmão.', 20, 0, 0, 5, 23, 12),
(8, 'Lápis de Cor BIC Evolution Com 12 Cores - Grátis 4 Lápis Preto', 1790, '1542709823.jpg', 'Lapis de cor com ponto ultra resistente, corpo sextavado com mina macia e fácil de apontar, cores vivase intensas com ótimo poder de cobertura, seguro para crianca e não lasca.', 20, 0, 0, 3, 23, 9),
(9, 'Papel Sulfite Chamex Office A4 75G Alcalino 210X297 500 Folhas', 2390, '1542710100.jpg', 'O papel sulfite chamex office - a4 - pacote com 500 folhas é a união de tudo o que você precisa em suas impressões. Seu tamanho, a4, é tradicionalmente usado em cartas, comunicados, contratos e diversos outros documentos, dos mais simples aos mais elaborados. Além disso, esse pacote de sulfite, da marca chamex, é considerado o melhor papel para uso profissional e é produzido com florestas 100% plantadas e renováveis, algo que o permite fazer as impressões necessárias, mas com responsabilidade ambiental. Tenha sempre qualidade nas suas impressões com o papel sulfite chamex office - a4 - pacote com 500 folhas Quem busca uma impressão perfeita e duradoura deve contar com a qualidade do papel sulfite chamex office - a4 - pacote com 500 folhas, que foi desenvolvido para atender às necessidades de crianças, estudantes e diferentes profissionais. Com esse tipo de sulfite - que apresenta excelente desempenho em todos os equipamentos de impressão -, é possível obter resultados bem mais nítidos, com a clareza que um desenho pede, mas também com a resistência que contratos profissionais e documentos importantes exigem. Independentemente de como for usar o papel sulfite chamex office - a4 - pacote com 500 folhas, tenha a certeza de que terá a qualidade que precisa.', 20, 0, 0, 6, 23, 5),
(10, 'Borracha Cis Branca Média Com 2 Unidades', 990, '1542710190.jpg', 'Borracha branca, apaga sem deixar borrões. “Contém certificado Inmetro”', 20, 0, 0, 4, 23, 8),
(11, 'Borracha BIC Com Abertura Automática', 2490, '1542710369.jpg', 'Borracha com abertura automática, apaga sem manchar o papel, não tóxica, aprovado pelo Inmetro.', 20, 0, 0, 4, 26, 9),
(12, 'Caderno Universitário Espiral Capa Dura 10X1 200 Folhas Jandaia Harry Potter Ros', 3990, '1542710427.jpg', 'Caderno espiral universitário,10 matérias,200 folhas, miolo decorado, cartela de adesivos,bolsa em papel, aplicação de foil metalizado na capa.', 20, 0, 0, 5, 26, 10),
(13, 'Lápis de Cor Molin Minnie Com 12 Cores - Estampa Diversas', 1190, '1542710581.jpg', 'Minnie a primeira dama da The Wal Disney Company, quer compartilhar toda alegria, carisma e aprendizado com suas amiguinhas. Para isso, ela convidada todas as meninas, para ingressar neste mundo meigo e colorido com os produtos Molin. Contém certificado do Inmetro', 20, 0, 0, 3, 26, 7),
(14, 'Papel Sulfite 40Kg A-4 120G/M2 50 Folhas', 990, '1542710657.jpg', 'Papel branco multiuso em embalagem com 50 folhas. Prático para se usar em qualquer lugar. Tamanho A-4', 20, 0, 0, 6, 26, 6);

-- --------------------------------------------------------

--
-- Stand-in structure for view `temporario`
-- (See below for the actual view)
--
CREATE TABLE `temporario` (
`item` int(11)
,`quantidade_item` int(11)
,`preco_pro` int(10)
,`nome_pro` varchar(80)
,`nome_usu` varchar(80)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usu` int(11) NOT NULL,
  `nome_usu` varchar(80) NOT NULL,
  `email_usu` varchar(80) NOT NULL,
  `senha_usu` varchar(80) NOT NULL,
  `cpf_usu` varchar(11) NOT NULL,
  `cnpj_usu` varchar(14) NOT NULL,
  `telefone_usu` varchar(11) NOT NULL,
  `tipo_usu` int(1) NOT NULL,
  `status_usu` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usu`, `nome_usu`, `email_usu`, `senha_usu`, `cpf_usu`, `cnpj_usu`, `telefone_usu`, `tipo_usu`, `status_usu`) VALUES
(1, 'Pedro Henrique do Espirito Santo Torres', 'phesgot001@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '70240508106', '', '61981027519', 1, 1),
(2, 'Lucas Gonçalves Torres', 'lucas@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '99466225057', '', '61981027519', 1, 1),
(23, 'Ciapel ', 'ciapel@gmail.com.br', 'e10adc3949ba59abbe56e057f20f883e', '', '56931538000174', '6135917777', 2, 1),
(24, 'Pintando 7', 'pintando7@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '82545246000103', '6135910099', 2, 1),
(25, 'Lucas Torres', 'torres@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '78266715076', '', '06135913426', 1, 1),
(26, 'Anderson', 'anderson@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '02625246000184', '6135913426', 2, 1),
(27, 'Thiago Pulooo', 'tiago@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '25968483091', '', '55555555555', 1, 2);

-- --------------------------------------------------------

--
-- Structure for view `temporario`
--
DROP TABLE IF EXISTS `temporario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `temporario`  AS  select `item`.`item` AS `item`,`item`.`quantidade_item` AS `quantidade_item`,`produto`.`preco_pro` AS `preco_pro`,`produto`.`nome_pro` AS `nome_pro`,`usuario`.`nome_usu` AS `nome_usu` from ((`item` join `produto`) join `usuario`) where ((`item`.`fk_item_lista` = '8') and (`item`.`item` = `produto`.`fk_categoria_pro`) and (`produto`.`fk_usuario_pro` = `usuario`.`id_usu`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_end`),
  ADD KEY `fk_usuario` (`fk_usuario`);

--
-- Indexes for table `escola`
--
ALTER TABLE `escola`
  ADD PRIMARY KEY (`id_escola`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `fk_item_lista` (`fk_item_lista`),
  ADD KEY `item` (`item`);

--
-- Indexes for table `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`id_lista`),
  ADD KEY `escola` (`escola`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_pro`),
  ADD KEY `fk_categoria_pro` (`fk_categoria_pro`),
  ADD KEY `fk_usuario_pro` (`fk_usuario_pro`),
  ADD KEY `fk_marca_pro` (`fk_marca_pro`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_end` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `escola`
--
ALTER TABLE `escola`
  MODIFY `id_escola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `lista`
--
ALTER TABLE `lista`
  MODIFY `id_lista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_usu`);

--
-- Limitadores para a tabela `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`fk_item_lista`) REFERENCES `lista` (`id_lista`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`item`) REFERENCES `categoria` (`id_cat`);

--
-- Limitadores para a tabela `lista`
--
ALTER TABLE `lista`
  ADD CONSTRAINT `lista_ibfk_1` FOREIGN KEY (`escola`) REFERENCES `escola` (`id_escola`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`fk_categoria_pro`) REFERENCES `categoria` (`id_cat`),
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`fk_usuario_pro`) REFERENCES `usuario` (`id_usu`),
  ADD CONSTRAINT `produto_ibfk_3` FOREIGN KEY (`fk_marca_pro`) REFERENCES `marca` (`id_marca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
