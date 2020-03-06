<?php

namespace App\Repositories;

use App\Interfaces\OrganizationRepositoryInterface;
use App\Repositories\Repository;
use App\Organization;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class OrganizationRepository extends Repository implements OrganizationRepositoryInterface
{
    /**
     * @var \App\Organization
     */
    protected $model;

    /**
     * Create new service instance.
     *
     * @param \App\Organization $organization
     */
    public function __construct(Organization $organization)
    {
        $this->model = $organization;
    }

    /**
     * Get all organizations for datatable rendering.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOrganizationsForDataTables(): JsonResponse
    {
        $organizations = $this->model->all();

        return DataTables::of($organizations)
            ->editColumn('organization', function ($organization) {
                return view('organizations.partials.avatar', compact('organization'))->toHtml();
            })
            ->addColumn('action', function($organization){
                return view('organizations.partials.action', compact('organization'))->toHtml();
            })
            ->rawColumns(['organization', 'action'])
            ->make(true);
    }
}
