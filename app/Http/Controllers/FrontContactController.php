<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\StoreContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;

class FrontContactController extends Controller
{
    //
    public function index()
    {
        return view('front.contact');
    }
    public function contact(StoreContactRequest $request){
        $request->validated($request->all());

        Contact::create($request->all());
        return redirect()->route('front.contact')->with('success', 'Nous avons bien reçu votre message, nous vous répondrons dans les plus brefs délais.');
    }
}
