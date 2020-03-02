CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `nome` varchar(60) DEFAULT '',
  `tipodeevento` varchar(40) DEFAULT '',
  `nomedoevento` varchar(40) DEFAULT '',
  `datadoevento` date DEFAULT NULL,
  `local` varchar(60) DEFAULT '',
  `horas` varchar(5) DEFAULT '',
  `telefone1` varchar(20) DEFAULT '',
  `telefone2` varchar(20) DEFAULT '',
  `telefone3` varchar(20) DEFAULT '',
  `email` varchar(40) DEFAULT '',
  `facebook` varchar(40) DEFAULT '',
  `outros` varchar(40) DEFAULT '',
  `classificacao` varchar(40) DEFAULT '',
  `entrada` varchar(40) DEFAULT '',
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;


CREATE TABLE IF NOT EXISTS `notas` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL DEFAULT '0',
  `data` date DEFAULT NULL,
  `conteudo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Extraindo dados da tabela `nota
--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL DEFAULT '',
  `login` varchar(40) NOT NULL DEFAULT '',
  `senha` varchar(40) NOT NULL DEFAULT '',
  `email` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `nome`, `login`, `senha`, `email`) VALUES
(1, 'administrador', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com');
