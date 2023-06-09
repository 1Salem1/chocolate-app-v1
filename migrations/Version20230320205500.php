<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230320205500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `user` (id_user INT AUTO_INCREMENT NOT NULL, nom_user VARCHAR(255) NOT NULL, prenom_user VARCHAR(255) NOT NULL, address_user VARCHAR(255) NOT NULL, tel_user VARCHAR(255) NOT NULL, email_user VARCHAR(180) NOT NULL, dte_anniv_user VARCHAR(255) NOT NULL, nom_de_lentreprise_user VARCHAR(255) NOT NULL, login_user VARCHAR(255) NOT NULL, password_user VARCHAR(255) NOT NULL, role_user LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', code_postal_user VARCHAR(255) NOT NULL, ville_user VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D64912A5F6CC (email_user), UNIQUE INDEX UNIQ_8D93D6494BE15D0C (login_user), PRIMARY KEY(id_user)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
