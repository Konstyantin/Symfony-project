<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171107200116 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE dynamics (id INT AUTO_INCREMENT NOT NULL, acceleration INT NOT NULL, speed INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fuel (id INT AUTO_INCREMENT NOT NULL, city INT NOT NULL, country INT NOT NULL, combined INT NOT NULL, emission INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE engine CHANGE car_drive car_drive ENUM(\'front\', \'full\', \'back\')');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE dynamics');
        $this->addSql('DROP TABLE fuel');
        $this->addSql('ALTER TABLE engine CHANGE car_drive car_drive VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
    }
}
