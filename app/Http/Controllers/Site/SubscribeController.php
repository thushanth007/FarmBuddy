<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\Site\SubscribeRequest;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SubscribeController extends Controller
{

    public function post_subscribe(SubscribeRequest $request) {

        $subscribe = new Subscribe();
        $subscribe->email = $request->get('sub-email');
        $subscribe->view = 0;
        $subscribe->save();

        return redirect()->back()->with('info', 'Thank you for your Subscribe.');

    }
}
