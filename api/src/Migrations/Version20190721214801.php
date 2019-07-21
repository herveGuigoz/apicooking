<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190721214801 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE users_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE recipe_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE users (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)');
        $this->addSql('CREATE TABLE users_recipe (users_id INT NOT NULL, recipe_id INT NOT NULL, PRIMARY KEY(users_id, recipe_id))');
        $this->addSql('CREATE INDEX IDX_D56F3FA767B3B43D ON users_recipe (users_id)');
        $this->addSql('CREATE INDEX IDX_D56F3FA759D8A214 ON users_recipe (recipe_id)');
        $this->addSql('CREATE TABLE recipe (id INT NOT NULL, owner_id INT NOT NULL, title VARCHAR(255) NOT NULL, prep_time INT NOT NULL, cook_time INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, ingredients JSONB NOT NULL, steps JSONB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DA88B1377E3C61F9 ON recipe (owner_id)');
        $this->addSql('COMMENT ON COLUMN recipe.ingredients IS \'(DC2Type:json_document)\'');
        $this->addSql('COMMENT ON COLUMN recipe.steps IS \'(DC2Type:json_document)\'');
        $this->addSql('ALTER TABLE users_recipe ADD CONSTRAINT FK_D56F3FA767B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users_recipe ADD CONSTRAINT FK_D56F3FA759D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE recipe ADD CONSTRAINT FK_DA88B1377E3C61F9 FOREIGN KEY (owner_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE users_recipe DROP CONSTRAINT FK_D56F3FA767B3B43D');
        $this->addSql('ALTER TABLE recipe DROP CONSTRAINT FK_DA88B1377E3C61F9');
        $this->addSql('ALTER TABLE users_recipe DROP CONSTRAINT FK_D56F3FA759D8A214');
        $this->addSql('DROP SEQUENCE users_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE recipe_id_seq CASCADE');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE users_recipe');
        $this->addSql('DROP TABLE recipe');
    }
}
