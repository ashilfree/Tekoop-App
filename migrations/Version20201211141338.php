<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201211141338 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, post_id INT NOT NULL, filename VARCHAR(255) NOT NULL, INDEX IDX_16DB4F894B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE post_phone (post_id INT NOT NULL, phone_id INT NOT NULL, INDEX IDX_D3541B324B89032C (post_id), INDEX IDX_D3541B323B7323CB (phone_id), PRIMARY KEY(post_id, phone_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F894B89032C FOREIGN KEY (post_id) REFERENCES post (id)');
        $this->addSql('ALTER TABLE post_phone ADD CONSTRAINT FK_D3541B324B89032C FOREIGN KEY (post_id) REFERENCES post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post_phone ADD CONSTRAINT FK_D3541B323B7323CB FOREIGN KEY (phone_id) REFERENCES phone (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE post ADD address_id INT NOT NULL, DROP phone, DROP lat, DROP lng, DROP location');
        $this->addSql('ALTER TABLE post ADD CONSTRAINT FK_5A8A6C8DF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('CREATE INDEX IDX_5A8A6C8DF5B7AF75 ON post (address_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE post_phone');
        $this->addSql('ALTER TABLE post DROP FOREIGN KEY FK_5A8A6C8DF5B7AF75');
        $this->addSql('DROP INDEX IDX_5A8A6C8DF5B7AF75 ON post');
        $this->addSql('ALTER TABLE post ADD phone VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, ADD lat DOUBLE PRECISION NOT NULL, ADD lng DOUBLE PRECISION NOT NULL, ADD location VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP address_id');
    }
}
