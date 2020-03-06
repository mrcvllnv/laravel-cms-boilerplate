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
            ->editColumn('address', function ($organization) {
                return '
                    <div class="text-truncate ml-2">
                        <a href="#" class="text-body d-block">'. $organization->address .'</a>
                        <small class="d-block text-muted text-truncate mt-n1">' . $organization->city . ', ' . $organization->region . ' ' . $organization->postal_code . ' ' . $organization->country . '</small>
                    </div>
                ';
            })
            ->addColumn('action', function($organization){
                return view('organizations.partials.action', compact('organization'))->toHtml();
            })
            ->rawColumns(['address', 'action'])
            ->make(true);
    }
}
