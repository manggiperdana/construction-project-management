<?php
namespace App\Tests\Service;

use App\Entity\ConstructionProject;
use App\Interfaces\ConstructionProjectRepositoryInterface;
use App\Services\CreateConstructionPorjectService;
use App\Utils\Tools;
use PHPUnit\Framework\TestCase;

class CreateConstructionProjectServiceTest extends TestCase
{
    public function testCreateConstructionProject()
    {
        $repository = $this->createMock(ConstructionProjectRepositoryInterface::class);
        $tools = $this->createMock(Tools::class);


        $service = new CreateConstructionPorjectService($repository, $tools);

        $data = [
            'name' => 'New Project',
            'location' => 'Some Location',
            'stage' => 'Concept',
            'category' => 'Education',
            'startDate' => '2024-09-01',
            'description' => 'Project description',
            'creatorId'=> 123
        ];

        $project = $service->execute($data);

        $this->assertInstanceOf(ConstructionProject::class, $project);
    }
}