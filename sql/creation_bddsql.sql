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


ALTER TABLE candidats ADD archive_user TINYINT NOT NULL;



/*ajout d'une contrainte de type check pour obliger à avoir des utilisateurs majeurs*/
ALTER TABLE candidats ADD CONSTRAINT ck_age CHECK (age_user >= 18); 

/*ajout d'une contrainte de type unique*/
ALTER TABLE candidats ADD CONSTRAINT uk_verifmail UNIQUE(mail_user);  

/* oblige à mettre 2 caractères + 1 @  + 2 caractères après le @ */ 
ALTER TABLE candidats ADD CONSTRAINT ck_formatmail CHECK (mail_user LIKE '%__@__%');   

/* ajout de la clé étrangère*/
ALTER TABLE candidats ADD CONSTRAINT fk_dept_user FOREIGN KEY (departement_user) REFERENCES departements(id_dep);

INSERT INTO candidats (lastname_user, firstname_user, mail_user, pass_user, departement_user, age_user, archive_user) VALUES
('Martin', 'Gabriel', 'gabriel.martin@email.fr', 'Gabriel2024!', 75, 24, 0),
('Bernard', 'Léa', 'lea.bernard@test.com', 'Chocolat123', 69, 31, 0),
('Thomas', 'Lucas', 'lucas.thomas@provider.net', 'Lucas1980', 33, 45, 0),
('Petit', 'Emma', 'emma.petit@email.fr', 'EmmaPetit!', 13, 19, 0),
('Robert', 'Louis', 'louis.robert@webmail.org', 'Azerty123', 59, 52, 1),
('Richard', 'Jade', 'jade.richard@email.fr', 'Jade_2025', 44, 28, 0),
('Durand', 'Hugo', 'hugo.durand@test.com', 'HugoBoss99', 31, 22, 0),
('Dubois', 'Chloé', 'chloe.dubois@provider.net', 'Soleil!123', 06, 35, 0),
('Moreau', 'Arthur', 'arthur.moreau@email.fr', 'ArthurM92', 92, 41, 0),
('Laurent', 'Manon', 'manon.laurent@webmail.org', 'ManonLola', 17, 26, 0),
('Simon', 'Jules', 'jules.simon@test.com', 'JulesVerne', 29, 33, 0),
('Michel', 'Zoé', 'zoe.michel@email.fr', 'Zoe_Michel', 67, 29, 0),
('Lefebvre', 'Raphaël', 'raphael.lefebvre@provider.net', 'Raphael54!', 54, 58, 1),
('Leroy', 'Alice', 'alice.leroy@email.fr', 'Wonderland', 76, 21, 0),
('Roux', 'Nathan', 'nathan.roux@test.com', 'Nathan1234', 83, 37, 0),
('David', 'Lina', 'lina.david@webmail.org', 'LinaDavid95', 95, 25, 0),
('Bertrand', 'Paul', 'paul.bertrand@email.fr', 'Paulo_21', 21, 49, 0),
('Morel', 'Sarah', 'sarah.morel@provider.net', 'SarahM35!', 35, 30, 0),
('Fournier', 'Tom', 'tom.fournier@test.com', 'TomTomGO', 49, 23, 0),
('Girard', 'Camille', 'camille.girard@email.fr', 'Camille62', 62, 55, 1),
('Bonnet', 'Théo', 'theo.bonnet@webmail.org', 'TheoBonnet91', 91, 27, 0),
('Dupont', 'Louise', 'louise.dupont@email.fr', 'Loulou78!', 78, 32, 0),
('Lambert', 'Adam', 'adam.lambert@test.com', 'Adam_Lambert', 14, 20, 0),
('Fontaine', 'Mila', 'mila.fontaine@provider.net', 'MilaF85', 85, 44, 0),
('Rousseau', 'Nolan', 'nolan.rousseau@email.fr', 'NolanR50', 50, 36, 0),
('Vincent', 'Eva', 'eva.vincent@webmail.org', 'EvaVincent01', 01, 24, 0),
('Muller', 'Enzo', 'enzo.muller@test.com', 'Ferrari68', 68, 29, 0),
('Lefevre', 'Anna', 'anna.lefevre@email.fr', 'Anna_Paris', 75, 18, 0),
('Faure', 'Mathis', 'mathis.faure@provider.net', 'Mathis19!', 19, 42, 0),
('Andre', 'Elena', 'elena.andre@email.fr', 'Elena38Isere', 38, 31, 0),
('Mercier', 'Axel', 'axel.mercier@test.com', 'AxelM42!', 42, 53, 1),
('Blanc', 'Inès', 'ines.blanc@webmail.org', 'InesB08', 08, 26, 0),
('Guerin', 'Ethan', 'ethan.guerin@email.fr', 'EthanG93', 93, 22, 0),
('Boyer', 'Louna', 'louna.boyer@provider.net', 'LounaB24', 24, 39, 0),
('Garnier', 'Sacha', 'sacha.garnier@test.com', 'Sacha84!', 84, 34, 0),
('Chevalier', 'Juliette', 'juliette.chevalier@email.fr', 'Juju_60', 60, 47, 0),
('Francois', 'Maël', 'mael.francois@webmail.org', 'MaelF72', 72, 19, 0),
('Legrand', 'Romane', 'romane.legrand@email.fr', 'Romane28!', 28, 28, 0),
('Gauthier', 'Liam', 'liam.gauthier@test.com', 'LiamG11', 11, 33, 0),
('Garcia', 'Jeanne', 'jeanne.garcia@provider.net', 'Jeanne66!', 66, 61, 1),
('Perrin', 'Noah', 'noah.perrin@email.fr', 'NoahP56', 56, 25, 0),
('Robin', 'Lola', 'lola.robin@webmail.org', 'LolaR89', 89, 21, 0),
('Clement', 'Tiago', 'tiago.clement@test.com', 'Tiago03!', 03, 40, 0),
('Morin', 'Agathe', 'agathe.morin@email.fr', 'AgatheM37', 37, 30, 0),
('Nicolas', 'Antoine', 'antoine.nicolas@provider.net', 'Antoine45', 45, 56, 0),
('Henry', 'Julia', 'julia.henry@email.fr', 'JuliaH94!', 94, 23, 0),
('Roussel', 'Valentin', 'valentin.roussel@test.com', 'Valentin80', 80, 27, 0),
('Mathieu', 'Clara', 'clara.mathieu@webmail.org', 'ClaraM51', 51, 35, 0),
('Gautier', 'Gabin', 'gabin.gautier@email.fr', 'Gabin22!', 22, 18, 0),
('Masson', 'Margaux', 'margaux.masson@provider.net', 'Margaux75', 75, 46, 0);