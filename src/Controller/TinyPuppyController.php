<?php

namespace App\Controller;

use App\DTO\Frontend\Option;
use App\Entity\DeliciousElephant;
use App\Repository\DeliciousElephantRepository;
use Doctrine\Common\Collections\Criteria;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TinyPuppyController extends AbstractController
{
    #[Route("/tiny/puppy", name: "app_tiny_puppy")]
    public function index(
        DeliciousElephantRepository $deliciousElephantRepository
    ): JsonResponse {
        $criteria = new Criteria();
        $collection = $deliciousElephantRepository->matching($criteria);
        $options = $collection->map(
            fn(DeliciousElephant $entity) => new Option(
                $entity->getId(),
                $entity->getName()
            )
        );
        return $this->json([
            "message" => "Welcome to your new controller!",
            "path" => "src/Controller/TinyPuppyController.php",
            "data" => $options,
        ]);
    }
}
