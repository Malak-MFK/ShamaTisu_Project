<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Produit::all();
        return view ('produits.index', ['produits' => $produits]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('produits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'Libelle' => 'required|string',
            'Marque' => 'required|string',
            'Prix' => 'required|numeric',
            'Stock' => 'required|integer',
        ]);

        $newProduct = new Produit;

        $newProduct->libelle = $request->input('Libelle');
        $newProduct->marque = $request->input('Marque');
        $newProduct->prix = $request->input('Prix');
        $newProduct->stock = $request->input('Stock');

        if ($request->hasFile('Image'))
        {
            $image = $request->file('Image');
            $extension = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $extension;
            $image->move('images/', $imageName);
            $newProduct->image = $imageName;
        }

        if ($newProduct->save()) {
            return redirect()->route('produits.show', ['produit' => $newProduct->id])->with('state', 1);
        } else {
            return redirect()->route('produits.create')->with('state', 1);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produit = Produit::find($id);
        return view ('produits.show', ['produit' => $produit]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produit = Produit::find($id);
        return view ('produits.edit', ['produit' => $produit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produit = Produit::find($id);

        $produit->libelle = $request->input('Libelle');
        $produit->marque = $request->input('Marque');
        $produit->prix = $request->input('Prix');
        $produit->stock = $request->input('Stock');
        $produit->image = $request->input('Image');

        $produit->update();

        return redirect()->route('produits.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produit = Produit::find($id);
        if ($produit) {
            $produit->delete();
            return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès');
        } else {
            return redirect()->route('produits.index')->with('error', 'Essayer plus tard');
        }
    }
}
