CREATE DATABASE IF NOT EXISTS  Film;
USE Film;

-- Tabella REGISTA
CREATE TABLE IF NOT EXISTS  REGISTA (
    Nome VARCHAR(100) PRIMARY KEY,
    DataNascita DATE,
    Nazionalità VARCHAR(50)
);

-- Tabella FILM
CREATE TABLE IF NOT EXISTS  FILM (
    Titolo VARCHAR(150) PRIMARY KEY,
    NomeRegista VARCHAR(100),
    Anno INT,
    FOREIGN KEY (NomeRegista) REFERENCES REGISTA(Nome)
);

-- Tabella ATTORE
CREATE TABLE IF NOT EXISTS  ATTORE (
    Nome VARCHAR(100) PRIMARY KEY,
    DataNascita DATE,
    Nazionalità VARCHAR(50)
);

-- Tabella INTERPRETA (relazione tra attori e film)
CREATE TABLE IF NOT EXISTS  INTERPRETA (
    Attore VARCHAR(100),
    Film VARCHAR(150),
    Personaggio VARCHAR(100),
    PRIMARY KEY (Attore, Film, Personaggio),
    FOREIGN KEY (Attore) REFERENCES ATTORE(Nome),
    FOREIGN KEY (Film) REFERENCES FILM(Titolo)
);
