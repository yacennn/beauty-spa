<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProduitController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\MessageController;

/*
|--------------------------------------------------------------------------
| Partie publique (visiteurs)
|--------------------------------------------------------------------------
*/
Route::get('/', [SiteController::class, 'produits'])->name('home');
Route::get('/produits', [SiteController::class, 'produits'])->name('site.produits');
Route::get('/blog', [SiteController::class, 'blog'])->name('site.blog');
Route::get('/contact', [SiteController::class, 'contact'])->name('site.contact');
Route::post('/contact', [SiteController::class, 'envoyerMessage'])->name('site.contact.store');

/*
|--------------------------------------------------------------------------
| Authentification de l'administrateur
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Dashboard d'administration (espace sécurisé)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {

    // Accueil du dashboard : statistiques
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // 1. Gestion des Produits (CRUD complet + image)
    Route::resource('produits', ProduitController::class)->except(['show']);

    // 2. Gestion du Blog (CRUD complet + image)
    Route::resource('articles', ArticleController::class)->except(['show']);

    // 3. Gestion des Messages de Contact (consulter / détail / supprimer)
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
});
