<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240829140355 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE construction_project_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE construction_project (id INT NOT NULL, project_id VARCHAR(6) NOT NULL, name VARCHAR(200) NOT NULL, location VARCHAR(500) NOT NULL, stage VARCHAR(50) NOT NULL, category VARCHAR(50) NOT NULL, other_category VARCHAR(255) DEFAULT NULL, start_date DATE NOT NULL, description TEXT NOT NULL, creator_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_909A639A166D1F9C ON construction_project (project_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE construction_project_id_seq CASCADE');
        $this->addSql('DROP TABLE construction_project');
    }
}
