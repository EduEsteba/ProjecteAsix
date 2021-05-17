CREATE TABLE usuari (
    ID INT PRIMARY KEY,
    Nom VARCHAR (255),
    Cognom VARCHAR (255),
    Email VARCHAR (255),
    Contrasenya VARCHAR (255)
);

CREATE TABLE MYSQL (
    usuari_id_mysql VARCHAR (255),
    contrasenya VARCHAR (255),
    FOREIGN KEY (usuari_id_mysql) REFERENCES usuari(id)
);

CREATE TABLE FTP (
   usuari_id_ftp VARCHAR (255),
   contrasenya VARCHAR (255),
   FOREIGN KEY (usuari_id_ftp) REFERENCES usuari(id)
);