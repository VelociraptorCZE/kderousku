<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestrictionListApiController extends AbstractController
{
    /**
     * @Route("/api/restriction-list", name="restriction_list")
     */
    public function index(): Response
    {
        return new JsonResponse([]);
    }
}
