@extends('layouts.site')

@section('title', 'Our Blogs — Beauty Spa')

@section('content')
<div class="section-head">
    <div class="eyebrow"></div>
    <h1><strong>Blogs</strong></h1>

@php
    $featured = $articles->first();
    $autres   = $articles->skip(1)->take(3);

   
    $blogImages = [
        'https://images.unsplash.com/photo-1544161515-4ab6ce6db874?q=80&w=600&auto=format&fit=crop', // تصويرة للمقال الرئيسي (المساج)
        'https://images.unsplash.com/photo-1515377905703-c4788e51af15?q=80&w=500&auto=format&fit=crop', // مقال 2 (ماسك للوجه)
        'https://images.unsplash.com/photo-1607604276583-eef5d076aa5f?q=80&w=500&auto=format&fit=crop', // مقال 3 (منتجات طبيعية)
        'https://images.unsplash.com/photo-1519699047748-de8e457a634e?q=80&w=500&auto=format&fit=crop'  // مقال 4 (الاسترخاء)
    ];
@endphp

@if($featured)
<div class="blog-layout">
    <div class="blog-featured">
        <div class="photo" style="background-color: #e2f0d9; display: flex; align-items: center; justify-content: center; overflow: hidden; border-radius: 30px;">
            <img src="{{ $blogImages[0] }}" alt="{{ $featured->titre }}" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div class="meta">
            {{ $featured->date_publication->format('d-M-Y') }}
            <span class="sep">|</span> Blog by: {{ $featured->auteur }}
        </div>
        <h2>{{ $featured->titre }}</h2>
        <p>{{ Str::limit($featured->description, 220) }}</p>
        <a href="#" class="btn">View Details</a>
    </div>
    <div class="blog-side">
        @foreach($autres as $index => $article)
            <div class="post">
                <div class="photo" style="background-color: #e2f0d9; display: flex; align-items: center; justify-content: center; overflow: hidden; border-radius: 20px; min-width: 120px; height: 120px;">
                    @php
                        $currentImage = $blogImages[($index + 1) % count($blogImages)];
                    @endphp
                    <img src="{{ $currentImage }}" alt="{{ $article->titre }}" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div>
                    <h3>{{ $article->titre }}</h3>
                    <div class="meta">
                        {{ $article->date_publication->format('d-M-Y') }}
                        <span class="sep">|</span> Blog by: {{ $article->auteur }}
                    </div>
                    <p>{{ Str::limit($article->description, 110) }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@else
    <p style="text-align:center;padding-bottom:60px">Aucun article publié pour le moment.</p>
@endif
@endsection