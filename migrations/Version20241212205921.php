<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241212205921 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE orders ALTER delivery_kladr_id TYPE VARCHAR(25)');
        $this->addSql('ALTER TABLE users ALTER delivery_kladr_id TYPE VARCHAR(25)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE orders ALTER delivery_kladr_id TYPE SMALLINT');
        $this->addSql('ALTER TABLE orders ALTER delivery_kladr_id TYPE SMALLINT');
        $this->addSql('ALTER TABLE users ALTER delivery_kladr_id TYPE SMALLINT');
        $this->addSql('ALTER TABLE users ALTER delivery_kladr_id TYPE SMALLINT');
    }
}
