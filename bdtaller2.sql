CREATE DATABASE bdtaller2;

CREATE TABLE usuario (
  id int(11)NOT NULL AUTO_INCREMENT,
  nombre varchar(120) NOT NULL,
  usuario varchar(30) NOT NULL,
  clave varchar(30) NOT NULL,
  rol varchar(20) NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT ck_usrol CHECK (rol='admin' OR rol='no-admin') 
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO usuario VALUES ('1', 'juliana', 'jmora216', 'jmora216', 'admin');
INSERT INTO usuario VALUES ('2', 'juan', 'juan216', 'juan216','no-admin');

CREATE TABLE producto (
  codigo int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(120) DEFAULT NULL,
  precio decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (codigo)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO producto VALUES (1, 'aceite', 1800.78);
INSERT INTO producto VALUES (2, 'pasta', 3570.52);
INSERT INTO producto VALUES (3, 'arroz', 3570.52);
INSERT INTO producto VALUES (4, 'leche', 3570.52);
INSERT INTO producto VALUES (5, 'huevos', 3570.52);
INSERT INTO producto VALUES (6, 'frijoles', 3570.52);
INSERT INTO producto VALUES (7, 'lentejas', 1800.78);
INSERT INTO producto VALUES (8, 'pan', 3570.52);
INSERT INTO producto VALUES (9, 'azucar', 3570.52);
INSERT INTO producto VALUES (10, 'sal', 3570.52);
INSERT INTO producto VALUES (11, 'café', 3570.52);
INSERT INTO producto VALUES (12, 'harina', 3570.52);
INSERT INTO producto VALUES (13, 'mermelada', 1800.78);
INSERT INTO producto VALUES (14, 'galletas', 3570.52);
INSERT INTO producto VALUES (15, 'atun', 3570.52);
INSERT INTO producto VALUES (16, 'maizena', 3570.52);
INSERT INTO producto VALUES (17, 'mantequilla', 3570.52);
INSERT INTO producto VALUES (18, 'queso', 3570.52);
INSERT INTO producto VALUES (19, 'yogurt', 3570.52);
INSERT INTO producto VALUES (20, 'salchichas', 3570.52);
     

CREATE TABLE carrito (
  codigoProducto int(11) NOT NULL AUTO_INCREMENT,
  nombreProducto varchar(120) NOT NULL,
  precioProducto decimal(6,2) NOT NULL,
  id_usuario int(11) NOT NULL,
  PRIMARY KEY (codigoProducto)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

ALTER TABLE `carrito` ADD INDEX(`id_usuario`);
