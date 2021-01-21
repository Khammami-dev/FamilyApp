<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210119210511 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD nom VARCHAR(180) NOT NULL, ADD prenom VARCHAR(180) NOT NULL, ADD numcin INT NOT NULL, ADD telephone VARCHAR(180) NOT NULL, ADD adresse VARCHAR(180) NOT NULL, CHANGE roles roles LONGTEXT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP nom, DROP prenom, DROP numcin, DROP telephone, DROP adresse, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\'');
    }
}
