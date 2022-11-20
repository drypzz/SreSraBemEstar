--[
  -- author: Team;
  -- type: .sql;
-- ]

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `sbe`;
USE `sbe`;

DROP TABLE IF EXISTS `agenda`; CREATE TABLE `agenda` (
  `Cod_Agen` int(11) NOT NULL,
  `CPF_Idoso` varchar(180) DEFAULT NULL,
  `Data_Tarefa` date DEFAULT NULL,
  `Hora_Tarefa` time DEFAULT NULL,
  `CPF_Resp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `cadidoso`; CREATE TABLE `cadidoso` (
  `Nome_Idoso` varchar(180) DEFAULT NULL,
  `Email_Idoso` varchar(180) DEFAULT NULL,
  `Dat_Nasc_Idoso` varchar(255) DEFAULT NULL,
  `Telefone_Idoso` varchar(255) DEFAULT NULL,
  `CPF_Idoso` varchar(14) NOT NULL,
  `CPF_Resp` varchar(255) NOT NULL,
  `Senha_Idoso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `cadresponsavel`; CREATE TABLE `cadresponsavel` (
  `CPF_Resp` varchar(14) NOT NULL,
  `Nome_Resp` varchar(180) DEFAULT NULL,
  `Email_Resp` varchar(180) DEFAULT NULL,
  `Dat_Nasc_Resp` varchar(255) DEFAULT NULL,
  `Telefone_Resp` varchar(255) DEFAULT NULL,
  `Senha_Resp` varchar(180) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `cod_idoso_remed`; CREATE TABLE `cod_idoso_remed` (
  `Cod_Idoso_Remed` int(11) NOT NULL,
  `Cod_Remed` int(11) DEFAULT NULL,
  `CPF_Idoso` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `comorbidade`; CREATE TABLE `comorbidade` (
  `Cod_Como` int(11) NOT NULL,
  `Comorbidade` varchar(14) DEFAULT NULL,
  `Cod_Nivel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `idoso_como`; CREATE TABLE `idoso_como` (
  `Cod_Idoso_Como` int(11) NOT NULL,
  `CPF_Idoso` varchar(14) DEFAULT NULL,
  `Cod_Como` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `nivel`; CREATE TABLE `nivel` (
  `Cod_Nivel` int(11) NOT NULL,
  `Descricao_Nivel` text(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `remedio`; CREATE TABLE `remedio` (
  `Cod_Remedio` int(11) NOT NULL,
  `Nome_Remed` varchar(180) DEFAULT NULL,
  `Descricao_Remed` text(180) DEFAULT NULL,
  `CPF_Resp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `tarefa`; CREATE TABLE `tarefa` (
  `Cod_Tarefa` int(11) NOT NULL,
  `Desc_Tarefa` varchar(255) DEFAULT NULL,
  `Cod_Remedio` int(11) DEFAULT NULL,
  `Cod_Agen` int(11) DEFAULT NULL,
  `CPF_Resp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `agenda` ADD PRIMARY KEY (`Cod_Agen`), ADD KEY `CPF_Idoso` (`CPF_Idoso`), ADD KEY `CPF_Resp` (`CPF_Resp`);

ALTER TABLE `cadidoso` ADD PRIMARY KEY (`CPF_Idoso`), ADD KEY `CPF_Resp` (`CPF_Resp`);

ALTER TABLE `cadresponsavel` ADD PRIMARY KEY (`CPF_Resp`);

ALTER TABLE `cod_idoso_remed` ADD PRIMARY KEY (`Cod_Idoso_Remed`), ADD KEY `Cod_Remed` (`Cod_Remed`), ADD KEY `CPF_Idoso` (`CPF_Idoso`);

ALTER TABLE `comorbidade` ADD PRIMARY KEY (`Cod_Como`), ADD KEY `Cod_Nivel` (`Cod_Nivel`);

ALTER TABLE `idoso_como` ADD PRIMARY KEY (`Cod_Idoso_Como`), ADD KEY `Cod_Como` (`Cod_Como`), ADD KEY `CPF_Idoso` (`CPF_Idoso`);

ALTER TABLE `nivel` ADD PRIMARY KEY (`Cod_Nivel`);

ALTER TABLE `remedio` ADD PRIMARY KEY (`Cod_Remedio`), ADD KEY `CPF_Resp` (`CPF_Resp`);

ALTER TABLE `tarefa` ADD PRIMARY KEY (`Cod_Tarefa`), ADD KEY `Cod_Agen` (`Cod_Agen`), ADD KEY `Cod_Remedio` (`Cod_Remedio`), ADD KEY `CPF_Resp` (`CPF_Resp`);

ALTER TABLE `agenda` ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`CPF_Idoso`) REFERENCES `cadidoso` (`CPF_Idoso`) ON DELETE SET NULL ON UPDATE SET NULL;

ALTER TABLE `cadidoso` ADD CONSTRAINT `CPF_Resp` FOREIGN KEY (`CPF_Resp`) REFERENCES `cadresponsavel` (`CPF_Resp`);

ALTER TABLE `cod_idoso_remed` ADD CONSTRAINT `cod_idoso_remed_ibfk_1` FOREIGN KEY (`Cod_Remed`) REFERENCES `remedio` (`Cod_Remedio`) ON DELETE SET NULL ON UPDATE SET NULL, ADD CONSTRAINT `cod_idoso_remed_ibfk_2` FOREIGN KEY (`CPF_Idoso`) REFERENCES `cadidoso` (`CPF_Idoso`);

ALTER TABLE `comorbidade` ADD CONSTRAINT `Cod_Nivel` FOREIGN KEY (`Cod_Nivel`) REFERENCES `nivel` (`Cod_Nivel`);

ALTER TABLE `idoso_como` ADD CONSTRAINT `Cod_Como` FOREIGN KEY (`Cod_Como`) REFERENCES `comorbidade` (`Cod_Como`), ADD CONSTRAINT `idoso_como_ibfk_1` FOREIGN KEY (`CPF_Idoso`) REFERENCES `cadidoso` (`CPF_Idoso`) ON DELETE SET NULL ON UPDATE SET NULL;

ALTER TABLE `tarefa` ADD CONSTRAINT `Cod_Agen` FOREIGN KEY (`Cod_Agen`) REFERENCES `agenda` (`Cod_Agen`), ADD CONSTRAINT `tarefa_ibfk_1` FOREIGN KEY (`Cod_Remedio`) REFERENCES `remedio` (`Cod_Remedio`) ON DELETE SET NULL ON UPDATE SET NULL;

COMMIT;