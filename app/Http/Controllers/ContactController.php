<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('back.contact', [
            'contacts' => Contact::all()
        ]);
    }

   
    public function destroy(Contact $contact)
    {
        //
        $contact->delete();
        return redirect()->back()->with('success', 'Contact supprimé avec succès');
    }
}
