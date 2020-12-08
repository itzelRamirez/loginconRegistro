create database loginRegistro;
use loginRegistro;

create table t_usuarios (id_usuario int auto_increment,
						 nombre varchar(255),
						 ap_paterno varchar(255),
						 ap_materno varchar(255),
						 email varchar(255),
						 usuario varchar(255),
						 password varchar(255),
						 primary key(id_usuario)
						 );
					
create table t_crud (id_gasto int auto_increment,
					 con_gasto varchar(255),
					 cant_gasto int(20),
					 fecha date,
					 primary key(id_gasto)
					);