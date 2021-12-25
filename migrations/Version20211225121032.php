<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211225121032 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('INSERT INTO city (city_name) VALUES ("Москва");');
        $this->addSql('INSERT INTO city (city_name) VALUES ("Санкт-Петербург");');
        $this->addSql('INSERT INTO city (city_name) VALUES ("Нижний-Новгород");');
        $this->addSql('INSERT INTO airport (airport_city, airport_code) VALUES ((SELECT id FROM city WHERE id = 1), "DMD");');
        $this->addSql('INSERT INTO airport (airport_city, airport_code) VALUES ((SELECT id FROM city WHERE id = 1), "SVO");');
        $this->addSql('INSERT INTO airport (airport_city, airport_code) VALUES ((SELECT id FROM city WHERE id = 2), "LED");');
        $this->addSql('INSERT INTO airport (airport_city, airport_code) VALUES ((SELECT id FROM city WHERE id = 3), "GOJ");');
        $this->addSql('INSERT INTO flight (airport_departure, airport_arrival, flight_time, base_price) VALUES ((SELECT id FROM airport WHERE id = 1), (SELECT id FROM airport WHERE id = 2), 20, 1500);');
        $this->addSql('INSERT INTO flight (airport_departure, airport_arrival, flight_time, base_price) VALUES ((SELECT id FROM airport WHERE id = 1), (SELECT id FROM airport WHERE id = 3), 70, 3200);');
        $this->addSql('INSERT INTO flight (airport_departure, airport_arrival, flight_time, base_price) VALUES ((SELECT id FROM airport WHERE id = 2), (SELECT id FROM airport WHERE id = 3), 80, 2700);');
        $this->addSql('INSERT INTO flight (airport_departure, airport_arrival, flight_time, base_price) VALUES ((SELECT id FROM airport WHERE id = 4), (SELECT id FROM airport WHERE id = 3), 110, 3700);');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
