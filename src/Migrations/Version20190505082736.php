<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20190505082736 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservation DROP INDEX UNIQ_42C8495554177093, ADD INDEX IDX_42C8495554177093 (room_id)');
        $this->addSql('ALTER TABLE reservation CHANGE room_id room_id INT DEFAULT NULL, CHANGE cost cost INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE reservation DROP INDEX IDX_42C8495554177093, ADD UNIQUE INDEX UNIQ_42C8495554177093 (room_id)');
        $this->addSql('ALTER TABLE reservation CHANGE room_id room_id INT DEFAULT NULL, CHANGE cost cost INT DEFAULT NULL');
    }
}
