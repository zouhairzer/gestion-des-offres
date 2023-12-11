// -- Création de de la base de données
CREATE DATABASE offres_d_emploi;

-- Création des tables
CREATE TABLE roles (
   id INT AUTO_INCREMENT PRIMARY KEY,
   nom VARCHAR(255)
)ENGINE = InnoDB;;

CREATE TABLE users (
   id INT AUTO_INCREMENT PRIMARY KEY,
   nom VARCHAR(80) NOT NULL,
   password VARCHAR(255) NOT NULL,
   email VARCHAR(255) NOT NULL UNIQUE
   role_id INT,
   FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE = InnoDB;

CREATE TABLE offres (
   id INT AUTO_INCREMENT PRIMARY KEY,
   titre VARCHAR(255) NOT NULL,
   description VARCHAR(255) NOT NULL,
   company VARCHAR(255) NOT NULL,
   location VARCHAR(255) NOT NULL,
   IsActive BOOLEAN ,
   IsApproved BOOLEAN ,
   RecruiterId INT,
   FOREIGN KEY (RecruiterId) REFERENCES Users(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Status VARCHAR(255),
    offer_id INT,
    FOREIGN KEY (offer_id) REFERENCES offres(id) ON DELETE CASCADE ON UPDATE CASCADE,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
);
