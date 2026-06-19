@extends('layouts.site')

@section('title', 'Contact Us — Beauty Spa')

@section('content')
<div class="section-head">
    <h1><strong>Contact</strong> Us</h1>
</div>

<div class="contact-wrap">
    <div class="contact-info">
        <h2>Talk With Us!</h2>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking.</p>
        <dl>
            <dt>Phone:</dt>   <dd>+212 6759428511</dd>
            <dt>Email:</dt>   <dd>yassinezaid@icloud.com</dd>
            <dt>Address:</dt> <dd>RUE ABDELKRIME LKHATABI<br>MARRAKECH</dd>
        </dl>
    </div>
    <form class="contact-form" action="{{ route('site.contact.store') }}" method="POST">
        @csrf

        @if(session('success'))
            <div class="flash-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <div>
                <input type="text" name="prenom" placeholder="First Name" value="{{ old('prenom') }}">
                @error('prenom') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div>
                <input type="text" name="nom" placeholder="Last Name" value="{{ old('nom') }}">
                @error('nom') <div class="error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="row">
            <div>
                <input type="text" name="telephone" placeholder="Phone Number" value="{{ old('telephone') }}">
                @error('telephone') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
                @error('email') <div class="error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="row">
            <div>
                <select name="service">
                    <option value="" disabled {{ old('service') ? '' : 'selected' }}>Service</option>
                    @foreach(['Massage', 'Soin du visage', 'Manucure', 'Hammam', 'Autre'] as $s)
                        <option value="{{ $s }}" {{ old('service') === $s ? 'selected' : '' }}>{{ $s }}</option>
                    @endforeach
                </select>
                @error('service') <div class="error">{{ $message }}</div> @enderror
            </div>
            <div>
                <input type="text" name="sujet" placeholder="Subject" value="{{ old('sujet') }}">
                @error('sujet') <div class="error">{{ $message }}</div> @enderror
            </div>
        </div>

        <div>
            <textarea name="message" placeholder="Your Comment Here">{{ old('message') }}</textarea>
            @error('message') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="send">
            <button type="submit" class="btn">Send</button>
        </div>
    </form>
</div>
@endsection
