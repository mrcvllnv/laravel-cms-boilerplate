<?php

namespace App\Http\Controllers;

use App\Interfaces\ContactRepositoryInterface;
use Illuminate\Http\JsonResponse;

class ContactDataTableController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        return app()->make(ContactRepositoryInterface::class)->getContactsForDataTables();
    }
}
