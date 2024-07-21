create database Personas;
use Personas;
create table persona (
id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
nombre VARCHAR(30) NOT NULL,
apellido VARCHAR(30) NOT NULL,
telefono INT(9),
created_at datetime DEFAULT NULL,
updated_at datetime DEFAULT NULL,
deleted_at datetime DEFAULT NULL
);

select * from persona;

