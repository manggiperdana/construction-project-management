<?php
namespace App\Tests\Service;

use App\Entity\ConstructionProject;
use App\Interfaces\ConstructionProjectRepositoryInterface;
use App\Services\ViewConstructionProjectService;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ViewConstructionProjectServiceTest extends TestCase
{
    public function testExecuteReturnsProject()
    {
        $project = new ConstructionProject();
        $repository = $this->createMock(ConstructionProjectRepositoryInterface::class);
        $repository->expects($this->once())
            ->method('findOne')
            ->with(1)
            ->willReturn($project);

        $service = new ViewConstructionProjectService($repository);
        $result = $service->execute(1);

        $this->assertSame($project, $result);
    }

    public function testExecuteThrowsExceptionIfProjectNotFound()
    {
        $repository = $this->createMock(ConstructionProjectRepositoryInterface::class);
        $repository->expects($this->once())
            ->method('findOne')
            ->with(1)
            ->willReturn(null);

        $service = new ViewConstructionProjectService($repository);

        $this->expectException(NotFoundHttpException::class);
        $service->execute(1);
    }
}