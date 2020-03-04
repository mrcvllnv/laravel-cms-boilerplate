<?php

namespace App\Interfaces;

use Illuminate\Http\JsonResponse;

interface UserRepositoryInterface
{
    /**
     * Get all users for datatable rendering.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUsersForDataTables(): JsonResponse;
}
