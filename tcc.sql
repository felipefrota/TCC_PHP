drop database tcc;


create database tcc;
use tcc;

DROP TABLE IF EXISTS `cadastro_usuario`;
CREATE TABLE cadastro_usuario(
  `usuarioID` int(8) NOT NULL AUTO_INCREMENT,
`usuario` varchar(200) DEFAULT NULL,
`senha` varchar(32) DEFAULT NULL,
`email` varchar(50) DEFAULT NULL,
`cpf` varchar(11) DEFAULT NULL,
`dataNascimento` varchar(12) DEFAULT NULL,
`sexo` varchar(5) DEFAULT NULL,
`estadoCivil` varchar(5) DEFAULT NULL,
`telefoneCelular` varchar(11) DEFAULT NULL,
`telefoneFixo` varchar(11) DEFAULT NULL,

`cep` varchar(10) DEFAULT NULL,
`estado` varchar(20) DEFAULT NULL,
`cidade` varchar(3) DEFAULT NULL,
`bairro` varchar(30) DEFAULT NULL,
`rua_avenida` varchar(20) DEFAULT NULL,
`numero` varchar(5) DEFAULT NULL,
`adicional` varchar(60) DEFAULT NULL,

`motivoInternacao` varchar(10) DEFAULT NULL,
`motiv_Adicional` varchar(50) DEFAULT NULL,
`remed` varchar(300) DEFAULT NULL,
`alergRemedio` varchar(500) DEFAULT NULL,
`sintom` varchar(1000) DEFAULT NULL,
`doenc_Cronic` varchar(1000) DEFAULT NULL,

`instit` varchar(50) DEFAULT NULL,
`levar_Inst` varchar(1000) DEFAULT NULL,
`obs_Inst` varchar(1000) DEFAULT NULL,
`obs_Intolerancia` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`usuarioID`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `cadastro_instituicao`;
create table cadastro_instituicao(
`instituicaoID` int(8) NOT NULL AUTO_INCREMENT,
`razao_Social` varchar(30) DEFAULT NULL,
`nome_Fantasia` varchar(100) DEFAULT NULL,
`cnpj` varchar(30) DEFAULT NULL,
`email` varchar(50) DEFAULT NULL,
`senha` varchar(20) DEFAULT NULL,
`telefoneFixo1` varchar(11) DEFAULT NULL,
`telefoneFixo2` varchar(11) DEFAULT NULL,
`telefoneCelular` varchar(11) DEFAULT NULL,
`wpp` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`instituicaoID`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;




select*from cadastro_usuario; 
insert into cadastro_usuario (usuario, senha) values ('teste', 'teste'); 
/*insert into cadastro_usuario (usuario, senha) values ('teste', md5('teste')); */

