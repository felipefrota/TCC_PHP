drop database tcc;


create database tcc;
use tcc;

create table cadastro_usuario(
usuario_id int(8) NOT NULL,
usuario varchar(200) not null,
senha varchar(32) not null,
email varchar(50) not null,
dataNascimento date not null,
sexo varchar(5) not null,
estadoCivil varchar(5) not null,
telefoneCelular varchar(11) not null,
telefoneFixo varchar(11) default null,

cep varchar(10) not null,
estado varchar(20) not null,
cidade varchar(3) not null,
bairro varchar(30) not null,
rua_avenida varchar(20) default null,
numero varchar(5) default null,
adicional varchar(60) default null,

motivoInternacao varchar(10) not null,
motiv_Adicional varchar(50) default null,
remed varchar(300) default null,
alergRemedio varchar(500) default null,
sintom varchar(1000) default null,
doenc_Cronic varchar(1000) default null,

instit varchar(50) not null,
levar_Inst varchar(1000) default null,
obs_Inst varchar(1000) default null,
obs_Intolerancia varchar(1000) default null
);

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

















/*insert into cadastro_usuario (usuario, senha) values ('teste', md5('teste')); */