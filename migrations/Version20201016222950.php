<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201016222950 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restriction ADD region_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE restriction ADD CONSTRAINT FK_7A999BCE98260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('CREATE INDEX IDX_7A999BCE98260155 ON restriction (region_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restriction DROP FOREIGN KEY FK_7A999BCE98260155');
        $this->addSql('DROP INDEX IDX_7A999BCE98260155 ON restriction');
        $this->addSql('ALTER TABLE restriction DROP region_id');
    }
}
