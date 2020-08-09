<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200808152725 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE concert (id INT AUTO_INCREMENT NOT NULL, salle_id INT NOT NULL, name VARCHAR(255) NOT NULL, date DATE NOT NULL, description LONGTEXT DEFAULT NULL, img VARCHAR(255) DEFAULT NULL, INDEX IDX_D57C02D2DC304035 (salle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE concert_groupe (concert_id INT NOT NULL, groupe_id INT NOT NULL, INDEX IDX_A1B69CA083C97B2E (concert_id), INDEX IDX_A1B69CA07A45358C (groupe_id), PRIMARY KEY(concert_id, groupe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, style VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, img VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, concert_id INT NOT NULL, groupe_id INT NOT NULL, name VARCHAR(255) NOT NULL, img VARCHAR(255) NOT NULL, INDEX IDX_14B7841883C97B2E (concert_id), INDEX IDX_14B784187A45358C (groupe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle (id INT AUTO_INCREMENT NOT NULL, ville_id INT NOT NULL, name VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, url_facebook VARCHAR(255) DEFAULT NULL, url_site VARCHAR(255) DEFAULT NULL, img VARCHAR(255) DEFAULT NULL, INDEX IDX_4E977E5CA73F0036 (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, cp VARCHAR(10) NOT NULL, departement VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D2DC304035 FOREIGN KEY (salle_id) REFERENCES salle (id)');
        $this->addSql('ALTER TABLE concert_groupe ADD CONSTRAINT FK_A1B69CA083C97B2E FOREIGN KEY (concert_id) REFERENCES concert (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE concert_groupe ADD CONSTRAINT FK_A1B69CA07A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B7841883C97B2E FOREIGN KEY (concert_id) REFERENCES concert (id)');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784187A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id)');
        $this->addSql('ALTER TABLE salle ADD CONSTRAINT FK_4E977E5CA73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE concert_groupe DROP FOREIGN KEY FK_A1B69CA083C97B2E');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B7841883C97B2E');
        $this->addSql('ALTER TABLE concert_groupe DROP FOREIGN KEY FK_A1B69CA07A45358C');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784187A45358C');
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D2DC304035');
        $this->addSql('ALTER TABLE salle DROP FOREIGN KEY FK_4E977E5CA73F0036');
        $this->addSql('DROP TABLE concert');
        $this->addSql('DROP TABLE concert_groupe');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE salle');
        $this->addSql('DROP TABLE ville');
    }
}
