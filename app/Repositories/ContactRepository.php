<?php

namespace App\Repositories;

use App\Interfaces\ContactRepositoryInterface;
use App\Repositories\Repository;
use App\Contact;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\Facades\DataTables;

class ContactRepository extends Repository implements ContactRepositoryInterface
{
    /**
     * @var \App\Contact
     */
    protected $model;

    /**
     * Create new service instance.
     *
     * @param \App\Contact $contact
     */
    public function __construct(Contact $contact)
    {
        $this->model = $contact;
    }

    /**
     * Get all contacts for datatable rendering.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getContactsForDataTables(): JsonResponse
    {
        $contacts = $this->model->all();

        return DataTables::of($contacts)
            ->editColumn('contact', function ($contact) {
                return view('contacts.partials.avatar', compact('contact'))->toHtml();
            })
            ->editColumn('address', function ($contact) {
                return '
                    <div class="text-truncate ml-2">
                        <a href="#" class="text-body d-block">'. $contact->address .'</a>
                        <small class="d-block text-muted text-truncate mt-n1">' . $contact->city . ', ' . $contact->region . ' ' . $contact->postal_code . ' ' . $contact->country . '</small>
                    </div>
                ';
            })
            ->addColumn('action', function($contact){
                return view('contacts.partials.action', compact('contact'))->toHtml();
            })
            ->rawColumns(['contact', 'address', 'action'])
            ->make(true);
    }
}
