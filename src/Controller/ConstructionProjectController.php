<?php

namespace App\Controller;

use App\Services\CreateConstructionPorjectService;
use App\Services\ListConstructionProjectsService;
use App\Services\ViewConstructionProjectService;
use App\Services\EditConstructionProjectsService;
use App\Services\DeleteConstructionProjectsService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Requests\CreateUpdateConstructionProjectRequest;

class ConstructionProjectController extends BaseController
{

    #[Route('/constructions', name: 'get_all_project', methods: ['GET'])]
    public function getAllProjects(Request $request, ListConstructionProjectsService $service): JsonResponse
    {
        return $this->handleRequest(function () use ($request, $service) {
            $filters = $request->query->all();
            $projects = $service->execute($filters);
            return $this->json($projects);
        });
    }

    #[Route('/constructions/{id}', name: 'get_project_by_id', methods: ['GET'])]
    public function getProjectById(int $id, ViewConstructionProjectService $service): JsonResponse
    {
        return $this->handleRequest(function () use ($id, $service) {
            $project = $service->execute($id);
            return $this->json($project);
        });
    }

    #[Route('/constructions', name: 'create_construction_project', methods: ['POST'])]
    public function createConstructionProject(CreateUpdateConstructionProjectRequest $request, CreateConstructionPorjectService $service): JsonResponse
    {
        return $this->handleRequest(function () use ($request, $service) {
            $request->validate();
            $data = json_decode($request->getRequest()->getContent(), true);
            $project = $service->execute($data);
            return $this->json($project, Response::HTTP_CREATED);
        });
    }

    #[Route('/constructions/{id}', name: 'update_project', methods: ['PUT'])]
    public function updateConstructionProject(int $id, CreateUpdateConstructionProjectRequest $request, EditConstructionProjectsService $service): JsonResponse
    {
        return $this->handleRequest(function () use ($id, $request, $service) {
            $request->validate();
            $data = json_decode($request->getRequest()->getContent(), true);
            $project = $service->execute($id, $data);
            return $this->json($project);
        });
    }

    #[Route('/constructions/{id}', name: 'delete_project', methods: ['DELETE'])]
    public function deleteConstructionProject(int $id, DeleteConstructionProjectsService $service): JsonResponse
    {
        return $this->handleRequest(function () use ($id, $service) {
            $service->execute($id);
            return new JsonResponse(null, Response::HTTP_NO_CONTENT);
        });
    }
}
