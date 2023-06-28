CREATE TABLE pais(
    idPais INT PRIMARY KEY AUTO_INCREMENT,
    nombrePais VARCHAR(50) NOT NULL
);
CREATE TABLE departamento(
    idDep INT PRIMARY KEY AUTO_INCREMENT,
    nombreDep VARCHAR(50) NOT NULL,
    fk_idPais INT,
    FOREIGN KEY (fk_idPais) REFERENCES pais(idPais) 
);

CREATE TABLE region(
    idReg INT PRIMARY KEY AUTO_INCREMENT,
    nombreReg VARCHAR(60) NOT NULL,
    fk_idDep INT NOT NULL,
    FOREIGN KEY (fk_idDep) REFERENCES departamento(idDep) 
);

CREATE TABLE campers(
    idCampers VARCHAR(20) PRIMARY KEY ,
    nombreCamper VARCHAR(50) NOT NULL,
    apellidoCamper VARCHAR(50) NOT NULL,
    fechaNac DATE NOT NULL,
    fk_idReg INT,
    FOREIGN KEY (fk_idReg) REFERENCES region(idReg) 
);

# ingreso de datos para pais
INSERT INTO pais(nombrePais) VALUES ("Canada");
INSERT INTO pais(nombrePais) VALUES ("colombia");
INSERT INTO pais(nombrePais) VALUES ("Brasil");
INSERT INTO pais(nombrePais) VALUES ("Argentina");
INSERT INTO pais(nombrePais) VALUES ("España");

# ingreso de datos para departamento
INSERT INTO departamento(nombreDep,fk_idPais) VALUES ("Canda_1",2);
INSERT INTO departamento(nombreDep,fk_idPais) VALUES ("Samtander",1);
INSERT INTO departamento(nombreDep,fk_idPais) VALUES ("Brasil",3);
INSERT INTO departamento(nombreDep,fk_idPais) VALUES ("Argentina_1",4);
INSERT INTO departamento(nombreDep,fk_idPais) VALUES ("Santa Cruz de tenerife",5);

# ingreso de datos para region
INSERT INTO region(nombreReg,fk_idDep) VALUES ("Dato_1",1);
INSERT INTO region(nombreReg,fk_idDep) VALUES ("Dato_2",2);
INSERT INTO region(nombreReg,fk_idDep) VALUES ("Dato_3",3);
INSERT INTO region(nombreReg,fk_idDep) VALUES ("Dato_4",4);
INSERT INTO region(nombreReg,fk_idDep) VALUES ("Dato_5",5);

# ingreso de datos para campers
INSERT INTO campers(idCampers,nombreCamper,apellidoCamper,fechaNac,fk_idReg) VALUES ("1231","jhon","hernandez","2003-11-24",1);
INSERT INTO campers(idCampers,nombreCamper,apellidoCamper,fechaNac,fk_idReg) VALUES ("12311","david","hernandez","2003-11-24",2);
INSERT INTO campers(idCampers,nombreCamper,apellidoCamper,fechaNac,fk_idReg) VALUES ("12312","sofia","hernandez","2003-11-24",3);
INSERT INTO campers(idCampers,nombreCamper,apellidoCamper,fechaNac,fk_idReg) VALUES ("12313","juan","hernandez","2003-11-24",4);
INSERT INTO campers(idCampers,nombreCamper,apellidoCamper,fechaNac,fk_idReg) VALUES ("12314","carlos","hernandez","2003-11-24",5);




select from 
