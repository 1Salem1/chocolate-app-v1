<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230322151004 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `T_COLLECTION` (id INT AUTO_INCREMENT NOT NULL, nom_collection VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `T_USER` (id_user INT AUTO_INCREMENT NOT NULL, nom_user VARCHAR(255) NOT NULL, prenom_user VARCHAR(255) NOT NULL, address_user VARCHAR(255) DEFAULT NULL, tel_user VARCHAR(255) DEFAULT NULL, email_user VARCHAR(180) NOT NULL, password_user VARCHAR(255) NOT NULL, role_user LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', code_postal_user VARCHAR(255) DEFAULT NULL, ville_user VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_6DC57B912A5F6CC (email_user), PRIMARY KEY(id_user)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, adresse_user VARCHAR(255) NOT NULL, code_postal_user VARCHAR(255) NOT NULL, ville_user VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, prix_article DOUBLE PRECISION NOT NULL, qunatie_article INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chocolate (id INT AUTO_INCREMENT NOT NULL, id_article_id INT DEFAULT NULL, nom_chocolat VARCHAR(255) NOT NULL, description_chocolat VARCHAR(255) NOT NULL, prix_chocolat DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_267B732CD71E064B (id_article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chocolate ADD CONSTRAINT FK_267B732CD71E064B FOREIGN KEY (id_article_id) REFERENCES article (id)');
        $this->addSql('DROP TABLE user');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id_user INT AUTO_INCREMENT NOT NULL, nom_user VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, prenom_user VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, address_user VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, tel_user VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, email_user VARCHAR(180) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, password_user VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, role_user LONGTEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci` COMMENT \'(DC2Type:json)\', code_postal_user VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, ville_user VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, UNIQUE INDEX UNIQ_8D93D64912A5F6CC (email_user), PRIMARY KEY(id_user)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE chocolate DROP FOREIGN KEY FK_267B732CD71E064B');
        $this->addSql('DROP TABLE `T_COLLECTION`');
        $this->addSql('DROP TABLE `T_USER`');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE chocolate');
    }
}
