<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221222172748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, id_produit_id INT DEFAULT NULL, id_user_id INT DEFAULT NULL, contenu LONGTEXT NOT NULL, INDEX IDX_8F91ABF0AABEFE2C (id_produit_id), INDEX IDX_8F91ABF079F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE detail_ecoservices (id INT AUTO_INCREMENT NOT NULL, siret BIGINT NOT NULL, nom VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devis (id INT AUTO_INCREMENT NOT NULL, id_service_id INT DEFAULT NULL, detail_eco_id INT DEFAULT NULL, id_user_id INT DEFAULT NULL, tarif_ht DOUBLE PRECISION NOT NULL, tarif_ttc DOUBLE PRECISION NOT NULL, INDEX IDX_8B27C52B48D62931 (id_service_id), INDEX IDX_8B27C52BDFE6D03B (detail_eco_id), INDEX IDX_8B27C52B79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE line_order (id INT AUTO_INCREMENT NOT NULL, id_order_id INT DEFAULT NULL, quantite INT NOT NULL, total DOUBLE PRECISION NOT NULL, INDEX IDX_AADB41BDD4481AD (id_order_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE line_order_produit (line_order_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_473451055EFC3D42 (line_order_id), INDEX IDX_47345105F347EFB (produit_id), PRIMARY KEY(line_order_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, prix_total DOUBLE PRECISION NOT NULL, date DATETIME NOT NULL, INDEX IDX_E52FFDEE79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, id_categorie_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, tarif DOUBLE PRECISION NOT NULL, image VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_29A5EC279F34925F (id_categorie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, tarif DOUBLE PRECISION NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, adresse LONGTEXT DEFAULT NULL, telephone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0AABEFE2C FOREIGN KEY (id_produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF079F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B48D62931 FOREIGN KEY (id_service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52BDFE6D03B FOREIGN KEY (detail_eco_id) REFERENCES detail_ecoservices (id)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE line_order ADD CONSTRAINT FK_AADB41BDD4481AD FOREIGN KEY (id_order_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE line_order_produit ADD CONSTRAINT FK_473451055EFC3D42 FOREIGN KEY (line_order_id) REFERENCES line_order (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE line_order_produit ADD CONSTRAINT FK_47345105F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC279F34925F FOREIGN KEY (id_categorie_id) REFERENCES categorie (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF0AABEFE2C');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF079F37AE5');
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52B48D62931');
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52BDFE6D03B');
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52B79F37AE5');
        $this->addSql('ALTER TABLE line_order DROP FOREIGN KEY FK_AADB41BDD4481AD');
        $this->addSql('ALTER TABLE line_order_produit DROP FOREIGN KEY FK_473451055EFC3D42');
        $this->addSql('ALTER TABLE line_order_produit DROP FOREIGN KEY FK_47345105F347EFB');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE79F37AE5');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC279F34925F');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE detail_ecoservices');
        $this->addSql('DROP TABLE devis');
        $this->addSql('DROP TABLE line_order');
        $this->addSql('DROP TABLE line_order_produit');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE user');
    }
}
