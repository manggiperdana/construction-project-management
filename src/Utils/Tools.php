<?php

namespace App\Utils;

use App\Interfaces\ConstructionProjectRepositoryInterface;

class Tools
{
    private ConstructionProjectRepositoryInterface $projectRepository;

    public function __construct(ConstructionProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }
    function generateUniqueId(): string
    {
        $attempts = 0;
        do {
            // Generate a random 6-digit number
            $uniqueId = str_pad((string) random_int(1, 999999), 6, '0', STR_PAD_LEFT);

            // Check if the ID already exists
            $exists = $this->projectRepository->findOneWith('projectId', $uniqueId);

            if (!$exists) {
                return $uniqueId;
            }

            $attempts++;
        } while ($attempts < 10); // Retry up to 10 times

        throw new \RuntimeException('Unable to generate a unique ID.');
    }
}
