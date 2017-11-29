<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171121193444 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE speaker DROP FOREIGN KEY FK_7B85DB614296D31F');
        $this->addSql('DROP TABLE car_data');
        $this->addSql('DROP TABLE conference');
        $this->addSql('DROP TABLE speaker');
        $this->addSql('ALTER TABLE dynamics ADD car_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dynamics ADD CONSTRAINT FK_D7491394C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('CREATE INDEX IDX_D7491394C3C6F69F ON dynamics (car_id)');
        $this->addSql('ALTER TABLE engine CHANGE car_drive car_drive ENUM(\'front\', \'full\', \'back\')');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DF2B46D6D');
        $this->addSql('DROP INDEX IDX_773DE69DF2B46D6D ON car');
        $this->addSql('ALTER TABLE car DROP dynamics_id');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE car_data (id INT AUTO_INCREMENT NOT NULL, car_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, price INT NOT NULL, INDEX IDX_6699E7CFC3C6F69F (car_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conference (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speaker (id INT AUTO_INCREMENT NOT NULL, genre_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL COLLATE utf8_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_7B85DB614296D31F (genre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE car_data ADD CONSTRAINT FK_6699E7CFC3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE speaker ADD CONSTRAINT FK_7B85DB614296D31F FOREIGN KEY (genre_id) REFERENCES conference (id)');
        $this->addSql('ALTER TABLE car ADD dynamics_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DF2B46D6D FOREIGN KEY (dynamics_id) REFERENCES dynamics (id)');
        $this->addSql('CREATE INDEX IDX_773DE69DF2B46D6D ON car (dynamics_id)');
        $this->addSql('ALTER TABLE dynamics DROP FOREIGN KEY FK_D7491394C3C6F69F');
        $this->addSql('DROP INDEX IDX_D7491394C3C6F69F ON dynamics');
        $this->addSql('ALTER TABLE dynamics DROP car_id');
        $this->addSql('ALTER TABLE engine CHANGE car_drive car_drive VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
    }
}
