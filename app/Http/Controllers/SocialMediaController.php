<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use App\Http\Requests\SocialMedia\StoreSocialMediaRequest;
use App\Http\Requests\SocialMedia\UpdateSocialMediaRequest;


class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('back.socialMedia.index', 
                [
                    'socialMedias' => SocialMedia::all(),
                ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('back.socialMedia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSocialMediaRequest $request)
    {
        //
        $request->validated($request->all());

        SocialMedia::create($request->all());
        return redirect()->route('socialMedia.index')->with('success', 'Reseau Social ajouté avec succes.');
    }

  

    public function edit(SocialMedia $socialMedia)
    {
        //
        return view('back.socialMedia.create', compact('socialMedia'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSocialMediaRequest $request, SocialMedia $socialMedia)
    {
        //
        $request->validated($request->all());
        $socialMedia->update($request->all());
        return redirect()->route('socialMedia.index')->with('success', 'Reseau Social modifié avec succes.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialMedia $socialMedia)
    {
        //
        $socialMedia->delete();
        return redirect()->route('socialMedia.index')->with('success', 'Reseau Social supprimé avec succes.');
    }
}
