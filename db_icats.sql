--
-- Se quiser executar o projeto no computador, configure o config.php para isto
-- E é só importar esse código no phpmyadmin
--

CREATE DATABASE IF NOT EXISTS DB_ICATS;
USE DB_ICATS;

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `TB_USUARIOS` (
  `USU_CODIGO` int(11) NOT NULL auto_increment PRIMARY KEY,
  `USU_EMAIL` varchar(45) NOT NULL,
  `USU_NOME` varchar(80) NOT NULL,
  `USU_SENHA` varchar(10) NOT NULL,
  `USU_TELEFONE` varchar(45) NOT NULL,
  `USU_FOTO` varchar(40)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
-- --------------------------------------------------------

CREATE TABLE `TB_SEXOS` (
  `SEX_CODIGO` int(11) NOT NULL auto_increment PRIMARY KEY,
  `SEX_SEXO` varchar(9) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_sexos `
--

INSERT INTO `TB_SEXOS` (`SEX_CODIGO`, `SEX_SEXO`) VALUES
(1, 'Feminino'),
(2, 'Masculino');

-- --------------------------------------------------------
--
-- Estrutura da tabela `tb_gatos`
--

CREATE TABLE `TB_GATOS` (
  `GAT_CODIGO` int(11) NOT NULL auto_increment PRIMARY KEY,
  `GAT_NOME` varchar(80) NOT NULL,
  `GAT_IDADE` varchar(80) NOT NULL,
  `GAT_USU_CODIGO` int(11) NOT NULL,
  `GAT_SEX_CODIGO` int(11) NOT NULL,
  `GAT_FOTO` varchar(40),
  `GAT_DESCRICAO` varchar(200) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
CREATE TABLE `TB_HUMORES` (
  `HUM_CODIGO` int(11) NOT NULL auto_increment PRIMARY KEY,
  `HUM_HUMOR` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_humores`
--

INSERT INTO `TB_HUMORES` (`HUM_CODIGO`, `HUM_HUMOR`) VALUES
(1, 'Sonolento'),
(2, 'Triste'),
(3, 'Estressado'),
(4, 'Apavorado'),
(5, 'Alerta'),
(6, 'Animado'),
(7, 'Brincalhão'),
(8, 'Feliz');

-- --------------------------------------------------------
--
-- Estrutura da tabela `tb_estado_saude`
--

CREATE TABLE `TB_EST_SAUDE` (
  `EST_CODIGO` int(11) NOT NULL auto_increment PRIMARY KEY,
  `EST_GAT_CODIGO` int(11) NOT NULL,
  `EST_HUM_CODIGO` int(11) NOT NULL,
  `EST_DATA` date NOT NULL,
  `EST_PESO` float NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `TB_RECOVER` (

  `REC_CODIGO` int(20) NOT NULL auto_increment PRIMARY KEY,
  `REC_EMAIL` varchar(200) NOT NULL,
  `REC_HASH` varchar(200) NOT NULL,
  `REC_STATUS` int(20) NOT NULL DEFAULT 0

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `TB_GATOS` 
	ADD CONSTRAINT `FK_USUGAT` FOREIGN KEY (GAT_USU_CODIGO) REFERENCES `TB_USUARIOS`(USU_CODIGO),
	ADD CONSTRAINT `FK_SEXGAT` FOREIGN KEY (GAT_SEX_CODIGO) REFERENCES `TB_SEXOS`(SEX_CODIGO);
COMMIT;

ALTER TABLE `TB_EST_SAUDE` 
	ADD CONSTRAINT `FK_GATEST` FOREIGN KEY (EST_GAT_CODIGO) REFERENCES `TB_GATOS`(GAT_CODIGO),
	ADD CONSTRAINT `FK_HUMEST` FOREIGN KEY (EST_HUM_CODIGO) REFERENCES `TB_HUMORES`(HUM_CODIGO);
COMMIT;