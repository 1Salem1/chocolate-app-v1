<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230321113215 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE address_user address_user VARCHAR(255) DEFAULT NULL, CHANGE tel_user tel_user VARCHAR(255) DEFAULT NULL, CHANGE code_postal_user code_postal_user VARCHAR(255) DEFAULT NULL, CHANGE ville_user ville_user VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `user` CHANGE address_user address_user VARCHAR(255) NOT NULL, CHANGE tel_user tel_user VARCHAR(255) NOT NULL, CHANGE code_postal_user code_postal_user VARCHAR(255) NOT NULL, CHANGE ville_user ville_user VARCHAR(255) NOT NULL');
    }
}
