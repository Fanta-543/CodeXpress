<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250213121409 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category CHANGE category name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_11BA68CA76ED395');
        $this->addSql('DROP INDEX IDX_11BA68CA76ED395 ON note');
        $this->addSql('ALTER TABLE note DROP user_id, CHANGE notes title VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE note RENAME INDEX idx_11ba68c12469de2 TO IDX_CFBDFA1412469DE2');
        $this->addSql('ALTER TABLE user ADD email VARCHAR(255) NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD roles JSON NOT NULL, CHANGE user username VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('ALTER TABLE view DROP FOREIGN KEY FK_FEFDAB8EFC56F556');
        $this->addSql('DROP INDEX IDX_FEFDAB8EFC56F556 ON view');
        $this->addSql('ALTER TABLE view DROP view, CHANGE notes_id note_id INT NOT NULL');
        $this->addSql('ALTER TABLE view ADD CONSTRAINT FK_FEFDAB8E26ED0855 FOREIGN KEY (note_id) REFERENCES note (id)');
        $this->addSql('CREATE INDEX IDX_FEFDAB8E26ED0855 ON view (note_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category CHANGE name category VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE view DROP FOREIGN KEY FK_FEFDAB8E26ED0855');
        $this->addSql('DROP INDEX IDX_FEFDAB8E26ED0855 ON view');
        $this->addSql('ALTER TABLE view ADD view VARCHAR(255) NOT NULL, CHANGE note_id notes_id INT NOT NULL');
        $this->addSql('ALTER TABLE view ADD CONSTRAINT FK_FEFDAB8EFC56F556 FOREIGN KEY (notes_id) REFERENCES note (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_FEFDAB8EFC56F556 ON view (notes_id)');
        $this->addSql('DROP INDEX UNIQ_8D93D649F85E0677 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user ADD user VARCHAR(255) NOT NULL, DROP username, DROP email, DROP password, DROP roles');
        $this->addSql('ALTER TABLE note ADD user_id INT DEFAULT NULL, CHANGE title notes VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_11BA68CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_11BA68CA76ED395 ON note (user_id)');
        $this->addSql('ALTER TABLE note RENAME INDEX idx_cfbdfa1412469de2 TO IDX_11BA68C12469DE2');
    }
}
