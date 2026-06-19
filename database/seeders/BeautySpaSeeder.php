<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Produit;
use Illuminate\Database\Seeder;

class BeautySpaSeeder extends Seeder
{
    public function run(): void
    {
        foreach (range(1, 8) as $i) {
            Produit::create([
                'nom'         => 'Spa',
                'prix'        => 22.00,
                'ancien_prix' => 60.00,
                'image'       => null,
            ]);
        }

        $titres = [
            'Pure Glow Spa Magazine',
            'The Wellness Sanctuary & Spa Blog',
            'Radiant Skin Tips & Spa Insider',
            'Ultimate Skin Care & Beauty Business Guide',
        ];

        foreach ($titres as $titre) {
            Article::create([
                'titre'            => $titre,
                'date_publication' => '2021-01-20',
                'auteur'           => 'Yassine Zaid',
                'description'      => "C'est un fait bien connu : quand on regarde la structure d'une page, on se laisse facilement distraire par la lecture du texte au détriment de la mise en page.",
                'image'            => null,
            ]);
        }
    }
}
