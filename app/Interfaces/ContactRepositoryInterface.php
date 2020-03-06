<?php

namespace App\Interfaces;

use Illuminate\Http\JsonResponse;

interface ContactRepositoryInterface
{
    /**
     * Get all contacts for datatable rendering.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getContactsForDataTables(): JsonResponse;
}
