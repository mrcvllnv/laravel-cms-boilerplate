<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fetch()
    {
        $users = User::all();

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
                            <a class="dropdown-item" href="#">
                            Action
                            </a>
                            <a class="dropdown-item" href="#">
                            Another action
                            </a>
                        </div>
                    </div>
                ';
            })
            ->rawColumns(['user', 'create', 'status', 'action'])
            ->make(true);
    }
}
