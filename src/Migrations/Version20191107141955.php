<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191107141955 extends AbstractMigration
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
        $this->addSql('CREATE SEQUENCE montre_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE montre (id INT NOT NULL, titre VARCHAR(255) NOT NULL, reference VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, disponibilite VARCHAR(255) NOT NULL, resume TEXT NOT NULL, description TEXT DEFAULT NULL, genre VARCHAR(255) NOT NULL, age VARCHAR(255) NOT NULL, boitier VARCHAR(255) NOT NULL, couleurducadran VARCHAR(255) NOT NULL, couleurboitier VARCHAR(255) NOT NULL, taille INT NOT NULL, epaisseur INT NOT NULL, verre VARCHAR(255) NOT NULL, affichage VARCHAR(255) NOT NULL, mouvement VARCHAR(255) NOT NULL, bracelet VARCHAR(255) NOT NULL, couleurdubracelet VARCHAR(255) NOT NULL, entrecorne INT NOT NULL, fermoir VARCHAR(255) NOT NULL, etancheite VARCHAR(255) NOT NULL, garantie VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SCHEMA annonce_sf4');
        $this->addSql('DROP SEQUENCE montre_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE band_dessinee_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('DROP TABLE montre');
    }
}
