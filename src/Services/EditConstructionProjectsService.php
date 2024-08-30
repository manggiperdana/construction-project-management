<?php

namespace App\Services;

use App\Entity\ConstructionProject;
use App\Interfaces\ConstructionProjectRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EditConstructionProjectsService
{
    private ConstructionProjectRepositoryInterface $repository;

    public function __construct(ConstructionProjectRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Edit construction projects.
     *
     * @param int $id Filters project data to apply.
     * @param array $data New project data to apply.
     * @return ConstructionProject
     */
    public function execute(int $id, array $data): ConstructionProject
    {
        $project = $this->repository->findOne($id);
        if (!$project) {
            throw new NotFoundHttpException('Project not found');
        }
        // Update project details
        $project->setName($data['name']);
        $project->setLocation($data['location']);
        $project->setStage($data['stage']);
        $project->setCategory($data['category']);
        $project->setStartDate(new \DateTime($data['startDate']));
        $project->setDescription($data['description']);

        $this->repository->save($project);

        return $project;
    }
}
