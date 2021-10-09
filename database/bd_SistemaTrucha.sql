drop database if exists bd_SistemaTrucha;

create database bd_SistemaTrucha;

use bd_SistemaTrucha;

create table Usuario(
	id_usuario int primary key auto_increment,
    nombre_usuario varchar(50),
    email_usuario varchar(50),
    clave_usuario varchar(20)
);

create table Calendario(
	id_calendario int primary key auto_increment,
    fecha_calendario date,
    hora_calendario time,
    evento_calendario varchar(50),
    estado_calendario varchar(50),
    observacion_calendario varchar(60),
    id_usuario int,
    foreign key(id_usuario)references Usuario(id_usuario)
);

create table Estanque(
	id_estanque int primary key auto_increment,
    nombre_estanque varchar(60),
    tipo_estanque varchar(50),
    forma_estanque varchar(50),
    area_estanque float,
    volumen_agua_estanque float,
    estado_estanque varchar(60),
	id_usuario int,
    foreign key(id_usuario)references Usuario(id_usuario)
);

create table Siembra(
	id_siembra int primary key auto_increment,
    fecha_siembra date,
    estanque_siembra varchar(50),
    especie_siembra varchar(50),
    procedencia_siembra varchar(50),
    cantidad_siembra int,
    peso_siembra int,
    estado_siembra varchar(60),
    observacion_siembra varchar(50),
    id_estanque int ,
	foreign key(id_estanque)references Estanque(id_estanque)
);

create table Calidad_Agua(
	id_calidad int primary key auto_increment,
    fecha_calidad date,
    estanque_calidad varchar(40),
    temperatura_calidad float,
    oxigeno_calidad float,
    ph_calidad float,
    alcalinidad_calidad float,
    dureza_calidad float,
    observaciones_calidad varchar(50),
    id_estanque int,
    foreign key(id_estanque)references Estanque(id_estanque)
);

create table Cosecha(
	id_cosecha int primary key auto_increment,
    lote_cosecha date,
    cantidad_cosecha int,
    peso_cosecha int,
    estanque_cosecha varchar(60),
    especie_cosecha varchar(60),
    observacion_cosecha varchar(50)
);

create table Alimentacion(
	id_alimentacion int primary key auto_increment,
    lote_alimento varchar(40),
    fecha_alimento date,
    marca_alimento varchar(40),
    tipo_alimento varchar(60),
    cantidad_alimento int,
    estanque_alimentacion varchar(50),
    lote_siembra_alimentado varchar(60)
);

create table Muestreo(
	id_muestreo int primary key auto_increment,
    fecha_muestreo date,
    estanque_muestreo varchar(50),
    cantidad_siembra int,
    cantidad_mortalidad int,
    especie_muestreo varchar(50),
    peso_promedio float,
    talla_promedio float,
    biomasa float,
    racion_alimenticia float,
    etapa_produccion varchar(20),
	id_siembra int ,
    id_alimentacion int ,
    id_cosecha int,
    id_calidad int ,
    foreign key(id_siembra)references Siembra(id_siembra),
    foreign key(id_cosecha)references Cosecha(id_cosecha),
    foreign key(id_calidad)references Calidad_Agua(id_calidad),
	foreign key(id_alimentacion)references Alimentacion(id_alimentacion)
);


insert into usuario values(1 , 'juan-56' , 'juan56-12@gmail.com' , '123456');
insert into usuario values(2 , 'gomez-46' , 'gomez.salvatierra@gmail.com' , '123456');



