<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('date_publication', 'desc')->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titre'            => 'required|string|max:255',
            'date_publication' => 'required|date',
            'auteur'           => 'required|string|max:255',
            'description'      => 'required|string',
            'image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        Article::create($data);

        return redirect()->route('admin.articles.index')
                         ->with('success', 'Article publié avec succès.');
    }
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }
    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'titre'            => 'required|string|max:255',
            'date_publication' => 'required|date',
            'auteur'           => 'required|string|max:255',
            'description'      => 'required|string',
            'image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')
                         ->with('success', 'Article modifié avec succès.');
    }
    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        $article->delete();

        return redirect()->route('admin.articles.index')
                         ->with('success', 'Article supprimé.');
    }
}
