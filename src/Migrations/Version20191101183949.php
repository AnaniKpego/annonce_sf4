<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191101183949 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE vehicule_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE vehicule (id INT NOT NULL, users_id INT NOT NULL, marque VARCHAR(255) NOT NULL, modele VARCHAR(255) NOT NULL, version VARCHAR(255) DEFAULT NULL, prix_min DOUBLE PRECISION NOT NULL, prix_max DOUBLE PRECISION NOT NULL, boite_de_vitesse VARCHAR(255) NOT NULL, roues_motrices VARCHAR(255) NOT NULL, kilometrage_min VARCHAR(255) NOT NULL, kilometrage_max VARCHAR(255) NOT NULL, carburant VARCHAR(255) NOT NULL, categorie_vehicule VARCHAR(255) NOT NULL, annee_min VARCHAR(255) NOT NULL, annee_max VARCHAR(255) NOT NULL, categorie_licence VARCHAR(255) NOT NULL, kw_min VARCHAR(255) NOT NULL, kw_max VARCHAR(255) NOT NULL, cylindre_min VARCHAR(255) NOT NULL, cylindre_max VARCHAR(255) NOT NULL, qualites VARCHAR(255) NOT NULL, categorie VARCHAR(255) NOT NULL, couleur VARCHAR(255) NOT NULL, places_min VARCHAR(255) NOT NULL, placa_max VARCHAR(255) NOT NULL, equipement VARCHAR(255) NOT NULL, equipement_suplementaire VARCHAR(255) DEFAULT NULL, qualite_equipement VARCHAR(255) DEFAULT NULL, consommation VARCHAR(255) DEFAULT NULL, co2emission_bis VARCHAR(255) DEFAULT NULL, normes_emission VARCHAR(255) DEFAULT NULL, npa_lieu VARCHAR(255) NOT NULL, rayon VARCHAR(255) NOT NULL, age_del_annonce VARCHAR(255) NOT NULL, tri VARCHAR(255) NOT NULL, sigle_qualite VARCHAR(255) NOT NULL, ch_min VARCHAR(255) NOT NULL, ch_max VARCHAR(255) NOT NULL, poids_remarquable_min VARCHAR(255) NOT NULL, poids_remarquable_max VARCHAR(255) NOT NULL, type_carrosserie VARCHAR(255) NOT NULL, nbre_porte_min VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_292FFF1D67B3B43D ON vehicule (users_id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D67B3B43D FOREIGN KEY (users_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE vehicule_id_seq CASCADE');
        $this->addSql('DROP TABLE vehicule');
    }
}
