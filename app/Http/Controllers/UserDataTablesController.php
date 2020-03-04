<?php

namespace App\Http\Controllers;

use App\Interfaces\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;

class UserDataTablesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        return app()->make(UserRepositoryInterface::class)->getUsersForDataTables();
    }
}
