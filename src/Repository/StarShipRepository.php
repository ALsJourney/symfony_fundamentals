<?php

namespace App\Repository;

use App\Model\Starship;
use App\Model\StarshipStatusEnum;
use Psr\Log\LoggerInterface;

class StarShipRepository
{
    // Correct way to use autowiring
    // Add it to a constructor
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function findAll(): array
    {
        $this->logger->info('Starship found');

        return $starships = [
            new Starship(
                0,
                'USS LeafyCruiser (NCC-0001)',
                'Garden',
                'Jean-Luc Pickles',
                StarshipStatusEnum::IN_PROGRESS,
            ),
            new Starship(
                1,
                'USS Espresso (NCC-1234-C)',
                'Latte',
                'James T. Quick!',
                StarshipStatusEnum::COMPLETED,
            ),
            new Starship(
                2,
                'USS Wanderlust (NCC-2024-W)',
                'Delta Tourist',
                'Kathryn Journeyway',
                StarshipStatusEnum::WAITING,
            ),
        ];
    }

    public function find(int $id): ?Starship
    {
        foreach ($this->findAll() as $starship) {
            if ($starship->getId() === $id) {
                return $starship;
            }
        }

        return null;
    }
}
