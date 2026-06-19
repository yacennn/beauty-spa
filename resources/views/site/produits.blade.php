@extends('layouts.site')

@section('title', 'Our Products — Beauty Spa')

@section('content')
<div class="section-head">
    <div class="eyebrow"></div>
    <h1><strong>Products</strong></h1>
</div>

<div class="products-grid">
    @forelse($produits as $index => $produit)
        <div class="product-card">
            <div class="thumb" style="background-color: #e2f0d9; display: flex; align-items: center; justify-content: center; overflow: hidden; border-radius: 30px;">
                @php
                    
                    $spaImages = [
                        'https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?q=80&w=500&auto=format&fit=crop',
                        'https://images.unsplash.com/photo-1556228578-0d85b1a4d571?q=80&w=500&auto=format&fit=crop', 
                        'https://images.unsplash.com/photo-1598440947619-2c35fc9aa908?q=80&w=500&auto=format&fit=crop', 
                        'https://images.unsplash.com/photo-1615396899839-c99c121888b0?q=80&w=500&auto=format&fit=crop', 
                        'https://images.unsplash.com/photo-1616683693504-3ea7e9ad6fec?q=80&w=500&auto=format&fit=crop', 
                        'https://images.unsplash.com/photo-1506126613408-eca07ce68773?q=80&w=500&auto=format&fit=crop', 
                        'https://images.unsplash.com/photo-1515688594390-b649af70d282?q=80&w=500&auto=format&fit=crop'           
                    ];
                   
                    $currentImage = $spaImages[$index % count($spaImages)];
                @endphp

                <img src="{{ $currentImage }}" alt="{{ $produit->nom }}" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <h3>{{ $produit->nom }}</h3>
            <div>
                <span class="price">${{ number_format($produit->prix, 2) }}</span>
                @if($produit->ancien_prix)
                    <span class="old-price">${{ number_format($produit->ancien_prix, 2) }}</span>
                @else
                    <span class="old-price">$55 </span>
                @endif
            </div>
            <a href="#" class="btn">View</a>
        </div>
    @empty
        <p>Aucun produit disponible pour le moment.</p>
    @endforelse
</div>
@endsection