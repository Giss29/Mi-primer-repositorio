create database agendamiento_citas;
use agendamiento_citas;

create table paciente(
id_paciente int primary key,
nombre_paciente varchar (100) not null,
apellido_paciente varchar (100) not null,
celular_paciente bigint not null,
email_paciente varchar (100) not null,
tipo_sangre_paciente varchar (100) not null,
genero_paciente varchar (100) not null
);
 
 create table medico(
 id_medico int primary key,
 nombre_medico varchar (100) not null,
 apellido_medico varchar (100) not null,
 genero_medico varchar (100) not null,
 celular_medico bigint not null,
 email_medico varchar (100) not null
 );
 
 create table especialidades(
 id_especialidad int primary key,
 nombre_especialidad varchar (100) not null
 );
 
 create table categoria_cita(
 id_categoria int primary key,
 nombre_categoria varchar (100) not null,
 descripcion_categoria varchar (100)
 );
 
 create table medico_especialidad(
 iden_medic int not null,
 foreign key(iden_medic) references medico(id_medico),
 iden_especiali int not null, 
 foreign key(iden_especiali) references especialidades(id_especialidad)
 );
 
 create table citas(
 id_citas int primary key,
 fecha_cita date not null,
 hora_cita time not null,
 iden_categ int not null,
 foreign key (iden_categ) references categoria_cita(id_categoria),
 iden_pacien int not null,
 foreign key (iden_pacien) references paciente(id_paciente),
 iden_medic int not null,
 foreign key (iden_medic) references medico(id_medico)
 );