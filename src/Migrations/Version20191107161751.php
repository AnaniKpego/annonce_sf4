<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191107161751 extends AbstractMigration
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
        $this->addSql('CREATE SEQUENCE livre_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE livre (id INT NOT NULL, users_id INT NOT NULL, titre VARCHAR(255) NOT NULL, date_limite_de_lalbum VARCHAR(255) DEFAULT NULL, editeur VARCHAR(255) NOT NULL, edition_originale BOOLEAN NOT NULL, vendeur VARCHAR(255) NOT NULL, nb_de_vente INT NOT NULL, etat_general VARCHAR(255) NOT NULL, prix_de_vente DOUBLE PRECISION NOT NULL, lieu_de_vente VARCHAR(255) NOT NULL, id_de_vente INT NOT NULL, date_limite_de_vente VARCHAR(255) DEFAULT NULL, commentaire TEXT DEFAULT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_AC634F9967B3B43D ON livre (users_id)');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F9967B3B43D FOREIGN KEY (users_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE montre ADD users_id INT NOT NULL');
        $this->addSql('ALTER TABLE montre ADD CONSTRAINT FK_B61A93A467B3B43D FOREIGN KEY (users_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_B61A93A467B3B43D ON montre (users_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SCHEMA annonce_sf4');
        $this->addSql('DROP SEQUENCE livre_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE band_dessinee_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('DROP TABLE livre');
        $this->addSql('ALTER TABLE montre DROP CONSTRAINT FK_B61A93A467B3B43D');
        $this->addSql('DROP INDEX IDX_B61A93A467B3B43D');
        $this->addSql('ALTER TABLE montre DROP users_id');
    }
}
