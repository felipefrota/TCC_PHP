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

create table instituicao(
razao_Social varchar(30) not null,
nome_Fantasia varchar(100) not null,
cnpj varchar(30) not null,
email varchar(50) default null,
senha varchar(20) not null,
tel1 varchar(11) default null,
tel2 varchar(11) default null,
cel1 varchar(11) default null,
wpp varchar(11) default null
);




select*from cadastro_usuario; 
insert into cadastro_usuario (usuario, senha) values ('teste', 'teste'); 
/*insert into cadastro_usuario (usuario, senha) values ('teste', md5('teste')); */

