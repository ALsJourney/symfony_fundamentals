<?php

namespace App\Controller;

use App\Repository\StarShipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/starships')]
class StarshipApiController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function getCollection(StarShipRepository $repository): Response
    {
        // Dump and die from symfony
        // dd($logger);
        // dd($repository);
        $starships = $repository->findAll();

        // json uses json_encode internally
        // But if we install serializer it works then
        return $this->json($starships);
    }

    #[Route('/{id<\d+>}', methods: ['GET'])]
    public function get(int $id, StarShipRepository $repository): Response
    {
        $starship = $repository->find($id);
        if (!$starship) {
            throw $this->createNotFoundException('Starship not found!');
        }

        return $this->json($starship);
    }
}
