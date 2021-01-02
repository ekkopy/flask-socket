<?php

declare(strict_types=1);

namespace Src\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210101192922 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE Contact (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, _student_id INTEGER DEFAULT NULL, cellphone VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_83DFDFA4A8DFBF62 ON Contact (_student_id)');
        $this->addSql('CREATE TABLE Student (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE Contact');
        $this->addSql('DROP TABLE Student');
    }
}
