<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191102130205 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE band_dessinee_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE bande_dessinee_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE immobilier_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE band_dessinee (id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE bande_dessinee (id INT NOT NULL, users_id INT NOT NULL, titre VARCHAR(255) NOT NULL, date_limite_de_lalbum VARCHAR(255) DEFAULT NULL, editeur VARCHAR(255) NOT NULL, edition_originale BOOLEAN NOT NULL, vendeur VARCHAR(255) NOT NULL, nb_de_vente INT NOT NULL, etat_general VARCHAR(255) NOT NULL, prix_de_vente DOUBLE PRECISION NOT NULL, lieu_de_vente VARCHAR(255) NOT NULL, id_de_vente INT NOT NULL, date_limite_de_vente VARCHAR(255) DEFAULT NULL, commentaire TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4BF8564267B3B43D ON bande_dessinee (users_id)');
        $this->addSql('CREATE TABLE immobilier (id INT NOT NULL, users_id INT NOT NULL, type_demande VARCHAR(255) NOT NULL, localite VARCHAR(255) NOT NULL, prix_min DOUBLE PRECISION NOT NULL, prix_max DOUBLE PRECISION NOT NULL, pieces_min VARCHAR(255) NOT NULL, surface_habitable_min VARCHAR(255) NOT NULL, surface_habitable_max VARCHAR(255) NOT NULL, type_dobjet VARCHAR(255) NOT NULL, caracteristiques VARCHAR(255) NOT NULL, etage VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, disponibilite_min VARCHAR(255) NOT NULL, disponibilite_max VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_142D24D267B3B43D ON immobilier (users_id)');
        $this->addSql('ALTER TABLE bande_dessinee ADD CONSTRAINT FK_4BF8564267B3B43D FOREIGN KEY (users_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE immobilier ADD CONSTRAINT FK_142D24D267B3B43D FOREIGN KEY (users_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE moto DROP type_carrosserie');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SCHEMA annonce_sf4');
        $this->addSql('DROP SEQUENCE band_dessinee_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE bande_dessinee_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE immobilier_id_seq CASCADE');
        $this->addSql('DROP TABLE band_dessinee');
        $this->addSql('DROP TABLE bande_dessinee');
        $this->addSql('DROP TABLE immobilier');
        $this->addSql('ALTER TABLE moto ADD type_carrosserie VARCHAR(255) NOT NULL');
    }
}
