<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Message;
use App\Models\Produit;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    
    public function produits()
    {
        $produits = Produit::latest()->get();
        return view('site.produits', compact('produits'));
    }

    
    public function blog()
    {
        $articles = Article::orderBy('date_publication', 'desc')->get();
        return view('site.blog', compact('articles'));
    }
    public function contact()
    {
        return view('site.contact');
    }
    public function envoyerMessage(Request $request)
    {
        $data = $request->validate([
            'prenom'    => 'required|string|max:255',
            'nom'       => 'required|string|max:255',
            'telephone' => 'required|string|max:30',
            'email'     => 'required|email|max:255',
            'service'   => 'required|string|max:255',
            'sujet'     => 'required|string|max:255',
            'message'   => 'required|string',
        ]);

        Message::create($data);

        return back()->with('success', 'Votre message a bien été envoyé. Merci !');
    }
}
