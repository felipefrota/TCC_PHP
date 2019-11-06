drop database tcc;


create database tcc;
use tcc;

create table cadastro_usuario(
usuario_id int(4)  not null,
usuario varchar(200) not null,
senha varchar(32) not null,
nome varchar(20) not null,
dataNascimento date not null
);

select*from cadastro_usuario; 
insert into cadastro_usuario (usuario, senha) values ('teste', 'teste'); 
/*insert into cadastro_usuario (usuario, senha) values ('teste', md5('teste')); */