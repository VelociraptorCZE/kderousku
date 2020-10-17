<?php
declare(strict_types=1);

namespace App\Controller;

use App\Repository\RegionRepository;
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
    private RegionRepository $regionRepository;

    public function __construct(
        RestrictionRepository $restrictionRepository,
        RegionRepository $regionRepository,
        RestrictionTransformer $restrictionTransformer
    ) {
        $this->restrictionRepository = $restrictionRepository;
        $this->restrictionTransformer = $restrictionTransformer;
        $this->regionRepository = $regionRepository;
    }

    /**
     * @Route("/api/v1/restriction-list", name="restriction_list")
     */
    public function restrictionList(): Response
    {
        return new JsonResponse([
            'current' => $this->restrictionTransformer->transform($this->restrictionRepository->findCurrentRestrictions()),
            'upcoming' => $this->restrictionTransformer->transform($this->restrictionRepository->findUpcomingRestrictions())
        ]);
    }

    /**
     * @Route("/api/v1/restriction-list-by-regions", name="restriction_list_by_regions")
     */
    public function restrictionListByRegions(): Response
    {
        $transformedRegions = [];
        $regions = $this->regionRepository->findBy([], ['name' => 'asc']);

        foreach ($regions as $region) {
            $transformedRegions[$region->getName()] = $this->restrictionTransformer->transform($region->getRestrictions()->toArray());
        }

        return new JsonResponse($transformedRegions);
    }
}
