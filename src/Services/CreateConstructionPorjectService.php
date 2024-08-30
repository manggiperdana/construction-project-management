<?php

namespace App\Services;

use App\Entity\ConstructionProject;
use App\Interfaces\ConstructionProjectRepositoryInterface;
use App\Utils\Tools;

class CreateConstructionPorjectService
{
    private ConstructionProjectRepositoryInterface $repository;
    private Tools $tools;

    public function __construct(ConstructionProjectRepositoryInterface $repository, Tools $tools)
    {
        $this->repository = $repository;
        $this->tools = $tools;
    }

    public function execute(array $data): ConstructionProject
    {
        $project = new ConstructionProject();
        $project->setProjectId($this->tools->generateUniqueId());
        $project->setName($data['name']);
        $project->setLocation($data['location']);
        $project->setStage($data['stage']);
        $project->setCategory($data['category']);
        $project->setStartDate(new \DateTime($data['startDate']));
        $project->setDescription($data['description']);
        $project->setCreatorId($data['creatorId']);

        $this->repository->save($project);
        return $project;
    }
}
