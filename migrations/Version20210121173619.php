<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210121173619 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE historique (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historique_rec_objet_perdu (historique_id INT NOT NULL, rec_objet_perdu_id INT NOT NULL, INDEX IDX_76DFA92D6128735E (historique_id), INDEX IDX_76DFA92D795A175B (rec_objet_perdu_id), PRIMARY KEY(historique_id, rec_objet_perdu_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historique_user (historique_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_9CAF1AB6128735E (historique_id), INDEX IDX_9CAF1ABA76ED395 (user_id), PRIMARY KEY(historique_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE historique_rec_objet_perdu ADD CONSTRAINT FK_76DFA92D6128735E FOREIGN KEY (historique_id) REFERENCES historique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE historique_rec_objet_perdu ADD CONSTRAINT FK_76DFA92D795A175B FOREIGN KEY (rec_objet_perdu_id) REFERENCES rec_objet_perdu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE historique_user ADD CONSTRAINT FK_9CAF1AB6128735E FOREIGN KEY (historique_id) REFERENCES historique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE historique_user ADD CONSTRAINT FK_9CAF1ABA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE historique_rec_objet_perdu DROP FOREIGN KEY FK_76DFA92D6128735E');
        $this->addSql('ALTER TABLE historique_user DROP FOREIGN KEY FK_9CAF1AB6128735E');
        $this->addSql('DROP TABLE historique');
        $this->addSql('DROP TABLE historique_rec_objet_perdu');
        $this->addSql('DROP TABLE historique_user');
    }
}
