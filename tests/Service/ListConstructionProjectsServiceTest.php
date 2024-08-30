<?php

namespace App\Tests\Service;

use App\Entity\ConstructionProject;
use App\Interfaces\ConstructionProjectRepositoryInterface;
use App\Services\ListConstructionProjectsService;
use PHPUnit\Framework\TestCase;

class ListConstructionProjectsServiceTest extends TestCase
{
    public function testExecuteReturnsProjects()
    {
        $projects = [new ConstructionProject(), new ConstructionProject()];

        $repository = $this->createMock(ConstructionProjectRepositoryInterface::class);
        $repository->expects($this->once())
            ->method('findByFilters')
            ->willReturn($projects);

        $service = new ListConstructionProjectsService($repository);
        $result = $service->execute([]);
        $this->assertCount(2, $result);
    }
}
