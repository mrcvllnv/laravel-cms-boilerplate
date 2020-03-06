<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

interface UserRepositoryInterface
{
    /**
     * Get all users for datatable rendering.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUsersForDataTables(): JsonResponse;

    /**
     * Get users with filtered status.
     *
     * @param string $status
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function filterStatus(string $status): Collection;
}
