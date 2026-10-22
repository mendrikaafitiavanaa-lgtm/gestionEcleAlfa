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
       
     -- ===================================================== 
     -- TABLE CLASSE 
     -- ===================================================== 
     CREATE TABLE classe ( 
        idclasse VARCHAR(10) NOT NULL, 
        libclasse VARCHAR(100), 
        PRIMARY KEY (idclasse) ) 
        ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 
      

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
         


        -- ===================================================== 
        -- TABLE MATIERE 
        -- ===================================================== 
        CREATE TABLE matiere ( 
            idmatiere VARCHAR(10) NOT NULL, 
            nommatiere VARCHAR(100), 
            PRIMARY KEY (idmatiere) 
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 
           

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