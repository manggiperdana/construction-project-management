<?php
namespace App\Services;

use App\Entity\ConstructionProject;
use App\Interfaces\ConstructionProjectRepositoryInterface;

class ListConstructionProjectsService
{
    private ConstructionProjectRepositoryInterface $repository;

    public function __construct(ConstructionProjectRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Fetches a list of construction projects.
     *
     * @return ConstructionProject[]
     */
    public function execute(array $filters): array
    {
        return $this->repository->findByFilters($filters);
    }
}