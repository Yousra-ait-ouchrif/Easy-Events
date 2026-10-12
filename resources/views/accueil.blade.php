
    <style>
        
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    line-height: 1.6;
}

.services-section {
    margin-top: 50px;
    background-color:#f4f4f4;
    padding: 20px 0;
    text-align: center;
}

.service-grid {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 20px;
}

.service-card {
    background-color:rgb(130, 126, 126);
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px;
width: 235px; 
transition: transform 0.3s ease;
}
.service-card:hover {
    transform: scale(1.03);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
}

.service-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 8px;
}




.service-card h3 {
    margin-top: 10px;
    font-size: 18px;
    font-weight: bold;
    color: #333;
}

.view-more {
    display: block;
    margin-left: 1000px ;
    text-decoration: none;
    color:rgb(7, 94, 187);
    font-size: 15px;
    font-weight: bold;
}

.popular-providers-section {
    background-color: #f4f4f4;
    padding: 20px 0;
    text-align: center;
}

.provider-grid {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 20px;
}

.provider-card {
    background-color:rgb(216, 215, 215);
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 15px;
    width: calc(25% - 20px);
    text-align: center;
    transition: transform 0.3s ease;
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    line-height: 1.6;
}

.services-section {
    background-color: #fff;
    padding: 20px 0;
    text-align: center;
}

.service-grid {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 20px;
}





.service-card h3 {
    margin-top: 10px;
    font-size: 18px;
    font-weight: bold;
    color: #333;
}

.view-more {
    display: block;
    margin: 20px auto 0;
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

.popular-providers-section {
    background-color: #fff;
    padding: 20px 0;
    text-align: center;
}

.provider-grid {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 20px;
}

.provider-card {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px; 
    width: calc(25% - 20px); 
    text-align: center;
    transition: transform 0.3s ease;
    }

.provider-card:hover {
    transform: scale(1.05); 
    box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2); 
}

.provider-card img {
    width: 150px; 
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
}

.provider-card h3 {
    margin-top: 15px; 
    font-size: 20px; 
    font-weight: bold;
    color: #333;
}

.provider-card p {
    font-size: 16px; 
    color: #666;
}
}

.provider-card img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
}

.provider-card h3 {
    margin-top: 10px;
    font-size: 16px;
    font-weight: bold;
    color: #333;
}

.provider-card p {
    font-size: 14px;
    color: #666;
}
    </style>

@extends('layouts')
@section('content')

    
    <section class="services-section">
    <div class="service-grid">
        @foreach($popularServices as $service)
        <div class="service-card">
            <a href="{{ route('service_show', $service->id) }}">
@if($service->images && $service->images->count() > 0)
    <img src="{{ asset('storage/' . $service->images->first()->image_path) }}" alt="{{ $service->titre }}">
@else
    <p style="color: black;">pas d'images</p>
@endif
                <h3>{{ $service->titre }}</h3>
                <p style="color: black;">{{ $service->prix }} DH</p>
            </a>
        </div>
        @endforeach
    </div>
    <a href="{{ route('service') }}" class="view-more">Voir Plus</a>
</section>


    
    <section class="popular-providers-section">
    <h2>Prestataires Populaires</h2>
    <div class="provider-grid">
        @foreach($popularPrestataires as $prestataire)
        <div class="provider-card">
            <a href="{{ route('prestataire_profile', $prestataire->id) }}">
                <img src="{{ asset('storage/' . $prestataire->image) }}" alt="{{ $prestataire->name }}">
                <h3>{{ $prestataire->name }}</h3>
                <p>{{ $prestataire->email }}</p>
                <p>Prestataire</p>
            </a>
        </div>
        @endforeach
    </div>
</section>


@endsection
