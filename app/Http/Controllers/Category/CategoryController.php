<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('back.category.index', compact('categories'));

        return view('back.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("back.category.create");
    }

    /**
     * Store a newly created resource in storage.
     */







    //  public function store(StoreCategoryRequest $request)
    //  {
    //      $data = $request->validated(); // ici, 'isActive' est bien inclus dans les règles de validation
    //      Category::create($data);
     
    //      return redirect()->route('category.index')->with('success', 'Catégorie ajoutée avec succès.');
    //  }
     

    public function store(StoreCategoryRequest $request)
    {
        //
        $request->validated($request->validated());
        Category::create($request->all());
        return redirect()->route('category.index')->with('success', 'Category ajouter avec succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
        return view('back.category.create', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     */
   

    public function update(UpdateCategoryRequest $request, Category $category)
{
    $category->update($request->validated());
    return redirect()->route('category.index')->with('success', 'Catégorie mise à jour avec succès.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //

        
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Catégorie supprimée avec succès.');
    }
}
