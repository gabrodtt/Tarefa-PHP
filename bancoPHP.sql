create database Tarefa;
use Tarefa;

create table users
(
	cdUsuario int primary key,
    nmUsuario varchar(100),
    dsSenha varchar (100)
);

insert into users values (1, 'Gabriel R', '12e35');