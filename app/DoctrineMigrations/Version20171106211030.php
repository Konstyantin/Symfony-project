<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171106211030 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE engine CHANGE car_drive car_drive ENUM(\'front\', \'full\', \'back\')');
        $this->addSql('ALTER TABLE car ADD engine_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DE78C9C0A FOREIGN KEY (engine_id) REFERENCES engine (id)');
        $this->addSql('CREATE INDEX IDX_773DE69DE78C9C0A ON car (engine_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DE78C9C0A');
        $this->addSql('DROP INDEX IDX_773DE69DE78C9C0A ON car');
        $this->addSql('ALTER TABLE car DROP engine_id');
        $this->addSql('ALTER TABLE engine CHANGE car_drive car_drive VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
    }
}
