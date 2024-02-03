<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view ('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $request->validate([
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'Libelle' => 'required|string',
            'Marque' => 'required|string',
            'Prix' => 'required|numeric',
            'Stock' => 'required|integer',
        ]);

        $newArticle = new Article;

        $newArticle->libelle = $request->input('Libelle');
        $newArticle->marque = $request->input('Marque');
        $newArticle->prix = $request->input('Prix');
        $newArticle->stock = $request->input('Stock');

        if ($request->hasFile('Image'))
        {
            $image = $request->file('Image');
            $extension = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
            $image->move('images/', $imageName);
            $newArticle->image = $imageName;
        }

        if ($newArticle->save()) {
            return redirect()->route('articles.show', ['article' => $newArticle->id])->with('state', 1);
        } else {
            return redirect()->route('articles.create')->with('state', 1);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article = Article::find($id);
        return view ('articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $article = Article::find($id);
        return view ('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article = Article::find($id);

        $article->libelle = $request->input('Libelle');
        $article->marque = $request->input('Marque');
        $article->prix = $request->input('Prix');
        $article->stock = $request->input('Stock');
        $article->image = $request->input('Image');

        $article->update();

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        
        $article = Article::find($id);
        if ($article) {
            $article->delete();
            return redirect()->route('articles.index')->with('success', 'article supprimé avec succès');
        } else {
            return redirect()->route('articles.index')->with('error', 'Essayer plus tard');
        }
    }
}
