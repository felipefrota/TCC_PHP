

drop database tcc;


create database tcc;
use tcc;



DROP TABLE IF EXISTS `tb_usuario`;
CREATE TABLE tb_usuario(
  `usuario_instituicaoID` int(8) NOT NULL AUTO_INCREMENT,
`nomeUsuario_nomeFantasia` varchar(200) DEFAULT NULL,
`sobrenome` varchar(30) DEFAULT NULL,
`razao_Social` varchar(30) DEFAULT NULL,
`senha` varchar(32) DEFAULT NULL,
`email` varchar(50) DEFAULT NULL,
`cpf_cnpj` varchar(15) DEFAULT NULL,
`dataNascimento` date DEFAULT NULL,
`sexo` varchar(12) DEFAULT NULL,
`estadoCivil` varchar(12) DEFAULT NULL,
`telefoneFixo` varchar(16) DEFAULT NULL,
`telefoneFixo2` varchar(16) DEFAULT NULL,
`telefoneCelular` varchar(17) DEFAULT NULL,
`wpp` varchar(17) DEFAULT NULL,
`tipo` int(1) not null,

`cep` varchar(10) DEFAULT NULL,
`estado` varchar(20) DEFAULT NULL,
`cidade` varchar(3) DEFAULT NULL,
`bairro` varchar(30) DEFAULT NULL,
`rua_avenida` varchar(20) DEFAULT NULL,
`numero` varchar(5) DEFAULT NULL,
`adicional` varchar(60) DEFAULT NULL,

`motivoInternacao` varchar(40) DEFAULT NULL,
`motiv_Adicional` varchar(50) DEFAULT NULL,
`remed` varchar(300) DEFAULT NULL,
`alergRemedio` varchar(500) DEFAULT NULL,
`sintom` varchar(1000) DEFAULT NULL,
`doenc_Cronic` varchar(1000) DEFAULT NULL,

`instit` varchar(50) DEFAULT NULL,
`levar_Inst` varchar(1000) DEFAULT NULL,
`obs_Inst` varchar(1000) DEFAULT NULL,
`obs_Intolerancia` varchar(1000) DEFAULT NULL,

`brev_apresent` varchar(5000) DEFAULT NULL,

`upload_file` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`usuario_instituicaoID`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;





DROP TABLE IF EXISTS `tb_prontuario_sociodemograficos`;
CREATE TABLE tb_prontuario_sociodemograficos(
`id_prontuario_sociodemograficos` int(8) PRIMARY KEY AUTO_INCREMENT,
`idade` varchar(10) DEFAULT NULL,
`estado_civil` varchar(5) DEFAULT NULL,
`prole` varchar(5) DEFAULT NULL,
`escolaridade` varchar (5) DEFAULT NULL,
`profissao` varchar (5) DEFAULT NULL,
`renda` varchar (5) DEFAULT NULL,
`responsavel_sustento_familia` varchar (5) DEFAULT NULL,
`religiao` varchar (5) DEFAULT NULL,
`qnt_internacoes` varchar (5) DEFAULT NULL,
`id_usuario` integer,
 CONSTRAINT fk_usuPronutario FOREIGN KEY (`id_usuario`) REFERENCES tb_usuario (`usuario_instituicaoID`)
);


DROP TABLE IF EXISTS `tb_prontuario_historico_familiar`;
CREATE TABLE tb_prontuario_historico_familiar(
`id_prontuario_historico_familiar` int(8) PRIMARY KEY AUTO_INCREMENT,
`pai` varchar(3) DEFAULT NULL,
`mae` varchar(3) DEFAULT NULL,
`irmao` varchar(3) DEFAULT NULL,
`avo` varchar (5) DEFAULT NULL,
`filho` varchar (5) DEFAULT NULL,
`outros` varchar (5) DEFAULT NULL,
`id_usuario` integer,
 CONSTRAINT fk_histPronutario FOREIGN KEY (`id_usuario`) REFERENCES tb_usuario (`usuario_instituicaoID`)
 );
 
 DROP TABLE IF EXISTS `tb_prontuario_comorbidades_principais`;
CREATE TABLE tb_prontuario_comorbidades_principais(
`id_prontuario_comorbidades_principais` int(8) PRIMARY KEY AUTO_INCREMENT,
`hipertensao_arterial_sistemica` varchar(3) DEFAULT NULL,
`diabetes_mellitus` varchar(3) DEFAULT NULL,
`dislipidemia` varchar(3) DEFAULT NULL,
`cirrose_hepatica` varchar (5) DEFAULT NULL,
`doenca_pulmonar` varchar (5) DEFAULT NULL,
`asma` varchar (5) DEFAULT NULL,
`anemia` varchar (5) DEFAULT NULL,
`hiv` varchar(3) DEFAULT NULL,
`hepatite_bc` varchar(3) DEFAULT NULL,
`outras_sexualmente` varchar(3) DEFAULT NULL,
`outras` varchar(3) DEFAULT NULL,
`id_usuario` integer,
 CONSTRAINT fk_comorPronutario FOREIGN KEY (`id_usuario`) REFERENCES tb_usuario (`usuario_instituicaoID`)
 );
 
 
 DROP TABLE IF EXISTS `tb_prontuario_substancias_psicoativas`;
CREATE TABLE tb_prontuario_substancias_psicoativas(
`id_prontuario_substancias_psicoativas` int(8) PRIMARY KEY AUTO_INCREMENT,
`tabaco` varchar(3) DEFAULT NULL,
`alcool` varchar(3) DEFAULT NULL,
`cocaina` varchar(3) DEFAULT NULL,
`crack` varchar (5) DEFAULT NULL,
`maconha` varchar (5) DEFAULT NULL,
`inalantes` varchar (5) DEFAULT NULL,
`alucinogenos` varchar (5) DEFAULT NULL,
`anfetaminas` varchar(3) DEFAULT NULL,
`benzodiazepinicos` varchar(3) DEFAULT NULL,
`opioides` varchar(3) DEFAULT NULL,
`id_usuario` integer,
 CONSTRAINT fk_subsPronutario FOREIGN KEY (`id_usuario`) REFERENCES tb_usuario (`usuario_instituicaoID`)
 );
 
   DROP TABLE IF EXISTS `tb_prontuario_diagnostico_receituario`;
CREATE TABLE tb_prontuario_diagnostico_receituario(
`id_prontuario_diagnostico_receituario` int(8) PRIMARY KEY AUTO_INCREMENT,
`diagnostico` longtext DEFAULT NULL,
`receituario` longtext DEFAULT NULL,
`id_usuario` integer,
 CONSTRAINT fk_diagPronutario FOREIGN KEY (`id_usuario`) REFERENCES tb_usuario (`usuario_instituicaoID`)
 );
 
 
 
 

 