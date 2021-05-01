--Create database covid19_url;
--Create role covid19_url login password '123456';
--alter database covid19_url owner to covid19_url;

--CREATE TABLE Pays 
--(
  --  id_pays serial PRIMARY KEY,
   -- nom_pays VARCHAR(25) NOT NULL,
    --positifs BIGINT NOT NULL,
    --gueris BIGINT NOT NULL,
    --deces BIGINT NOT NULL,
--);
------new------
--ALTER SEQUENCE Pays_id_pays_seq RESTART WITH 400 INCREMENT BY 1;

--------------------------------

CREATE Database covid19url;
Use covid19url; 

create table pays(
    id_pays int AUTO_INCREMENT,
    nom_pays varchar(50) NOT NULL,
    primary key(id_pays)
);
ALTER TABLE pays auto_increment=400;

INSERT INTO pays(nom_pays) VALUES('angleterre');
INSERT INTO pays(nom_pays) VALUES('belgique');
INSERT INTO pays(nom_pays) VALUES('canada');
INSERT INTO pays(nom_pays) VALUES('dannemark');
INSERT INTO pays(nom_pays) VALUES('etats unis');
INSERT INTO pays(nom_pays) VALUES('france');
INSERT INTO pays(nom_pays) VALUES('madagascar');

create table provinces(
    id_province int AUTO_INCREMENT,
    id_pays int,
    nom_province varchar(50) NOT NULL,
    primary key(id_province),
    foreign key(id_pays) references pays(id_pays)
);
ALTER TABLE provinces auto_increment=2000;

INSERT INTO provinces(id_pays,nom_province) VALUES(406,'antananarivo');
INSERT INTO provinces(id_pays,nom_province) VALUES(406,'antsiranana');
INSERT INTO provinces(id_pays,nom_province) VALUES(406,'fianarantsoa');
INSERT INTO provinces(id_pays,nom_province) VALUES(406,'mahajanga');
INSERT INTO provinces(id_pays,nom_province) VALUES(406,'toamasina');
INSERT INTO provinces(id_pays,nom_province) VALUES(406,'toliara');

create table evolution(
    id_pays int NOT NULL,
    id_province int,
    positifs BIGINT NOT NULL,
    gueris BIGINT NOT NULL,
    deces BIGINT NOT NULL,
    date_evolution timestamp NOT NULL,
    foreign key(id_pays) references pays(id_pays)
);

INSERT INTO evolution VALUES(406,2000,606,69,42,'2021-01-01 00:00:00');
INSERT INTO evolution VALUES(406,2001,50,6,2,'2021-01-01 00:00:00');
INSERT INTO evolution VALUES(406,2002,160,40,10,'2021-02-01 00:00:00');
INSERT INTO evolution VALUES(406,2003,442,190,30,'2021-02-01 00:00:00');
INSERT INTO evolution VALUES(406,2005,590,50,41,'2021-03-01 00:00:00');
INSERT INTO evolution VALUES(406,2006,45,19,6,'2021-03-01 00:00:00');
--AUTRES PAYS
INSERT INTO evolution VALUES(400,null,12269,5569,540,'2021-01-01 00:00:00');
INSERT INTO evolution VALUES(401,null,50123,1200,696,'2021-01-01 00:00:00');
INSERT INTO evolution VALUES(402,null,97852,9440,1001,'2021-02-01 00:00:00');
INSERT INTO evolution VALUES(403,null,56442,17190,3006,'2021-02-01 00:00:00');
INSERT INTO evolution VALUES(404,null,88590,5002,410,'2021-03-01 00:00:00');
INSERT INTO evolution VALUES(405,null,40150,1997,667,'2021-03-01 00:00:00');

create table actualites(
    id_actu bigint NOT NULL AUTO_INCREMENT,
    type_actu VARCHAR(30),
    titre_actu varchar(255),
    paragraphe text,
    primary key(id_actu)
);
ALTER TABLE actualites auto_increment=300000;

CREATE OR REPLACE View evolutions_pays as
SELECT evolution.id_pays,pays.nom_pays,sum(evolution.positifs) as positifs,sum(evolution.gueris) as gueris
,sum(evolution.deces) as deces FROM Evolution INNER JOIN pays ON evolution.id_pays = pays.id_pays GROUP BY
evolution.id_pays;

CREATE OR REPLACE View evolutions_provinces as
SELECT evolution.id_pays,pays.nom_pays,evolution.id_province,provinces.nom_province,sum(evolution.positifs) 
as positifs,sum(evolution.gueris) as gueris,sum(evolution.deces) as deces FROM Evolution INNER JOIN 
provinces ON evolution.id_province = provinces.id_province INNER JOIN pays ON 
evolution.id_pays = pays.id_pays GROUP BY evolution.id_province
