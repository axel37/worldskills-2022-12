<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221216081635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Accepter une offre doit renseigner le membre ayant réalisé l\'action, or ce n\'est pas encore implémenté. Cette migration rend la colonne nullable.';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE don CHANGE id_membre_association id_membre_association INT NULL');

    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE don CHANGE id_membre_association id_membre_association INT NOT NULL');

    }
}
