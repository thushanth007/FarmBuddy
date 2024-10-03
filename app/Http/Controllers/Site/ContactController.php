<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ContactUs;
use App\Models\Setting;
use App\Http\Requests\Site\ContactRequest;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsNotificationMail;


class ContactController extends Controller
{

    public function get_contact()
    {
        $contact = Setting::where('status', 1)->first();

        return view('site.contact.index', compact('contact'));
    }

    public function post_contact(ContactRequest $request) {

        $contact_us = new ContactUs();
        $contact_us->name = $request->get('f_name'). ' ' .$request->get('l_name');
        $contact_us->phone = $request->get('phone');
        $contact_us->email = $request->get('email');
        $contact_us->message = $request->get('message');
        $contact_us->view = 0;
        $contact_us->save();

       Mail::to($contact_us->email)->send(new ContactUsNotificationMail($contact_us));

        return redirect()->back()->with('info', 'Thank you for your feedback. A manager would get back to you if a response or clarification is needed.');

    }
}
