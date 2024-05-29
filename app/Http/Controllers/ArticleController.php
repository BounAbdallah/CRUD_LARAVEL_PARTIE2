<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleStoreRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
     public function index()
     {
         $articles = Article::latest()->paginate(5);
         return view('articles.index', compact('articles'));
     }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleStoreRequest $request)
    {
        Article::create($request->validated() + ['featured' => $request->has('featured')]);
        return redirect()->route('articles.index')
            ->with('success', 'Article créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'required|url',
            'featured' => 'boolean'
        ]);
    
        $article = Article::findOrFail($id);
        $article->update($request->all() + ['featured' => $request->has('featured')]);
    
        return redirect()->route('articles.index')->with('success', 'Un article a bien été modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Article $article)
    {
        $article->delete();
           
        return redirect()->route('articles.index')
                        ->with('success','Produit Suppromer avec  succès');
    }
}
