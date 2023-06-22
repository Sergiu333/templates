CREATE TABLE apartamente
(
    CodApartament INT PRIMARY KEY,
    Etaj          INT,
    NrCamere      INT,
    Pret          INT,
    MetriPatrati  INT,
    CodAgent      INT
);


CREATE TABLE Agent
(
    CodAgent INT PRIMARY KEY,
    Nume     VARCHAR(50),
    Prenume  VARCHAR(50),
    Varsta   INT,
    Telefon  VARCHAR(20)
);

