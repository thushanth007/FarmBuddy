<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Invitation;
use App\Models\Basic;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\SmsContactRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{

    public function __construct(ContactUs $contact)
    {
        $this->data =$contact;
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $contact = $this->data->orderBy('id', 'DESC')->paginate(10);

        return view('admin.contact.index', compact('contact'));
    }


    public function get_view($id)
    {
        $singleData = $this->data->find( $id);
        $singleData->view = 1;
        $singleData->save();

        $previous = $this->data->find( $singleData->id-1);
        $next = $this->data->find( $singleData->id+1);

        return view('admin.contact.view', compact('singleData', 'previous', 'next'));
    }

    public function force_delete($id)
    {
        $delete_file = $this->data->find($id);

        if($delete_file->delete()) {
            return redirect()->back()->with('success', 'Your data has been deleted');
        }else {
            return redirect()->back()->with('error', 'Your data has not been deleted.');
        }
    }
}
