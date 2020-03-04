<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Repositories\Repository;
use App\User;
use Illuminate\Http\JsonResponse;

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
        $users = $this->model->all();

        return datatables()->of($users)
            ->editColumn('user', function ($user) {
                return '
                    <div class="d-flex">
                        <span class="avatar mt-1"> ' . $user->initials . ' </span>
                        <div class="text-truncate ml-2">
                            <a href="#" class="text-body d-block">' . $user->full_name . '</a>
                            <small class="d-block text-muted text-truncate mt-n1">' . $user->email . '</small>
                        </div>
                    </div>
                ';
            })
            ->editColumn('created', function ($user) {
                return $user->created_at->toFormattedDateString();
            })
            ->editColumn('status', function ($user) {
                if ($user->isActive()) {
                    return '<span class="badge bg-green-lt">Active</span>';
                }
                return '<span class="badge bg-yellow-lt">Pending</span>';
            })
            ->addColumn('action', function($user){
                return '
                    <div class="dropdown">
                        <button class="btn-options" type="button" data-boundary="viewport" data-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" style="">
                            <a class="dropdown-item" href="'. route('users.edit', $user) .'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon dropdown-item-icon"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                Edit
                            </a>
                            <a class="dropdown-item text-danger" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon dropdown-item-icon"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                Delete
                            </a>
                        </div>
                    </div>
                ';
            })
            ->rawColumns(['user', 'create', 'status', 'action'])
            ->make(true);
    }
}
