<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221215154132 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE don DROP FOREIGN KEY don_ibfk_1');
        $this->addSql('DROP INDEX `primary` ON don');
        $this->addSql('ALTER TABLE don ADD id INT NOT NULL, DROP id_offre, CHANGE date_acceptation date_acceptation DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE don ADD CONSTRAINT FK_F8F081D9BF396750 FOREIGN KEY (id) REFERENCES offre (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE don ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE offre ADD type VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE don DROP FOREIGN KEY FK_F8F081D9BF396750');
        $this->addSql('DROP INDEX `PRIMARY` ON don');
        $this->addSql('ALTER TABLE don CHANGE id id_offre INT NOT NULL, CHANGE date_acceptation date_acceptation DATE NOT NULL');
        $this->addSql('ALTER TABLE don ADD CONSTRAINT don_ibfk_1 FOREIGN KEY (id_offre) REFERENCES offre (id)');
        $this->addSql('ALTER TABLE don ADD PRIMARY KEY (id_offre)');
        $this->addSql('ALTER TABLE offre DROP type');
    }
}
