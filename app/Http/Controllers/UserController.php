<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('back.author.index', 
            [
                'authors'=>User::where('role', 'author')->get()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('back.author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        //
        $request->validated( $request->all());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('1234567890'),
            
        ]);
        return redirect()->route('author.index')->with('success', 'Auteur ajouter avec succès.');
    }

    /**
     * Display the specified resource.
   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $author)
    {
        //
        $author = User::find($author->id);
        if (!$author) {
            return redirect()->route('author.index')->with('error', 'Auteur non trouvé.');
        }
        
        return view('back.author.create', compact('author'));
        
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $author)
    {
        //
        $request->validated( $request->all());
        $author->update($request->all());     

        return redirect()->route('author.index')->with('success', 'responsbale modifier avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $author)
    {
        //
        $author->delete();
        return back()->with('success', 'Responsable supprimer avec succès.');
    }
    
}
