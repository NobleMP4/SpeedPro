-- Suppression des tables existantes si elles existent (dans l'ordre inverse des dépendances)
DROP TABLE IF EXISTS vehicules_options;
DROP TABLE IF EXISTS images_vehicules;
DROP TABLE IF EXISTS images;
DROP TABLE IF EXISTS vehicules;
DROP TABLE IF EXISTS clients;
DROP TABLE IF EXISTS options;
DROP TABLE IF EXISTS lien;
DROP TABLE IF EXISTS modeles_generations;
DROP TABLE IF EXISTS modeles;
DROP TABLE IF EXISTS generation;
DROP TABLE IF EXISTS menu;
DROP TABLE IF EXISTS carburant;
DROP TABLE IF EXISTS marques;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS role;

-- Création des tables dans l'ordre des dépendances

-- Table pour les marques de véhicules
CREATE TABLE IF NOT EXISTS marques (
    id_marque INT AUTO_INCREMENT PRIMARY KEY,
    nom_marque VARCHAR(255) NOT NULL,
    INDEX (nom_marque)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table pour les types de carburant
CREATE TABLE IF NOT EXISTS carburant (
    id_carburant INT AUTO_INCREMENT PRIMARY KEY,
    nom_carburant VARCHAR(255) NOT NULL,
    INDEX (nom_carburant)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table pour les menus
CREATE TABLE IF NOT EXISTS menu (
    id_menu INT AUTO_INCREMENT PRIMARY KEY,
    nom_menu VARCHAR(255) NOT NULL,
    position_menu INT NOT NULL,
    INDEX (nom_menu)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table pour les générations de modèles
CREATE TABLE IF NOT EXISTS generation (
    id_generation INT AUTO_INCREMENT PRIMARY KEY,
    nom_generation VARCHAR(255) NOT NULL,
    INDEX (nom_generation)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table pour les modèles de véhicules
CREATE TABLE IF NOT EXISTS modeles (
    id_modele INT AUTO_INCREMENT PRIMARY KEY,
    nom_modele VARCHAR(255) NOT NULL,
    id_marque INT NOT NULL,
    INDEX (nom_modele),
    FOREIGN KEY (id_marque) REFERENCES marques(id_marque)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table de liaison entre modèles et générations
CREATE TABLE IF NOT EXISTS modeles_generations (
    id_modele INT NOT NULL,
    id_generation INT NOT NULL,
    PRIMARY KEY (id_modele, id_generation),
    FOREIGN KEY (id_modele) REFERENCES modeles(id_modele) ON DELETE CASCADE,
    FOREIGN KEY (id_generation) REFERENCES generation(id_generation) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table pour les liens
CREATE TABLE IF NOT EXISTS lien (
    id_lien INT AUTO_INCREMENT PRIMARY KEY,
    texte_lien VARCHAR(255) NOT NULL,
    url_lien VARCHAR(255) NOT NULL,
    url_rw_lien VARCHAR(255) NOT NULL,
    order_lien INT NOT NULL,
    id_menu_lien INT NOT NULL,
    INDEX (texte_lien),
    FOREIGN KEY (id_menu_lien) REFERENCES menu(id_menu)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table pour les options de véhicules
CREATE TABLE IF NOT EXISTS options (
    id_option INT AUTO_INCREMENT PRIMARY KEY,
    nom_option VARCHAR(255) NOT NULL,
    INDEX (nom_option)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table pour les clients
CREATE TABLE IF NOT EXISTS clients (
    id_client INT AUTO_INCREMENT PRIMARY KEY,
    nom_client_1 VARCHAR(255) NOT NULL,
    prenom_client_1 VARCHAR(255) NOT NULL,
    nom_client_2 VARCHAR(255),
    prenom_client_2 VARCHAR(255),
    email_client_1 VARCHAR(255) NOT NULL,
    telephone_client_1 VARCHAR(255) NOT NULL,
    email_client_2 VARCHAR(255),
    telephone_client_2 VARCHAR(255),
    rue VARCHAR(255) NOT NULL,
    code_postal VARCHAR(10) NOT NULL,
    ville VARCHAR(255) NOT NULL,
    pays VARCHAR(255) NOT NULL,
    date_creation_client TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX (nom_client_1, prenom_client_1)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table pour les véhicules
CREATE TABLE IF NOT EXISTS vehicules (
    id_vehicule INT AUTO_INCREMENT PRIMARY KEY,
    annee_vehicule INT NOT NULL,
    prix_vehicule DECIMAL(10, 2) NOT NULL,
    description_vehicule TEXT NOT NULL,
    kilometrage_vehicule INT NOT NULL,
    boite_vitesse_vehicule ENUM('Manuelle', 'Automatique') NOT NULL,
    puissance_vehicule INT NOT NULL,
    puissance_fiscale INT DEFAULT NULL,
    immatriculation_vehicule VARCHAR(255) NOT NULL,
    statut_vehicule ENUM('Disponible', 'Vendu') NOT NULL,
    id_modele INT NOT NULL,
    id_carburant INT NOT NULL,
    id_client INT,
    id_generation INT,
    date_creation_vehicule TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX (immatriculation_vehicule),
    FOREIGN KEY (id_modele) REFERENCES modeles(id_modele),
    FOREIGN KEY (id_carburant) REFERENCES carburant(id_carburant),
    FOREIGN KEY (id_client) REFERENCES clients(id_client),
    FOREIGN KEY (id_generation) REFERENCES generation(id_generation)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table pour les images
CREATE TABLE IF NOT EXISTS images (
    id_image INT AUTO_INCREMENT PRIMARY KEY,
    nom_image VARCHAR(50) NOT NULL,
    alt_image VARCHAR(50) NOT NULL,
    url_image VARCHAR(255) NOT NULL,
    slug_image VARCHAR(255) NOT NULL,
    date_creation_image TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX (nom_image)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table de liaison entre véhicules et images
CREATE TABLE IF NOT EXISTS images_vehicules (
    id_vehicule INT NOT NULL,
    id_image INT NOT NULL,
    PRIMARY KEY (id_vehicule, id_image),
    FOREIGN KEY (id_vehicule) REFERENCES vehicules(id_vehicule) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_image) REFERENCES images(id_image) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table de liaison entre véhicules et options
CREATE TABLE IF NOT EXISTS vehicules_options (
    id_vehicule INT NOT NULL,
    id_option INT NOT NULL,
    PRIMARY KEY (id_vehicule, id_option),
    FOREIGN KEY (id_vehicule) REFERENCES vehicules(id_vehicule),
    FOREIGN KEY (id_option) REFERENCES options(id_option)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table pour les rôles
CREATE TABLE IF NOT EXISTS role (
    id_role INT AUTO_INCREMENT PRIMARY KEY,
    nom_role VARCHAR(50) NOT NULL,
    droits_role TEXT,
    INDEX (nom_role)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table pour les utilisateurs
CREATE TABLE IF NOT EXISTS user (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nom_user VARCHAR(100) NOT NULL,
    prenom_user VARCHAR(100) NOT NULL,
    login_user VARCHAR(50) NOT NULL UNIQUE,
    mdp_user VARCHAR(255) NOT NULL,
    id_role_user INT,
    email_user VARCHAR(255) NOT NULL,
    date_creation_user TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX (login_user),
    FOREIGN KEY (id_role_user) REFERENCES role(id_role)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
