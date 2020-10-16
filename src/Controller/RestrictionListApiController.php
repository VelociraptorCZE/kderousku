<?php
declare(strict_types=1);

namespace App\Controller;

use App\Repository\RestrictionRepository;
use App\Transformer\RestrictionTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestrictionListApiController extends AbstractController
{
    private RestrictionRepository $restrictionRepository;
    private RestrictionTransformer $restrictionTransformer;

    public function __construct(
        RestrictionRepository $restrictionRepository,
        RestrictionTransformer $restrictionTransformer
    ) {
        $this->restrictionRepository = $restrictionRepository;
        $this->restrictionTransformer = $restrictionTransformer;
    }

    /**
     * @Route("/api/restriction-list", name="restriction_list")
     */
    public function index(): Response
    {
        return new JsonResponse([
            'current' => $this->restrictionTransformer->transform($this->restrictionRepository->findCurrentRestrictions()),
            'upcoming' => $this->restrictionTransformer->transform($this->restrictionRepository->findUpcomingRestrictions())
        ]);
    }

    /**
     * @Route("/api/restriction-list-by-regions", name="restriction_list_by_regions")
     */
    public function restrictionListByRegions(): Response
    {
        return new JsonResponse();
    }
}
