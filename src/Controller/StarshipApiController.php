<?php

namespace App\Controller;

use App\Repository\StarShipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StarshipApiController extends AbstractController
{
    #[Route('/api/starships')]
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
}
