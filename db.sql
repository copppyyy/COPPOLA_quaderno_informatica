-- Creazione del database 'library'
CREATE DATABASE IF NOT EXISTS library;
USE library;

-- Creazione della tabella Categories
CREATE TABLE IF NOT EXISTS Categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

-- Creazione della tabella Books
CREATE TABLE IF NOT EXISTS Books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    cover_image VARCHAR(255),
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES Categories(id) ON DELETE SET NULL
);

-- Creazione della tabella Wishlist
CREATE TABLE IF NOT EXISTS Wishlist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    book_id INT,
    FOREIGN KEY (book_id) REFERENCES Books(id) ON DELETE CASCADE
);

-- Aggiungere dati di esempio nelle tabelle
INSERT INTO Categories (name) VALUES ('Fantasy'), ('Sci-Fi'), ('Thriller');

-- Aggiungere libri
INSERT INTO Books (title, author, description, price, cover_image, category_id)
VALUES
('Book 1', 'Author 1', 'Description of Book 1', 19.99, 'book1.jpg', 1),
('Book 2', 'Author 2', 'Description of Book 2', 24.99, 'book2.jpg', 2);

-- Aggiungere libri alla wishlist
INSERT INTO Wishlist (book_id) VALUES (1), (2);
