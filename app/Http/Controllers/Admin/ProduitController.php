<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
   
    public function index()
    {
        $produits = Produit::latest()->paginate(10);
        return view('admin.produits.index', compact('produits'));
    }

    public function create()
    {
        return view('admin.produits.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom'         => 'required|string|max:255',
            'prix'        => 'required|numeric|min:0',
            'ancien_prix' => 'nullable|numeric|min:0',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('produits', 'public');
        }

        Produit::create($data);

        return redirect()->route('admin.produits.index')
                         ->with('success', 'Produit ajouté avec succès.');
    }

    
    public function edit(Produit $produit)
    {
        return view('admin.produits.edit', compact('produit'));
    }

    
    public function update(Request $request, Produit $produit)
    {
        $data = $request->validate([
            'nom'         => 'required|string|max:255',
            'prix'        => 'required|numeric|min:0',
            'ancien_prix' => 'nullable|numeric|min:0',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($produit->image) {
                Storage::disk('public')->delete($produit->image);
            }
            $data['image'] = $request->file('image')->store('produits', 'public');
        }

        $produit->update($data);

        return redirect()->route('admin.produits.index')
                         ->with('success', 'Produit modifié avec succès.');
    }

    
    public function destroy(Produit $produit)
    {
        if ($produit->image) {
            Storage::disk('public')->delete($produit->image);
        }
        $produit->delete();

        return redirect()->route('admin.produits.index')
                         ->with('success', 'Produit supprimé.');
    }
}
