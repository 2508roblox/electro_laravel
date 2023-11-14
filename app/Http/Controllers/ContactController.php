<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    function index(Request $request)
    {


        $contacts = Contact::all();
        return view('frontend.pages.contact' );
    }

function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'firstname' => 'required|max:255',
        'lastname' => 'required|max:255',
        'subject' => 'required|max:255',
        'message' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $contact = new Contact();
    $contact->firstname = $request->input('firstname');
    $contact->lastname = $request->input('lastname');
    $contact->subject = $request->input('subject');
    $contact->message = $request->input('message');
    $contact->save();

    return redirect()->back()->with('success', 'Contact added successfully!');
}
}
