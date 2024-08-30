<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

abstract class BaseController extends AbstractController
{
    protected function handleRequest(callable $callback): JsonResponse
    {
        try {
            // Execute the callback containing the main logic
            return $callback();
        } catch (NotFoundHttpException $e) {
            return $this->json([
                'error' => 'process_failed',
                'message' => $e->getMessage(),
            ], Response::HTTP_NOT_FOUND);
        } catch (\Exception $e) {
            return $this->json([
                'error' => 'process_crash',
                'message' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}