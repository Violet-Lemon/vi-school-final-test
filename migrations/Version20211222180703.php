<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211222180703 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE flight (id INT AUTO_INCREMENT NOT NULL, airport_departure INT NOT NULL, airport_arrival INT NOT NULL, flight_time DATETIME NOT NULL, status VARCHAR(100) NOT NULL, base_price DOUBLE PRECISION NOT NULL, INDEX IDX_C257E60ED9D508BA (airport_departure), INDEX IDX_C257E60E262F629C (airport_arrival), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60ED9D508BA FOREIGN KEY (airport_departure) REFERENCES airport (id)');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60E262F629C FOREIGN KEY (airport_arrival) REFERENCES airport (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE flight');
    }
}
