create database LENY;

use LENY;

create table tipoUsuario(
id_us integer not null primary key auto_increment,
descripcion varchar(100) not null
);

create table usuario(
id integer not null primary key auto_increment,
nombre varchar(150) not null,
apellido varchar(150) not null,
usuario  varchar(25) not null,
correo varchar(150) not null,
contraseña varchar(25) not null,
id_us integer not null,
foreign key (id_us) references tipoUsuario (id_us)
on delete cascade
on update cascade
);

create table proyecto(
nom_P varchar(150) not null primary key,
fecha_Inicio varchar(30) not null,
fecha_Final varchar(25) not null,
tema varchar(150) not null,
estado varchar(25) not null,
encargado integer not null,
participantes integer not null,
foreign key (encargado) references usuario (id),
foreign key (participantes) references usuario (id)
);

create table supervisor(
id_S integer not null primary key,
nombre varchar(150) not null,
apellido varchar(150) not null,
nom_p varchar (150) not null,
id_usuario integer not null,
foreign key (id_usuario) references usuario (id),
foreign key (nom_p) references proyecto (nom_P)
);

create table tarea(
nom_T varchar(150) not null primary key,
fecha_Inicio varchar(30) not null,
fecha_Final varchar(25) not null,
prioridad varchar(25) not null,
estado varchar(25) not null,
participantes integer not null,
nom_proyecto varchar(150) not null,
foreign key (participantes) references usuario (id),
foreign key (nom_proyecto) references proyecto (nom_P)
);


insert into tipousuario values ('1','Administrador'),
							   ('2','Usuario');
