<?php
declare(strict_types=1);

namespace App\Controller;

use App\Repository\RestrictionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestrictionListApiController extends AbstractController
{
    private RestrictionRepository $restrictionRepository;

    public function __construct(RestrictionRepository $restrictionRepository)
    {
        $this->restrictionRepository = $restrictionRepository;
    }

    /**
     * @Route("/api/restriction-list", name="restriction_list")
     */
    public function index(): Response
    {
        return new JsonResponse([
            'current' => $this->restrictionRepository->findCurrentRestrictions(),
            'upcoming' => $this->restrictionRepository->findUpcomingRestrictions()
        ]);
    }
}
