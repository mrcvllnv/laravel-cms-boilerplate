<?php

namespace App\Http\Controllers;

use App\Interfaces\OrganizationRepositoryInterface;
use Illuminate\Http\JsonResponse;

class OrganizationDataTablesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        return app()->make(OrganizationRepositoryInterface::class)->getOrganizationsForDataTables();
    }
}
