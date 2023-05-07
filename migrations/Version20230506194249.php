<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230506194249 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lesson2 (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE make_lesson ADD lesson2_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE make_lesson ADD CONSTRAINT FK_14F4F835DD784C0D FOREIGN KEY (lesson2_id) REFERENCES lesson2 (id)');
        $this->addSql('CREATE INDEX IDX_14F4F835DD784C0D ON make_lesson (lesson2_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE make_lesson DROP FOREIGN KEY FK_14F4F835DD784C0D');
        $this->addSql('DROP TABLE lesson2');
        $this->addSql('DROP INDEX IDX_14F4F835DD784C0D ON make_lesson');
        $this->addSql('ALTER TABLE make_lesson DROP lesson2_id');
    }
}
