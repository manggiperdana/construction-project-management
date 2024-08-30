<?php
namespace App\Services;

use App\Interfaces\ConstructionProjectRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteConstructionProjectsService
{
    private ConstructionProjectRepositoryInterface $repository;

    public function __construct(ConstructionProjectRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $id): bool
    {
        $project = $this->repository->findOne($id);
        if (!$project) {
            throw new NotFoundHttpException('Construction project not found.');
        }
        $this->repository->delete($project);
        return true;
    }
}