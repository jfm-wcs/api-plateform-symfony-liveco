<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220211102524 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE todo_item (id INT AUTO_INCREMENT NOT NULL, todo_list_id INT NOT NULL, title VARCHAR(255) NOT NULL, is_done TINYINT(1) NOT NULL, INDEX IDX_40CA4301E8A7DCFA (todo_list_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE todo_list (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, is_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE todo_item ADD CONSTRAINT FK_40CA4301E8A7DCFA FOREIGN KEY (todo_list_id) REFERENCES todo_list (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE todo_item DROP FOREIGN KEY FK_40CA4301E8A7DCFA');
        $this->addSql('DROP TABLE todo_item');
        $this->addSql('DROP TABLE todo_list');
    }
}
