CREATE DATABASE IF NOT EXISTS db_2025;
USE db_2025;

CREATE TABLE IF NOT EXISTS INSEGNANTE (
    Id_insegnante INT AUTO_INCREMENT PRIMARY KEY,
    registrazione DATE NOT NULL,
    lingua_di_riferimento VARCHAR(50) NOT NULL,
    livello VARCHAR(20) NOT NULL
);

-- Tabella STUDENTE
CREATE TABLE IF NOT EXISTS STUDENTE (
    Id_studente INT AUTO_INCREMENT PRIMARY KEY,
    registrazione DATE NOT NULL,
    punteggio INT DEFAULT 0
);

-- Tabella CORSI
CREATE TABLE IF NOT EXISTS CORSI (
    Id_corso INT AUTO_INCREMENT PRIMARY KEY,
    livello_corso VARCHAR(20) NOT NULL,
    materiale_didattico TEXT,
    classifica_del_corso INT DEFAULT 0,
    Id_insegnante INT, -- Un corso è creato da un insegnante
    FOREIGN KEY (Id_insegnante) REFERENCES INSEGNANTE(Id_insegnante) ON DELETE SET NULL
);

-- Tabella ESERCIZI
CREATE TABLE IF NOT EXISTS ESERCIZI (
    Id_esercizio INT AUTO_INCREMENT PRIMARY KEY,
    punti_per_es INT NOT NULL,
    tipo_di_esercizio VARCHAR(50) NOT NULL,
    descrizione TEXT,
    titolo VARCHAR(100) NOT NULL,
    Id_corso INT, -- Un esercizio appartiene a un corso
    FOREIGN KEY (Id_corso) REFERENCES CORSI(Id_corso) ON DELETE CASCADE
);

-- Tabella PARTECIPANO (relazione molti-a-molti tra STUDENTE e CORSI)
CREATE TABLE IF NOT EXISTS PARTECIPANO (
    Id_studente INT,
    Id_corso INT,
    Data_partecipazione DATE NOT NULL,
    PRIMARY KEY (Id_studente, Id_corso),
    FOREIGN KEY (Id_studente) REFERENCES STUDENTE(Id_studente) ON DELETE CASCADE,
    FOREIGN KEY (Id_corso) REFERENCES CORSI(Id_corso) ON DELETE CASCADE
);

-- Tabella ESEGUE (relazione molti-a-molti tra STUDENTE e ESERCIZI)
CREATE TABLE IF NOT EXISTS ESEGUE (
    Id_studente INT,
    Id_esercizio INT,
    Punti_ottenuti_dallo_studente INT DEFAULT 0,
    data_esercizio DATE NOT NULL,
    PRIMARY KEY (Id_studente, Id_esercizio),
    FOREIGN KEY (Id_studente) REFERENCES STUDENTE(Id_studente) ON DELETE CASCADE,
    FOREIGN KEY (Id_esercizio) REFERENCES ESERCIZI(Id_esercizio) ON DELETE CASCADE
);

