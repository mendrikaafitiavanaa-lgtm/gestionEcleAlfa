SELECT idclasse, Eleve.matricule, Eleve.nom, Eleve.prenom,
    numtrimestre, Note.idmatiere, noteds, notecahier, notecomportement
    FROM Eleve INNER JOIN Note ON Eleve.matricule = Note.matricule
        INNER JOIN Matiere ON Matiere.idmatiere = Note.idmatiere
            WHERE Eleve.idclasse = "idclasse" AND Note.numtrimestre = "numtrimestre";

SELECT idclasse, Eleve.matricule, Eleve.nom, Eleve.prenom,
    numtrimestre, Note.idmatiere, noteds, notecahier, notecomportement
    FROM Eleve INNER JOIN Note ON Eleve.matricule = Note.matricule
        INNER JOIN Matiere ON Matiere.idmatiere = Note.idmatiere
            WHERE Eleve.idclasse = "idclasse" AND Note.numtrimestre = "numtrimestre";


SELECT idclasse, Eleve.matricule,Eleve.nom, Eleve.prenom,ELeve.numerodeclasse, numtrimestre, 
            FROM Eleve INNER JOIN Note ON Eleve.matricule = Note.matricule
                WHERE Eleve.idclasse = '$idclasse' AND Note.numtrimestre = '$numtrimestre'
                GROUP BY numtrimestre ,  Eleve.matricule; 


SELECT idclasse, Eleve.matricule,Eleve.nom, Eleve.prenom,ELeve.numerodeclasse,
         Note.numtrimestre, Note.idmatiere, Note.noteds, Note.notecahier, Note.notecomportement
            FROM Eleve INNER JOIN Note ON Eleve.matricule = Note.matricule
                WHERE Eleve.matricule = '$matricule' AND Note.numtrimestre = '$numtrimestre'
                ; 

SELECT idclasse, Eleve.matricule,
             ROUND(AVG(((Note.noteds + Note.notecahier + Note.notecomportement) / 3)),2) AS moygen
               FROM Eleve INNER JOIN Note ON Eleve.matricule = Note.matricule
                   INNER JOIN Matiere ON Matiere.idmatiere = Note.idmatiere
                   WHERE Eleve.matricule = '$matricule' AND Note.numtrimestre = '$numtrimestre'
                   GROUP BY  Note.matricule;

SELECT
    m1.numtrimestre,
    t.libtrimestre,
    m1.idclasse,
    c.libclasse,
    m1.matricule,
    m1.nom,
    m1.prenom,
    ROUND(m1.moyenne, 2) AS moyenne,
    1 + (
        SELECT COUNT(*)
        FROM (
            SELECT
                n2.matricule,
                e2.idclasse,
                n2.numtrimestre,
                AVG(
                    (n2.noteds + n2.notecahier + n2.notecomportement) / 3
                ) AS moyenne
            FROM Note n2
            INNER JOIN Eleve e2
                ON e2.matricule = n2.matricule
            GROUP BY
                n2.numtrimestre,
                n2.matricule,
                e2.idclasse
        ) m2
        WHERE m2.numtrimestre = m1.numtrimestre
          AND m2.idclasse = m1.idclasse
          AND m2.moyenne > m1.moyenne
    ) AS rang
FROM (
    SELECT
        n.numtrimestre,
        e.matricule,
        e.nom,
        e.prenom,
        e.idclasse,
        AVG(
            (n.noteds + n.notecahier + n.notecomportement) / 3
        ) AS moyenne
    FROM Note n
    INNER JOIN Eleve e
        ON e.matricule = n.matricule
    GROUP BY
        n.numtrimestre,
        e.matricule,
        e.nom,
        e.prenom,
        e.idclasse
) m1
INNER JOIN Trimestre t
    ON t.numtrimestre = m1.numtrimestre
INNER JOIN Classe c
    ON c.idclasse = m1.idclasse
ORDER BY
    m1.numtrimestre,
    m1.idclasse,
    m1.moyenne DESC;




SELECT  m.matricule, m.idclasse,  m.moygen, 1 + (
    SELECT COUNT(*) FROM (
        SELECT e2.matricule, e2.idclasse, ROUND(AVG((n2.noteds + n2.notecahier + n2.notecomportement) / 3), 2 ) AS moygen
            FROM Eleve e2 INNER JOIN Note n2 ON e2.matricule = n2.matricule
                 WHERE n2.numtrimestre = '$numtrimestre'
                     GROUP BY e2.matricule,  e2.idclasse ) AS classement
                         WHERE classement.idclasse = m.idclasse AND classement.moygen > m.moygen ) AS rang
                            FROM (
                                SELECT e.matricule, e.idclasse,
                                ROUND(AVG((n.noteds + n.notecahier + n.notecomportement) / 3),2 ) AS moygen
                                    FROM Eleve e INNER JOIN Note n ON e.matricule = n.matricule
                                         WHERE e.matricule = '$matricule' AND n.numtrimestre = '$numtrimestre'
                                            GROUP BY e.matricule, e.idclasse ) AS m;

