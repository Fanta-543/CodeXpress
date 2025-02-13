<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250213103635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE network_user (network_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_F6CE153E34128B91 (network_id), INDEX IDX_F6CE153EA76ED395 (user_id), PRIMARY KEY(network_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE network_user ADD CONSTRAINT FK_F6CE153E34128B91 FOREIGN KEY (network_id) REFERENCES network (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE network_user ADD CONSTRAINT FK_F6CE153EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE likes ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE likes ADD CONSTRAINT FK_49CA4E7DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_49CA4E7DA76ED395 ON likes (user_id)');
        $this->addSql('ALTER TABLE subscription ADD offer_id INT NOT NULL');
        $this->addSql('ALTER TABLE subscription ADD CONSTRAINT FK_A3C664D353C674EE FOREIGN KEY (offer_id) REFERENCES offer (id)');
        $this->addSql('CREATE INDEX IDX_A3C664D353C674EE ON subscription (offer_id)');
        $this->addSql('ALTER TABLE view ADD notes_id INT NOT NULL');
        $this->addSql('ALTER TABLE view ADD CONSTRAINT FK_FEFDAB8EFC56F556 FOREIGN KEY (notes_id) REFERENCES notes (id)');
        $this->addSql('CREATE INDEX IDX_FEFDAB8EFC56F556 ON view (notes_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE network_user DROP FOREIGN KEY FK_F6CE153E34128B91');
        $this->addSql('ALTER TABLE network_user DROP FOREIGN KEY FK_F6CE153EA76ED395');
        $this->addSql('DROP TABLE network_user');
        $this->addSql('ALTER TABLE view DROP FOREIGN KEY FK_FEFDAB8EFC56F556');
        $this->addSql('DROP INDEX IDX_FEFDAB8EFC56F556 ON view');
        $this->addSql('ALTER TABLE view DROP notes_id');
        $this->addSql('ALTER TABLE likes DROP FOREIGN KEY FK_49CA4E7DA76ED395');
        $this->addSql('DROP INDEX IDX_49CA4E7DA76ED395 ON likes');
        $this->addSql('ALTER TABLE likes DROP user_id');
        $this->addSql('ALTER TABLE subscription DROP FOREIGN KEY FK_A3C664D353C674EE');
        $this->addSql('DROP INDEX IDX_A3C664D353C674EE ON subscription');
        $this->addSql('ALTER TABLE subscription DROP offer_id');
    }
}
