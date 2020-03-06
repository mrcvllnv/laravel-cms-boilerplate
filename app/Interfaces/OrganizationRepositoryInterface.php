<?php

namespace App\Interfaces;

use Illuminate\Http\JsonResponse;

interface OrganizationRepositoryInterface
{
    /**
     * Get all organizations for datatable rendering.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOrganizationsForDataTables(): JsonResponse;
}
