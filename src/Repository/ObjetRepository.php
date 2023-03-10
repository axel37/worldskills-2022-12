<?php

namespace App\Repository;

use App\Entity\Etat;
use App\Entity\Objet;
use App\Entity\Offre;
use App\Entity\TypeMateriel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

// Méthodes / requêtes de récupération d'Objets.
/**
 * @extends ServiceEntityRepository<Objet>
 *
 * @method Objet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Objet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Objet[]    findAll()
 * @method Objet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ObjetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Objet::class);
    }

    public function save(Objet $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Objet $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Renvoie les objets "en attente", dont l'offre est en cours de traitement
     */
    public function findByEtat(string $etat): array
    {
        return $this->createQueryBuilder('objet')
            ->andWhere('etat.libelle = :etat')
            ->innerJoin('objet.offre', 'offre')
            ->innerJoin('offre.etat', 'etat')
            ->setParameter('etat', $etat)
            ->getQuery()
            ->getResult();
    }

    public function findByCriteres(?string $description = null, ?TypeMateriel $type = null, ?Etat $etat = null): array
    {
        $qb = $this->createQueryBuilder('objet');

        if (isset($type)) {
            $qb->andWhere('type.id = :type')
                ->innerJoin('objet.type', 'type')
                ->setParameter('type', $type);
        }

        if (isset($description)) {
            $qb->andWhere('objet.description LIKE :description')
                ->setParameter('description', '%' . $description . '%');
        }

        if (isset($etat)) {
            $qb->andWhere('etat = :etat')
                ->innerJoin('objet.offre', 'offre')
                ->innerJoin('offre.etat', 'etat')
                ->setParameter('etat', $etat);
        }
        else
        {
            $qb->andWhere('etat.libelle != :etat')
            ->innerJoin('objet.offre', 'offre')
            ->innerJoin('offre.etat', 'etat')
            ->setParameter('etat', 'Refusée');
        }

        


        return $qb->getQuery()->getResult();
    }

    //    /**
    //     * @return Objet[] Returns an array of Objet objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('o.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Objet
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
