/* Remplir la table des boisson

    Boissons


    CFN Café Noir   1.25
    CFD Décafféiné     1.20
    CFL Café Long   1.80
    BNA Bière sans alcool   2.10
    CCR Coca-Cola   2.10
    CCZ Coca-Zéro   2.10
    CIT Citronnade  2.10


*/

INSERT INTO boisson (idB, nomB, descB, puB) VALUES 
('CFN', 'Caf" Noir', NULL, 1.20),
('CFD', 'Décafféiné', NULL, 1.20),
('CFL', 'Café Long', NULL, 1.80),
('BNA', 'Bière sans alcool', NULL, 2.10),
('CCR', 'Coca-Cola', NULL, 2.05),
('CCZ', 'Coca-Zéro', NULL, 2.00),
('CIT', 'Citronnade', NULL, 2.40);


/* 

    Clients

    Leroy Philippe et prendre sa commande : 1 CFN et 1 CFL
    Legrand Alexandre et prendre sa commande: 1 BNA, 1 CFD et 1 CIT

*/

INSERT INTO personne (nomP, prenomP) VALUES 
('Leroy', 'Philippe'),
('Legrand', 'Alexandre');

INSERT INTO consommation (boissonC, persC) VALUES 
('CFN', '1'),
('CFL', '1'),
('BNA', '2'),
('CFD', '2'), 
('CIT', '2');

------------------------------------------------------------------------------------------------------------------------------------------------------------------------

-- 1)  Total des consommations pour chaque client

SELECT  
    personne.*, 
    COUNT(idB) AS `nbre de boissons`, 
    SUM(puB) AS `total`
FROM 
    personne 
    LEFT JOIN consommation ON persC = idP
    LEFT JOIN boisson ON boissonC = idB
GROUP BY 
    idP;

-- Ajout d'un nouveau champ dans 'consommation', "payeC"

-- 2) Total des consommations non payées pour chaque client 

SELECT  
    personne.*, 
    COUNT(idB) AS `nbre de boissons`,
    SUM(puB) AS `total`

FROM 
    personne 
    LEFT JOIN consommation ON persC = idP
    LEFT JOIN boisson ON boissonC = idB
WHERE
    NOT payeC
GROUP BY 
    idP;

-- 3) Leroy Philipe paye ses consommations

-- Combien doit-il?


SELECT  
    SUM(puB) AS `à payer`
FROM 
    consommation
    LEFT JOIN boisson ON boissonC = idB
WHERE
    NOT payeC 
    AND persC = 1;

----------------------

-- Il paye

UPDATE 
    consommation 
SET 
    payeC = TRUE
WHERE 
    NOT payeC
    AND persC = 1;