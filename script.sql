CREATE DATABASE db_updown;
USE db_updown;

CREATE TABLE tb_user(
    cd_user INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nm_user VARCHAR(60),
    mail_user VARCHAR(120),
    pass_user CHAR(20),
    dt_nasc_user DATE,
    stts_user VARCHAR(100),
    adm_user BOOLEAN  
);

CREATE TABLE arquivo(
    cd INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nm_arquivo VARCHAR(100),
    tt_arquivo VARCHAR(120),
    dc_arquivo LONGTEXT
);

INSERT INTO `tb_user` (`cd_user`, `nm_user`, `mail_user`, `pass_user`, `dt_nasc_user`, `stts_user`, `adm_user`) VALUES ('13', 'Gabriel Bernardo Gamon', 'devgamon@gmail.com', '1304', '2004-04-13', 'ativo', '1'), ('14', 'Jorge Ramon Ruiz Gamon', 'jorge@gmail.com', '0712', '1974-12-07', 'ativado', '0');