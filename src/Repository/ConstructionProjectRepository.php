<?php

namespace App\Repository;

use App\Entity\ConstructionProject;
use App\Interfaces\ConstructionProjectRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ConstructionProject>
 */
class ConstructionProjectRepository extends ServiceEntityRepository implements ConstructionProjectRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConstructionProject::class);
    }

    public function save(ConstructionProject $project): void
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($project);
        $entityManager->flush();
    }
    public function findByFilters(array $filters): array
    {
       
        $qb = $this->createQueryBuilder('cp')->select('cp.id','cp.projectId', 'cp.name', 'cp.stage', 'cp.category', 'cp.startDate');
        if (!empty($filters['name'])) {
            $qb->andWhere('cp.name LIKE :name')
               ->setParameter('name', '%' . $filters['name'] . '%');
        }

        if (!empty($filters['projectId'])) {
            $qb->andWhere('cp.projectId = :projectId')
               ->setParameter('projectId', $filters['projectId']);
        }

        if (!empty($filters['location'])) {
            $qb->andWhere('cp.location = :location')
               ->setParameter('location', $filters['location']);
        }

        if (!empty($filters['stage'])) {
            $qb->andWhere('cp.stage = :stage')
               ->setParameter('stage', $filters['stage']);
        }

        // Add more filters as needed

        return $qb->getQuery()->getResult();
    }
    public function findAll(): array
    {
        return $this->findBy([]);
    }

    public function findOne(int $id): ?ConstructionProject
    {
        return $this->find($id);
    }

    public function findOneWith(string $field, string $value): ?ConstructionProject
    {
        return $this->findOneBy([$field => $value]);
    }

    public function delete(ConstructionProject $project): void
    {
        $entityManager = $this->getEntityManager();
        $entityManager->remove($project);
        $entityManager->flush();
    }
}
