<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201223190458 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commisariat_police (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rec_objet_perdu (id INT AUTO_INCREMENT NOT NULL, commisariat_police_id INT NOT NULL, user_id INT NOT NULL, titre VARCHAR(255) NOT NULL, date DATETIME NOT NULL, localisation VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, etat TINYINT(1) NOT NULL, publique TINYINT(1) NOT NULL, validiter TINYINT(1) NOT NULL, categorie VARCHAR(255) NOT NULL, marque VARCHAR(255) DEFAULT NULL, dateperte DATETIME NOT NULL, modele VARCHAR(255) DEFAULT NULL, couleur VARCHAR(255) DEFAULT NULL, num_serie INT DEFAULT NULL, INDEX IDX_AD87D7EFBBCC8C34 (commisariat_police_id), INDEX IDX_AD87D7EFA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rec_personne_perdue (id INT AUTO_INCREMENT NOT NULL, commissariat_police_id INT NOT NULL, user_id INT NOT NULL, titre VARCHAR(255) NOT NULL, date DATETIME NOT NULL, localisation VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, etat TINYINT(1) NOT NULL, publique TINYINT(1) NOT NULL, validiter TINYINT(1) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, num_cin INT DEFAULT NULL, age INT NOT NULL, date_perte DATETIME NOT NULL, INDEX IDX_5A6C1811FA580E78 (commissariat_police_id), INDEX IDX_5A6C1811A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rec_objet_perdu ADD CONSTRAINT FK_AD87D7EFBBCC8C34 FOREIGN KEY (commisariat_police_id) REFERENCES commisariat_police (id)');
        $this->addSql('ALTER TABLE rec_objet_perdu ADD CONSTRAINT FK_AD87D7EFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rec_personne_perdue ADD CONSTRAINT FK_5A6C1811FA580E78 FOREIGN KEY (commissariat_police_id) REFERENCES commisariat_police (id)');
        $this->addSql('ALTER TABLE rec_personne_perdue ADD CONSTRAINT FK_5A6C1811A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rec_objet_perdu DROP FOREIGN KEY FK_AD87D7EFBBCC8C34');
        $this->addSql('ALTER TABLE rec_personne_perdue DROP FOREIGN KEY FK_5A6C1811FA580E78');
        $this->addSql('ALTER TABLE rec_objet_perdu DROP FOREIGN KEY FK_AD87D7EFA76ED395');
        $this->addSql('ALTER TABLE rec_personne_perdue DROP FOREIGN KEY FK_5A6C1811A76ED395');
        $this->addSql('DROP TABLE commisariat_police');
        $this->addSql('DROP TABLE rec_objet_perdu');
        $this->addSql('DROP TABLE rec_personne_perdue');
        $this->addSql('DROP TABLE user');
    }
}
