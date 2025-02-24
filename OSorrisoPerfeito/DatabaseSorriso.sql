create database Crud;

use Crud;

create table consultas( -- Consultas dos Clientes Disponíveis
id int auto_increment not null,
nome varchar(50),
email varchar(50),
data_consulta date,
horario time,
doutor Varchar(50)
);

create table registros( -- Cadastros e Senhas dos Usuários Clientes/Adm
id int auto_increment not null, 
nome varchar(50),
email varchar(50),
senha varchar(50)
);

insert into registros
values
(null, "Admin", "Admin@gmail.com", 1234); -- Adição do Usuário Administrador

select * from consultas;
select * from registros;