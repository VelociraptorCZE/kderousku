<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\Restriction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Restriction|null find($id, $lockMode = null, $lockVersion = null)
 * @method Restriction|null findOneBy(array $criteria, array $orderBy = null)
 * @method Restriction[]    findAll()
 * @method Restriction[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RestrictionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Restriction::class);
    }

    public function findCurrentRestrictions(): array
    {
        return $this
            ->createQueryBuilder('restriction')
            ->andWhere('restriction.start <= CURRENT_DATE() or restriction.start is null')
            ->andWhere('restriction.end >= CURRENT_DATE() or restriction.end is null')
            ->andWhere('restriction.region is null')
            ->getQuery()
            ->getResult();
    }

    public function findUpcomingRestrictions(): array
    {
        return $this
            ->createQueryBuilder('restriction')
            ->andWhere('restriction.start > CURRENT_DATE()')
            ->andWhere('restriction.region is null')
            ->getQuery()
            ->getResult();
    }
}
