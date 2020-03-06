<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Repositories\Repository;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Request;
use Yajra\DataTables\Facades\DataTables;

class UserRepository extends Repository implements UserRepositoryInterface
{
    /**
     * @var \App\User
     */
    protected $model;

    /**
     * Create new service instance.
     *
     * @param \App\User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * Get all users for datatable rendering.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUsersForDataTables(): JsonResponse
    {
        $users = $this->model->active()->get();

        if ($status = Request::get('status')) {
            $users = $this->filterStatus($status);
        }

        return DataTables::of($users)
            ->editColumn('user', function ($user) {
                return view('users.partials.avatar', compact('user'))->toHtml();
            })
            ->editColumn('created', function ($user) {
                return $user->created_at->toFormattedDateString();
            })
            ->editColumn('status', function ($user) {
                if (! $user->isActive()) {
                    return '<span class="badge bg-yellow-lt">Inactive</span>';
                }
                return '<span class="badge bg-green-lt">Active</span>';
            })
            ->editColumn('full_name', function ($user) {
                return $user->full_name;
            })
            ->editColumn('initials', function ($user) {
                return $user->initials;
            })
            ->addColumn('action', function($user){
                return view('users.partials.action', compact('user'))->toHtml();
            })
            ->rawColumns(['user', 'create', 'status', 'full_name', 'initials', 'action'])
            ->make(true);
    }

    /**
     * Get users with filtered status.
     *
     * @param string $status
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function filterStatus(string $status): Collection
    {
        return intval($status) < 2 
            ? $this->model->all() 
            : $this->model->inactive()->get();
    }
}
