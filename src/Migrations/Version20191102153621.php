<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191102153621 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP SEQUENCE band_dessinee_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE camping_car_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE camping_car (id INT NOT NULL, users_id INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, titre VARCHAR(255) NOT NULL, nbre_de_place INT NOT NULL, nbre_couchage INT NOT NULL, carburant VARCHAR(255) NOT NULL, killomertage INT NOT NULL, marque VARCHAR(255) NOT NULL, longueur INT NOT NULL, hauteur INT NOT NULL, boite_de_vitesse VARCHAR(255) NOT NULL, type_de_couchage VARCHAR(255) NOT NULL, consommation VARCHAR(255) NOT NULL, equipements VARCHAR(255) NOT NULL, options VARCHAR(255) NOT NULL, extras VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, conditions_de_location TEXT DEFAULT NULL, type_assurance VARCHAR(255) NOT NULL, heure_de_depart VARCHAR(255) NOT NULL, heure_de_retour VARCHAR(255) NOT NULL, localite VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, tarif_de_location DOUBLE PRECISION NOT NULL, tarif_assurance DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_813835C267B3B43D ON camping_car (users_id)');
        $this->addSql('ALTER TABLE camping_car ADD CONSTRAINT FK_813835C267B3B43D FOREIGN KEY (users_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE band_dessinee');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SCHEMA annonce_sf4');
        $this->addSql('DROP SEQUENCE camping_car_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE band_dessinee_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE band_dessinee (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('DROP TABLE camping_car');
    }
}
