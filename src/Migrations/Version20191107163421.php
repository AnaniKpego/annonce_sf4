<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191107163421 extends AbstractMigration
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
        $this->addSql('ALTER TABLE livre ADD langue VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE livre ADD traducteur VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE livre ADD format VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE livre ADD collection VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE livre ADD dateparution VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE livre ADD nbrepage INT NOT NULL');
        $this->addSql('ALTER TABLE livre ADD ean VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE livre ADD isbn VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE livre ADD disponibilite VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SCHEMA annonce_sf4');
        $this->addSql('CREATE SEQUENCE band_dessinee_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('ALTER TABLE livre DROP langue');
        $this->addSql('ALTER TABLE livre DROP traducteur');
        $this->addSql('ALTER TABLE livre DROP format');
        $this->addSql('ALTER TABLE livre DROP collection');
        $this->addSql('ALTER TABLE livre DROP dateparution');
        $this->addSql('ALTER TABLE livre DROP nbrepage');
        $this->addSql('ALTER TABLE livre DROP ean');
        $this->addSql('ALTER TABLE livre DROP isbn');
        $this->addSql('ALTER TABLE livre DROP disponibilite');
    }
}
