<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230331000517 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chocolate ADD collection_id INT NOT NULL, ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE chocolate ADD CONSTRAINT FK_267B732C514956FD FOREIGN KEY (collection_id) REFERENCES `T_COLLECTION` (id)');
        $this->addSql('CREATE INDEX IDX_267B732C514956FD ON chocolate (collection_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chocolate DROP FOREIGN KEY FK_267B732C514956FD');
        $this->addSql('DROP INDEX IDX_267B732C514956FD ON chocolate');
        $this->addSql('ALTER TABLE chocolate DROP collection_id, DROP slug');
    }
}
