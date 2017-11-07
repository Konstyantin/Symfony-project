<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171107203032 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE engine CHANGE car_drive car_drive ENUM(\'front\', \'full\', \'back\')');
        $this->addSql('ALTER TABLE car ADD fuel_id INT DEFAULT NULL, ADD dynamics_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69D97C79677 FOREIGN KEY (fuel_id) REFERENCES fuel (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DF2B46D6D FOREIGN KEY (dynamics_id) REFERENCES dynamics (id)');
        $this->addSql('CREATE INDEX IDX_773DE69D97C79677 ON car (fuel_id)');
        $this->addSql('CREATE INDEX IDX_773DE69DF2B46D6D ON car (dynamics_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69D97C79677');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DF2B46D6D');
        $this->addSql('DROP INDEX IDX_773DE69D97C79677 ON car');
        $this->addSql('DROP INDEX IDX_773DE69DF2B46D6D ON car');
        $this->addSql('ALTER TABLE car DROP fuel_id, DROP dynamics_id');
        $this->addSql('ALTER TABLE engine CHANGE car_drive car_drive VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
    }
}
