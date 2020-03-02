# Agenda Eventos

Este projeto tem como fim cadastrar clientes e manter histórico de conversas com eles até a finalização do trabalho. Basicamente é um sistema de cadastro de eventos.

## Tecnologias
* Html
* Css
* Javascript
* Php
* Mysql

## Requisitos

Tabelas de banco de dados, tanto para usuario como para cliente e outros.
Tabela User. Corresponde a tabela de usuários do sistema.
```
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL DEFAULT '',
  `login` varchar(40) NOT NULL DEFAULT '',
  `senha` varchar(40) NOT NULL DEFAULT '',
  `email` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;
```
Inserindo o primeiro usuario manualmente. Login: admin. Senha: admin
```
INSERT INTO `user` (`id`, `nome`, `login`, `senha`, `email`) VALUES
(1, 'administrador', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com');
```
Tabela de clientes do sistema
```
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
```
Cadastro de notas, mensagens de status do evento entre o usuario e o cliente.
```
CREATE TABLE IF NOT EXISTS `notas` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL DEFAULT '0',
  `data` date DEFAULT NULL,
  `conteudo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
```

## Interface
### Tela de Login
![](https://github.com/jeanoliveira92/agenda-eventos/blob/master/screenshot1.jpg?raw=true)
### Tela de Seleção de Função
![](https://github.com/jeanoliveira92/agenda-eventos/blob/master/screenshot2.jpg?raw=true)
### Tela de cadastrar ou editar um evento
![](https://github.com/jeanoliveira92/agenda-eventos/blob/master/screenshot3.jpg?raw=true)


## Licença
Este projeto está licenciado sob a licença MIT - consulte o arquivo [LICENSE.md] (LICENSE.md) para obter detalhes
