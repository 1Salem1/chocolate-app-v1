<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230401035313 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `T_CHOCOLATE` (id INT AUTO_INCREMENT NOT NULL, id_article_id INT DEFAULT NULL, collection_id INT NOT NULL, nom_chocolat VARCHAR(255) NOT NULL, description_chocolat VARCHAR(255) NOT NULL, prix_chocolat DOUBLE PRECISION NOT NULL, slug VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_6F4FBBE2D71E064B (id_article_id), INDEX IDX_6F4FBBE2514956FD (collection_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `T_CHOCOLATE` ADD CONSTRAINT FK_6F4FBBE2D71E064B FOREIGN KEY (id_article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE `T_CHOCOLATE` ADD CONSTRAINT FK_6F4FBBE2514956FD FOREIGN KEY (collection_id) REFERENCES `T_COLLECTION` (id)');
        $this->addSql('ALTER TABLE chocolate DROP FOREIGN KEY FK_267B732C514956FD');
        $this->addSql('ALTER TABLE chocolate DROP FOREIGN KEY FK_267B732CD71E064B');
        $this->addSql('DROP TABLE chocolate');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chocolate (id INT AUTO_INCREMENT NOT NULL, id_article_id INT DEFAULT NULL, collection_id INT NOT NULL, nom_chocolat VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, description_chocolat VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, prix_chocolat DOUBLE PRECISION NOT NULL, slug VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, image VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, UNIQUE INDEX UNIQ_267B732CD71E064B (id_article_id), INDEX IDX_267B732C514956FD (collection_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE chocolate ADD CONSTRAINT FK_267B732C514956FD FOREIGN KEY (collection_id) REFERENCES t_collection (id)');
        $this->addSql('ALTER TABLE chocolate ADD CONSTRAINT FK_267B732CD71E064B FOREIGN KEY (id_article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE `T_CHOCOLATE` DROP FOREIGN KEY FK_6F4FBBE2D71E064B');
        $this->addSql('ALTER TABLE `T_CHOCOLATE` DROP FOREIGN KEY FK_6F4FBBE2514956FD');
        $this->addSql('DROP TABLE `T_CHOCOLATE`');
    }
}
