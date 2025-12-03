/*ajout d'une contrainte de type check pour obliger à avoir des utilisateurs majeurs*/
ALTER TABLE candidats ADD CONSTRAINT ck_age CHECK (age_user >= 18); 

/*ajout d'une contrainte de type unique*/
ALTER TABLE candidats ADD CONSTRAINT uk_verifmail UNIQUE(mail_user);  

/* oblige à mettre 2 caractères + 1 @  + 2 caractères après le @ */ 
ALTER TABLE candidats ADD CONSTRAINT ck_formatmail CHECK (mail_user LIKE '%__@__%');   

/* ajout de la clé étrangère*/
ALTER TABLE candidats ADD CONSTRAINT fk_dept_user FOREIGN KEY (departement_user) REFERENCES departements(id_dep); 