CREATE TABLE type_materiel(
   id INT AUTO_INCREMENT,
   libelle VARCHAR(50) NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE caracteristique(
   id INT AUTO_INCREMENT,
   libelle VARCHAR(50),
   PRIMARY KEY(id)
);

CREATE TABLE membre_association(
   id INT AUTO_INCREMENT,
   nom VARCHAR(50) NOT NULL,
   prenom VARCHAR(50) NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE vehicule(
   id INT AUTO_INCREMENT,
   libelle VARCHAR(50) NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE lieu(
   id INT AUTO_INCREMENT,
   libelle VARCHAR(50) NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE beneficiaire(
   id INT,
   nom VARCHAR(255) NOT NULL,
   telephone VARCHAR(15) NOT NULL,
   adresse VARCHAR(255),
   PRIMARY KEY(id),
   FOREIGN KEY(id) REFERENCES lieu(id)
);

CREATE TABLE etat(
   id INT AUTO_INCREMENT,
   libelle VARCHAR(30) NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE offre(
   id INT AUTO_INCREMENT,
   date_reception DATE NOT NULL,
   nom_donateur VARCHAR(50) NOT NULL,
   prenom_donateur VARCHAR(50) NOT NULL,
   telephone_donateur VARCHAR(15) NOT NULL,
   mail_donateur VARCHAR(320) NOT NULL,
   description VARCHAR(255),
   id_etat INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_etat) REFERENCES etat(id)
);

CREATE TABLE objet(
   reference INT AUTO_INCREMENT,
   description VARCHAR(255),
   montant_estime DECIMAL(7,2),
   id_type_materiel INT NOT NULL,
   id_offre INT NOT NULL,
   PRIMARY KEY(reference),
   FOREIGN KEY(id_type_materiel) REFERENCES type_materiel(id),
   FOREIGN KEY(id_offre) REFERENCES offre(id)
);

CREATE TABLE photo(
   id INT AUTO_INCREMENT,
   chemin VARCHAR(255),
   reference INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(reference) REFERENCES objet(reference)
);

CREATE TABLE don(
   id_offre INT,
   date_acceptation DATE NOT NULL,
   id_membre_association INT NOT NULL,
   PRIMARY KEY(id_offre),
   FOREIGN KEY(id_offre) REFERENCES offre(id),
   FOREIGN KEY(id_membre_association) REFERENCES membre_association(id)
);

CREATE TABLE transport(
   id INT AUTO_INCREMENT,
   date_previsionnelle DATE NOT NULL,
   date_arrivee DATE,
   id_lieu INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_lieu) REFERENCES lieu(id)
);

CREATE TABLE entrepot(
   id INT,
   adresse VARCHAR(255) NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id) REFERENCES lieu(id)
);

CREATE TABLE depot_vente(
   id INT,
   adresse VARCHAR(255) NOT NULL,
   entreprise VARCHAR(100) NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id) REFERENCES lieu(id)
);

CREATE TABLE objet_caracteristique(
   reference INT,
   id_caracteristique INT,
   valeur VARCHAR(50),
   PRIMARY KEY(reference, id_caracteristique),
   FOREIGN KEY(reference) REFERENCES objet(reference),
   FOREIGN KEY(id_caracteristique) REFERENCES caracteristique(id)
);

CREATE TABLE caracteristique_type_materiel(
   id_type_materiel INT,
   id_caracteristique INT,
   PRIMARY KEY(id_type_materiel, id_caracteristique),
   FOREIGN KEY(id_type_materiel) REFERENCES type_materiel(id),
   FOREIGN KEY(id_caracteristique) REFERENCES caracteristique(id)
);

CREATE TABLE transport_membre_association(
   id_membre_association INT,
   id_transport INT,
   PRIMARY KEY(id_membre_association, id_transport),
   FOREIGN KEY(id_membre_association) REFERENCES membre_association(id),
   FOREIGN KEY(id_transport) REFERENCES transport(id)
);

CREATE TABLE transport_objet(
   reference INT,
   id_transport INT,
   PRIMARY KEY(reference, id_transport),
   FOREIGN KEY(reference) REFERENCES objet(reference),
   FOREIGN KEY(id_transport) REFERENCES transport(id)
);

CREATE TABLE transport_vehicule(
   id_transport INT,
   id_vehicule INT,
   PRIMARY KEY(id_transport, id_vehicule),
   FOREIGN KEY(id_transport) REFERENCES transport(id),
   FOREIGN KEY(id_vehicule) REFERENCES vehicule(id)
);

CREATE TABLE vente(
   reference INT,
   montant_pour_association DECIMAL(7,2) NOT NULL,
   date_vente VARCHAR(50) NOT NULL,
   id_depot_vente INT NOT NULL,
   PRIMARY KEY(reference),
   FOREIGN KEY(reference) REFERENCES objet(reference),
   FOREIGN KEY(id_depot_vente) REFERENCES depot_vente(id)
);

