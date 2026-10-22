DROP DATABASE IF EXISTS gestecole;
CREATE DATABASE gestecole;
USE gestecole;

CREATE TABLE user
(
    login varchar(100), 
    password varchar(100),
	role varchar(100),
    nbrtentative integer,
    bloque integer
	
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO user VALUES ( 'admin', md5('admin'),'admin',0,0);
INSERT INTO user VALUES ( '1', md5('ens'),'ens',0,0);
INSERT INTO user VALUES ( '1',md5('ele'),'ele',0,0);
    -- ===================================================== 
    -- TABLE ANNEE 
    -- ===================================================== 
    CREATE TABLE annee ( 
        anneescol VARCHAR(12) NOT NULL, 
        PRIMARY KEY (anneescol) )
        ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        INSERT INTO annee VALUES ('2025 - 2026'); 
    -- ===================================================== 
    -- TABLE TRIMESTRE 
    -- ===================================================== 
    CREATE TABLE trimestre ( 
        numtrimestre VARCHAR(10) NOT NULL,
        libtrimestre VARCHAR(100), 
        debuttrim DATE, 
        fintrim DATE, 
        PRIMARY KEY (numtrimestre) ) 
        ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        INSERT INTO trimestre VALUES ('TRIM1', 'Trimestre 1', '2025-07-01', '2025-12-24'); 
        INSERT INTO trimestre VALUES ('TRIM2', 'Trimestre 2', '2026-01-03', '2026-04-30'); 
        INSERT INTO trimestre VALUES ('TRIM3', 'Trimestre 3', '2026-05-01', '2026-06-30');
     -- ===================================================== 
     -- TABLE CLASSE 
     -- ===================================================== 
     CREATE TABLE classe ( 
        idclasse VARCHAR(10) NOT NULL, 
        libclasse VARCHAR(100), 
        PRIMARY KEY (idclasse) ) 
        ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 
      
INSERT INTO classe VALUES ('6EME', 'Sixième');
INSERT INTO classe VALUES ('5EME', 'Cinquième');
INSERT INTO classe VALUES ('4EME', 'Quatrième');
INSERT INTO classe VALUES ('3EME', 'Troisième');
INSERT INTO classe VALUES ('2NDE', 'Seconde');
INSERT INTO classe VALUES ('1ERE', 'Première');
INSERT INTO classe VALUES ('TLE', 'Terminale');
     -- ===================================================== 
     -- TABLE ELEVE 
     -- ===================================================== 
     CREATE TABLE eleve ( 
        matricule INT NOT NULL, 
        numerodeclasse VARCHAR(10), 
        nom VARCHAR(100), 
        prenom VARCHAR(100), 
        naiss DATE, 
        sexe VARCHAR(50), 
        mail VARCHAR(100), 
        phone VARCHAR(100), 
        idclasse VARCHAR(10) NOT NULL, 
            PRIMARY KEY (matricule), 
                CONSTRAINT fk_eleve_classe 
                FOREIGN KEY (idclasse) 
                REFERENCES classe(idclasse) 
                ON UPDATE CASCADE ON DELETE CASCADE ) 
        ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 
       

INSERT INTO eleve VALUES (1, '1', 'RAKOTO', 'Jean', '2010-03-15', 'M', 'jean@gmail.com', '0340000001', '6EME');
INSERT INTO eleve VALUES (2, '2', 'RABE', 'Marie', '2010-07-20', 'F', 'marie@gmail.com', '0340000002', '6EME');

INSERT INTO eleve VALUES (3, '1', 'RASOA', 'Paul', '2009-02-10', 'F', 'paul@gmail.com', '0340000003', '5EME');
INSERT INTO eleve VALUES (4, '2', 'MARIE', 'Paule', '2009-02-10', 'F', 'paule@gmail.com', '0340000003', '5EME');

INSERT INTO eleve VALUES (5, '1', 'JOLY', 'Jumper', '2009-02-10', 'M', 'joly@gmail.com', '0340000003', '4EME');
INSERT INTO eleve VALUES (6, '2', 'TOM', 'Cat', '2009-02-10', 'M', 'tom@gmail.com', '0340000003', '4EME');
        -- ===================================================== 
        -- TABLE ENSEIGNANT 
        -- ===================================================== 
        CREATE TABLE enseignant ( 
            matrienseignant INT NOT NULL, 
            nomenseignant VARCHAR(100), 
            preenseignant VARCHAR(100), 
            naissenseignant DATE, 
            sexeenseignant VARCHAR(50), 
            mailenseignant VARCHAR(100), 
            phoneenseignant VARCHAR(100), 
            PRIMARY KEY (matrienseignant) 
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 
         

INSERT INTO enseignant VALUES (1, 'RAKOTO', 'Jean', '1985-04-10', 'M', 'jean.prof@gmail.com', '0341111111');

INSERT INTO enseignant VALUES (2, 'RABE', 'Marie', '1988-08-20', 'F', 'marie.prof@gmail.com', '0342222222');
        -- ===================================================== 
        -- TABLE MATIERE 
        -- ===================================================== 
        CREATE TABLE matiere ( 
            idmatiere VARCHAR(10) NOT NULL, 
            nommatiere VARCHAR(100), 
            PRIMARY KEY (idmatiere) 
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 
           
INSERT INTO matiere VALUES ('M1', 'Mathématiques');
INSERT INTO matiere VALUES ('M2', 'Français');
INSERT INTO matiere VALUES ('M3', 'Anglais');
INSERT INTO matiere VALUES ('M4', 'Histoire-Géographie');
INSERT INTO matiere VALUES ('M5', 'SVT');
        -- ===================================================== 
        -- TABLE NOTE 
        -- ===================================================== 
        CREATE TABLE note ( 
            numtrimestre VARCHAR(10) NOT NULL, 
            matricule INT NOT NULL, 
            idmatiere VARCHAR(10) NOT NULL, 
            noteds DECIMAL(10,2) DEFAULT 0, 
            notecahier DECIMAL(10,2) DEFAULT 0, 
            notecomportement DECIMAL(10,2) DEFAULT 0, 
            PRIMARY KEY (numtrimestre, matricule, idmatiere), 
            CONSTRAINT fk_note_trimestre 
            FOREIGN KEY (numtrimestre) 
            REFERENCES trimestre(numtrimestre) 
            ON UPDATE CASCADE ON DELETE CASCADE, 
            CONSTRAINT fk_note_eleve 
            FOREIGN KEY (matricule) 
            REFERENCES eleve(matricule) 
            ON UPDATE CASCADE ON DELETE CASCADE, 
            CONSTRAINT fk_note_matiere 
            FOREIGN KEY (idmatiere) 
            REFERENCES matiere(idmatiere) 
            ON UPDATE CASCADE ON DELETE CASCADE )
             ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 
        -- ===================================================== 
        -- TABLE CAHIERTEXTE 
        -- ===================================================== 
        CREATE TABLE cahiertexte ( 
            matrienseignant INT NOT NULL, 
            idclasse VARCHAR(10) NOT NULL, 
            idmatiere VARCHAR(10) NOT NULL, 
            datecours DATE, 
            heuredebut TIME, 
            heurefin TIME, 
            titre VARCHAR(255), 
            contenu TEXT, 
            travailafaire TEXT, 
            
            PRIMARY KEY (matrienseignant, idclasse, idmatiere,datecours), 
            CONSTRAINT fk_cahier_enseignant 
            FOREIGN KEY (matrienseignant) 
            REFERENCES enseignant(matrienseignant) 
            ON UPDATE CASCADE ON DELETE CASCADE, 
            CONSTRAINT fk_cahier_classe 
            FOREIGN KEY (idclasse) 
            REFERENCES classe(idclasse) 
            ON UPDATE CASCADE ON DELETE CASCADE, 
            CONSTRAINT fk_cahier_matiere 
            FOREIGN KEY (idmatiere) 
            REFERENCES matiere(idmatiere) 
            ON UPDATE CASCADE ON DELETE CASCADE ) 
            ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;