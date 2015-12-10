DROP TABLE IF EXISTS `pessoa`;
CREATE TABLE `pessoa` (
  `id_pessoa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `dia_deletado` datetime DEFAULT NULL,
  `tipo` enum('Diretor','Coordenador','Professor','Transporte','Animal','Vegetal','Mecanizacao') DEFAULT NULL,
  PRIMARY KEY (`id_pessoa`),
  UNIQUE KEY `pessoa_unica` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `solicitacao`;
CREATE TABLE `solicitacao` (
  `id_solicitacao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_solicitante` int(10) unsigned NOT NULL,
  `id_professor` int(10) unsigned NOT NULL,
  `id_cancelado` int(10) unsigned NOT NULL,
  `dia_solicitacao` datetime DEFAULT NULL,
  `dia_saida` date DEFAULT NULL,
  `hora_saida` time DEFAULT NULL,
  `hora_retorno` time DEFAULT NULL,
  `turma` varchar(200) DEFAULT NULL,
  `num_alunos` tinyint(3) unsigned DEFAULT NULL,
  `fl_vegetal` tinyint(1) DEFAULT NULL,
  `fl_animal` tinyint(1) DEFAULT NULL,
  `fl_mecanizacao` tinyint(1) DEFAULT NULL,
  `fl_tecnico` tinyint(1) DEFAULT NULL,
  `fl_clima` tinyint(1) DEFAULT NULL,
  `material` text,
  `dia_aprovacao` datetime DEFAULT NULL,
  `dia_cancelado` datetime DEFAULT NULL,
  PRIMARY KEY (`id_solicitacao`),
  KEY `solicitacao_FKIndex1` (`id_solicitante`),
  KEY `solicitacao_FKIndex2` (`id_professor`),
  KEY `solicitacao_FKIndex3` (`id_cancelado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `pessoa` (`nome`, `email`, `senha`, `tipo`) VALUES
('Diretor', 'diretor@diretor.com', 'diretor', 'Diretor'),
('Coordenador', 'coordenador@coordenador.com', 'coordenador', 'Coordenador'),
('Transporte', 'transporte@transporte.com', 'transporte', 'Transporte'),
('Animal', 'animal@animal.com', 'animal', 'Animal'),
('Vegetal', 'vegetal@vegetal.com', 'vegetal', 'Vegetal'),
('Mecanizacao', 'mecanizacao@mecanizacao.com', 'mecanizacao', 'Mecanizacao'),
('Professor A', 'professora@professora.com', 'professora', 'Professor'),
('Professor B', 'professorb@professorb.com', 'professorb', 'Professor');

INSERT INTO `solicitacao` (`id_solicitante`, `id_professor`, `dia_solicitacao`, `dia_saida`, `hora_saida`, `hora_retorno`, `turma`, `num_alunos`, `fl_vegetal`, `fl_animal`, `fl_mecanizacao`, `fl_tecnico`, `fl_clima`, `material`) VALUES
(2, 7, now(), '2013-08-04', '13:00', '17:30', '2º Agropecuária B', 35, false, true, false, true, true, '5 foices'),
(1, 8, now(), '2013-08-09', '09:00', '16:00', '3º Agropecuária A', 39, false, false, true, false, false, '3 facões'),
(1, 7, now(), '2013-08-10', '08:00', '12:00', '1º Agropecuária A', 31, true, false, false, true, true, '10 enxadas'),
(2, 7, now(), '2013-08-14', '08:00', '12:00', '1º Agropecuária A', 31, true, false, false, true, true, '8 enxadas e 6 foices');