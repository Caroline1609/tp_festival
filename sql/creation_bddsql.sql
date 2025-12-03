DROP DATABASE IF EXISTS foire68;
CREATE DATABASE IF NOT EXISTS foire68;
USE foire68;

CREATE TABLE IF NOT EXISTS candidats (
    id_user INT UNSIGNED NOT NULL AUTO_INCREMENT,
    lastname_user VARCHAR(50) NOT NULL,
    firstname_user VARCHAR(50) NOT NULL,
    mail_user VARCHAR(150) NOT NULL,
    pass_user VARCHAR(500) NOT NULL,
    departement_user INT UNSIGNED NOT NULL,
    age_user TINYINT UNSIGNED NOT NULL,
    PRIMARY KEY (id_user)
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS departements (
    id_dep INT UNSIGNED NOT NULL PRIMARY KEY,
    Name VARCHAR(50) NOT NULL,
    dep_actif INT UNSIGNED NOT NULL,
    dep_taux DECIMAL(5,2) NOT NULL
) ENGINE=InnoDB;

ALTER TABLE candidats
ADD CONSTRAINT fk_departement
FOREIGN KEY (departement_user) REFERENCES departements(id_dep);



/*ajout d'une contrainte de type check pour obliger à avoir des utilisateurs majeurs*/
ALTER TABLE candidats ADD CONSTRAINT ck_age CHECK (age_user >= 18); 

/*ajout d'une contrainte de type unique*/
ALTER TABLE candidats ADD CONSTRAINT uk_verifmail UNIQUE(mail_user);  

/* oblige à mettre 2 caractères + 1 @  + 2 caractères après le @ */ 
ALTER TABLE candidats ADD CONSTRAINT ck_formatmail CHECK (mail_user LIKE '%__@__%');   

/* ajout de la clé étrangère*/
ALTER TABLE candidats ADD CONSTRAINT fk_dept_user FOREIGN KEY (departement_user) REFERENCES departements(id_dep); 