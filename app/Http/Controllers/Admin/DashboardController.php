<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Message;
use App\Models\Produit;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'produits' => Produit::count(),
            'articles' => Article::count(),
            'messages' => Message::count(),
        ];

        $derniersMessages = Message::latest()->take(5)->get();
        $derniersProduits = Produit::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'derniersMessages', 'derniersProduits'));
    }
}
