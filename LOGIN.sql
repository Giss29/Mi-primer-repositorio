create database login;
use login;

create table registrarse(
cedula_usuario int primary key,
nombre_usuario varchar (100) not null,
apellido_usuario varchar (100) not null,
correo_usuario varchar (100) not null,
telefono_usuario int not null,
contraseña_usuario varchar (100) not null
);