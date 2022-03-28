<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('id', 'DESC')->paginate(7);
        return view('Admin.contacts.index', compact('contacts'));
    }
}
