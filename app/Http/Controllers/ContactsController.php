<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Controllers\Controller;
use App\Contact;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SampleNotification;


class ContactsController extends Controller
{
    public function index()
    {
        return view('contacts.index');
    }

    public function confirm(Request $request)
    {
        Contact::create([
            'user_id'=> auth()->id(),
            'report_name'=> request('report_name'),
            'title' =>request('title'),
            'body' =>request('body'),
        ]);

        // @ToDo メールがうまく飛ばないのでメール設定を変更るす

        /*
         $report_name = $request->input('report_name');
         $report_title = $request->input('title');
         $body = $request->input('body');
         $to = 'srg8ibnd@gmail.com';
         Mail::to($to)->send(new SampleNotification($report_name, $report_title, $body ));
        */

        return redirect('posts/contacts/complete');
    }

    public function complete()
    {
        return view('contacts.complete');
    }

}
