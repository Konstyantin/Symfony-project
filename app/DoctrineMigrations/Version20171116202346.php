<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171116202346 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE feature_car (feature_id INT NOT NULL, car_id INT NOT NULL, INDEX IDX_3550A32E60E4B879 (feature_id), INDEX IDX_3550A32EC3C6F69F (car_id), PRIMARY KEY(feature_id, car_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_features (car_id INT NOT NULL, feature_id INT NOT NULL, INDEX IDX_30F6E917C3C6F69F (car_id), INDEX IDX_30F6E91760E4B879 (feature_id), PRIMARY KEY(car_id, feature_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE feature_car ADD CONSTRAINT FK_3550A32E60E4B879 FOREIGN KEY (feature_id) REFERENCES feature (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE feature_car ADD CONSTRAINT FK_3550A32EC3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_features ADD CONSTRAINT FK_30F6E917C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE car_features ADD CONSTRAINT FK_30F6E91760E4B879 FOREIGN KEY (feature_id) REFERENCES feature (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE engine CHANGE car_drive car_drive ENUM(\'front\', \'full\', \'back\')');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE feature_car');
        $this->addSql('DROP TABLE car_features');
        $this->addSql('ALTER TABLE engine CHANGE car_drive car_drive VARCHAR(255) DEFAULT NULL COLLATE utf8_unicode_ci');
    }
}
