<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190714183559 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE utilisateur_recipe (utilisateur_id INT NOT NULL, recipe_id INT NOT NULL, PRIMARY KEY(utilisateur_id, recipe_id))');
        $this->addSql('CREATE INDEX IDX_BB258BBCFB88E14F ON utilisateur_recipe (utilisateur_id)');
        $this->addSql('CREATE INDEX IDX_BB258BBC59D8A214 ON utilisateur_recipe (recipe_id)');
        $this->addSql('ALTER TABLE utilisateur_recipe ADD CONSTRAINT FK_BB258BBCFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE utilisateur_recipe ADD CONSTRAINT FK_BB258BBC59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE utilisateur_recipe');
    }
}
