<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210305081614 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game_stats ADD b1 TINYINT(1) DEFAULT NULL, ADD b2 TINYINT(1) DEFAULT NULL, ADD b3 TINYINT(1) DEFAULT NULL, ADD c1 TINYINT(1) NOT NULL, ADD c2 TINYINT(1) DEFAULT NULL, ADD c3 TINYINT(1) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game_stats DROP b1, DROP b2, DROP b3, DROP c1, DROP c2, DROP c3');
    }
}
