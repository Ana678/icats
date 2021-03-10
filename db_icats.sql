CREATE DATABASE IF NOT EXISTS DB_ICATS;
USE DB_ICATS;

CREATE TABLE `tb_sexos` (
  `SEX_CODIGO` int(11) NOT NULL auto_increment PRIMARY KEY,
  `SEX_SEXO` varchar(9) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_sexos `
--

INSERT INTO `tb_sexos` (`SEX_CODIGO`, `SEX_SEXO`) VALUES
(1, 'Feminino'),
(2, 'Masculino');

-- --------------------------------------------------------
--
-- Estrutura da tabela `tb_gatos`
--

CREATE TABLE `tb_gatos` (
  `GAT_CODIGO` int(11) NOT NULL auto_increment PRIMARY KEY,
  `GAT_NOME` varchar(80) NOT NULL,
  `GAT_IDADE` varchar(80) NOT NULL,
  `GAT_USU_CODIGO` int(11) NOT NULL,
  `GAT_SEX_CODIGO` int(11) NOT NULL,
  `GAT_FOTO` varchar(40),
  `GAT_DESCRICAO` varchar(200) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
CREATE TABLE `tb_humores` (
  `HUM_CODIGO` int(11) NOT NULL auto_increment PRIMARY KEY,
  `HUM_HUMOR` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_humores`
--

INSERT INTO `tb_humores` (`HUM_CODIGO`, `HUM_HUMOR`) VALUES
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

CREATE TABLE `tb_est_saude` (
  `EST_CODIGO` int(11) NOT NULL auto_increment PRIMARY KEY,
  `EST_GAT_CODIGO` int(11) NOT NULL,
  `EST_HUM_CODIGO` int(11) NOT NULL,
  `EST_DATA` date NOT NULL,
  `EST_PESO` float NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tb_recover` (

  `REC_CODIGO` int(20) NOT NULL auto_increment PRIMARY KEY,
  `REC_EMAIL` varchar(200) NOT NULL,
  `REC_HASH` varchar(200) NOT NULL,
  `REC_STATUS` int(20) NOT NULL DEFAULT 0

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `tb_gatos` 
	ADD CONSTRAINT FK_USUGAT FOREIGN KEY (GAT_USU_CODIGO) REFERENCES TB_USUARIOS(USU_CODIGO),
	ADD CONSTRAINT FK_SEXGAT FOREIGN KEY (GAT_SEX_CODIGO) REFERENCES TB_SEXOS(SEX_CODIGO);
COMMIT;

ALTER TABLE `tb_est_saude` 
	ADD CONSTRAINT FK_GATEST FOREIGN KEY (EST_GAT_CODIGO) REFERENCES TB_GATOS(GAT_CODIGO),
	ADD CONSTRAINT FK_HUMEST FOREIGN KEY (EST_HUM_CODIGO) REFERENCES TB_HUMORES(HUM_CODIGO);
COMMIT;