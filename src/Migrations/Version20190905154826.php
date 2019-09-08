<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190905154826 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE films (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, year VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE films_tags (film_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_DB9BDF20567F5183 (film_id), INDEX IDX_DB9BDF20BAD26311 (tag_id), PRIMARY KEY(film_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tags (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE films_tags ADD CONSTRAINT FK_DB9BDF20567F5183 FOREIGN KEY (film_id) REFERENCES films (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE films_tags ADD CONSTRAINT FK_DB9BDF20BAD26311 FOREIGN KEY (tag_id) REFERENCES tags (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE films_tags DROP FOREIGN KEY FK_DB9BDF20567F5183');
        $this->addSql('ALTER TABLE films_tags DROP FOREIGN KEY FK_DB9BDF20BAD26311');
        $this->addSql('DROP TABLE films');
        $this->addSql('DROP TABLE films_tags');
        $this->addSql('DROP TABLE tags');
    }
}
