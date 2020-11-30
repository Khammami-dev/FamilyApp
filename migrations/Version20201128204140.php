<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201128204140 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rec_objet_perdu DROP FOREIGN KEY FK_AD87D7EF70F5DC8C');
        $this->addSql('DROP TABLE commisseriat_police');
        $this->addSql('DROP TABLE rec_objet_perdu');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C2D6BA2D9 FOREIGN KEY (reclamation_id) REFERENCES reclamation (id)');
        $this->addSql('ALTER TABLE rec_attaque ADD CONSTRAINT FK_1BF60D0D100D1FDF FOREIGN KEY (id_reclamation_id) REFERENCES reclamation (id)');
        $this->addSql('ALTER TABLE rec_harcelement ADD CONSTRAINT FK_48E2F0C100D1FDF FOREIGN KEY (id_reclamation_id) REFERENCES reclamation (id)');
        $this->addSql('ALTER TABLE rec_perte_objet ADD CONSTRAINT FK_17BB71C8100D1FDF FOREIGN KEY (id_reclamation_id) REFERENCES reclamation (id)');
        $this->addSql('ALTER TABLE rec_perte_personne ADD CONSTRAINT FK_698426D9100D1FDF FOREIGN KEY (id_reclamation_id) REFERENCES reclamation (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE606404262E207B FOREIGN KEY (id_commissariat_id) REFERENCES commisariat (id)');
        $this->addSql('ALTER TABLE utilisateur CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commisseriat_police (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, adresse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE rec_objet_perdu (id INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT DEFAULT NULL, id_commisseriat_police_id INT NOT NULL, titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, date DATE NOT NULL, position VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, categorie VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, marque VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, couleur VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, num_serie INT DEFAULT NULL, image VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, video VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, type TINYINT(1) DEFAULT NULL, publique TINYINT(1) NOT NULL, INDEX IDX_AD87D7EFC6EE5C49 (id_utilisateur_id), INDEX IDX_AD87D7EF70F5DC8C (id_commisseriat_police_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE rec_objet_perdu ADD CONSTRAINT FK_AD87D7EF70F5DC8C FOREIGN KEY (id_commisseriat_police_id) REFERENCES commisseriat_police (id)');
        $this->addSql('ALTER TABLE rec_objet_perdu ADD CONSTRAINT FK_AD87D7EFC6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C2D6BA2D9');
        $this->addSql('ALTER TABLE rec_attaque DROP FOREIGN KEY FK_1BF60D0D100D1FDF');
        $this->addSql('ALTER TABLE rec_harcelement DROP FOREIGN KEY FK_48E2F0C100D1FDF');
        $this->addSql('ALTER TABLE rec_perte_objet DROP FOREIGN KEY FK_17BB71C8100D1FDF');
        $this->addSql('ALTER TABLE rec_perte_personne DROP FOREIGN KEY FK_698426D9100D1FDF');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404C6EE5C49');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE606404262E207B');
        $this->addSql('ALTER TABLE utilisateur CHANGE nom nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(80) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
