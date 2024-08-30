<?php
namespace App\Tests\Service;

use App\Entity\ConstructionProject;
use App\Interfaces\ConstructionProjectRepositoryInterface;
use App\Services\DeleteConstructionProjectsService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteConstructionProjectServiceTest extends TestCase
{
    public function testExecuteDeletesProject()
    {
        // Create a mock for the repository interface
        $repository = $this->createMock(ConstructionProjectRepositoryInterface::class);

        // Set up the mock to return a ConstructionProject when find is called
        $project = new ConstructionProject();
        $repository->method('findOne')
            ->with($this->equalTo(1))
            ->willReturn($project);

        // Expect that the delete method is called with the ConstructionProject object
        $repository->expects($this->once())
            ->method('delete')
            ->with($project);

        // Create the service with the mocked repository
        $service = new DeleteConstructionProjectsService($repository);

        // Execute the service method
        $service->execute(1);
    }

    public function testExecuteThrowsExceptionIfProjectNotFound()
    {
        // Create a mock for the repository interface
        $repository = $this->createMock(ConstructionProjectRepositoryInterface::class);

        // Set up the mock to return null when find is called
        $repository->method('findOne')
            ->with($this->equalTo(1))
            ->willReturn(null);

        // Create the service with the mocked repository
        $service = new DeleteConstructionProjectsService($repository);

        // Expect an exception to be thrown
        $this->expectException(NotFoundHttpException::class);

        // Execute the service method
        $service->execute(1);
    }
}