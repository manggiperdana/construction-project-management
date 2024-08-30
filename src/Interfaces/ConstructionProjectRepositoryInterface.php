<?php
namespace App\Interfaces;

use App\Entity\ConstructionProject;

interface ConstructionProjectRepositoryInterface
{
    public function save(ConstructionProject $project): void;
    public function delete(ConstructionProject $project): void;
    public function findOne(int $id): ?ConstructionProject;
    public function findAll(): array;
    public function findOneWith(string $field, string $value);
    public function findByFilters(array $filters): array;
}