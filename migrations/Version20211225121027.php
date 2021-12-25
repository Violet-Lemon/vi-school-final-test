<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211225121027 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE airport (id INT AUTO_INCREMENT NOT NULL, airport_city INT NOT NULL, airport_code VARCHAR(10) NOT NULL, INDEX IDX_7E91F7C2B5776135 (airport_city), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, city_name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE flight (id INT AUTO_INCREMENT NOT NULL, airport_departure INT NOT NULL, airport_arrival INT NOT NULL, flight_time INT NOT NULL, status VARCHAR(100) DEFAULT \'активен\' NOT NULL, base_price DOUBLE PRECISION NOT NULL, INDEX IDX_C257E60ED9D508BA (airport_departure), INDEX IDX_C257E60E262F629C (airport_arrival), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE passenger (id INT AUTO_INCREMENT NOT NULL, surname VARCHAR(100) NOT NULL, name VARCHAR(100) NOT NULL, patronymic VARCHAR(100) NOT NULL, passport_series INT NOT NULL, passport_number INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticket (id INT AUTO_INCREMENT NOT NULL, passenger INT NOT NULL, flight INT NOT NULL, flight_date DATETIME NOT NULL, status VARCHAR(100) DEFAULT \'забронирован\' NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_97A0ADA33BEFE8DD (passenger), INDEX IDX_97A0ADA3C257E60E (flight), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE airport ADD CONSTRAINT FK_7E91F7C2B5776135 FOREIGN KEY (airport_city) REFERENCES city (id)');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60ED9D508BA FOREIGN KEY (airport_departure) REFERENCES airport (id)');
        $this->addSql('ALTER TABLE flight ADD CONSTRAINT FK_C257E60E262F629C FOREIGN KEY (airport_arrival) REFERENCES airport (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA33BEFE8DD FOREIGN KEY (passenger) REFERENCES passenger (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3C257E60E FOREIGN KEY (flight) REFERENCES flight (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE flight DROP FOREIGN KEY FK_C257E60ED9D508BA');
        $this->addSql('ALTER TABLE flight DROP FOREIGN KEY FK_C257E60E262F629C');
        $this->addSql('ALTER TABLE airport DROP FOREIGN KEY FK_7E91F7C2B5776135');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3C257E60E');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA33BEFE8DD');
        $this->addSql('DROP TABLE airport');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE flight');
        $this->addSql('DROP TABLE passenger');
        $this->addSql('DROP TABLE ticket');
    }
}
