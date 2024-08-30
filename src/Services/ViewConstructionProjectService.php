<?php
namespace App\Services;

use App\Entity\ConstructionProject;
use App\Interfaces\ConstructionProjectRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ViewConstructionProjectService
{
    private ConstructionProjectRepositoryInterface $repository;

    public function __construct(ConstructionProjectRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(int $id): ConstructionProject
    {
        $project = $this->repository->findOne($id);
        if (!$project) {
            throw new NotFoundHttpException('Construction project not found.');
        }
        return $project;
    }
}