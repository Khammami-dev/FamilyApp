<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201223191729 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE medias (id INT AUTO_INCREMENT NOT NULL, rec_objet_perdu_id INT DEFAULT NULL, rec_personne_perdue_id INT DEFAULT NULL, path VARCHAR(255) NOT NULL, type VARCHAR(255) DEFAULT NULL, INDEX IDX_12D2AF81795A175B (rec_objet_perdu_id), INDEX IDX_12D2AF81BDBAB907 (rec_personne_perdue_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE medias ADD CONSTRAINT FK_12D2AF81795A175B FOREIGN KEY (rec_objet_perdu_id) REFERENCES rec_objet_perdu (id)');
        $this->addSql('ALTER TABLE medias ADD CONSTRAINT FK_12D2AF81BDBAB907 FOREIGN KEY (rec_personne_perdue_id) REFERENCES rec_personne_perdue (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE medias');
    }
}
