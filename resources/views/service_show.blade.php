<style>.service-images {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    justify-content: center; /* يوسط الصور */
    margin-top: 15px;
}

.service-images img {
    width: 150px;      /* حجم ثابت للصور */
    height: 150px;     /* يخليهم مربعين */
    object-fit: cover; /* يقص الصورة بطريقة متناسقة */
    border-radius: 8px; /* زوايا مدورة */
    box-shadow: 0 2px 5px rgba(0,0,0,0.15); /* ظل خفيف تحت الصور */
    transition: transform 0.3s ease;
    cursor: pointer;
}

.service-images img:hover {
    transform: scale(1.05); /* تكبير خفيف لما تحوم عليه بالماوس */
}
</style>
@extends('layouts')

@section('title', $service->titre)
@section('content1')
@endsection
@section('content')




    <h1 style="color:black">{{ $service->titre }}</h1>
<div class="service-images" style="display: flex; gap: 10px; flex-wrap: wrap;">
    
@if($service->images && $service->images->count() > 0)
    <img src="{{ asset('storage/' . $service->images->image_path) }}" alt="{{ $service->titre }}">
@else
    <p style="color: black;">pas d'images</p>
@endif





</div>

    <p style="color:black">Prix : {{ $service->prix }} DH</p>
    <a href="{{ route('reservation.form', $service->id) }}" class="reserver">Réserver</a>

    <hr>


    {{-- Autres services du même prestataire --}}
    <div class="autres-services" style="margin-top: 30px;">
        <h3 style="color: #666; font-size: 10px;">Autre sevices</h3>
        <div class="service-grid" style="display: flex; flex-wrap: wrap; gap: 20px;">
            @foreach($autresServices as $srv)
                <div class="service-card" style="width: 200px;">
@if($service->images && $service->images->count() > 0)
    <img src="{{ asset('storage/' . $service->images->first()->image_path) }}" alt="{{ $service->titre }}">
@else
    <p style="color: black;">pas d'images</p>
@endif

                    <p style="color: black;">{{ $srv->titre }}</p>
                    <a href="{{ route('service_show', $srv->id) }}">Voir détails</a>
                </div>
            @endforeach
        </div>
    </div>

    <hr>

    <div style="margin-top: 30px; color:black">
        <h3>Commentaires des clients</h3>
        @foreach($evaluations as $eval)
            @if($eval->comment)
                <div style="margin-bottom: 10px; border-bottom:1px solid #eee; padding-bottom: 10px;">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $eval->rate)
                            <span style="color: gold; font-size: 16px;">&#9733;</span>
                        @else
                            <span style="color: #ccc; font-size: 16px;">&#9733;</span>
                        @endif
                    @endfor
                    <p>{{ $eval->comment }}</p>
                </div>
            @endif
        @endforeach
        @if($evaluations->count() === 0)
            <p style="font-size: small;">Aucun commentaire pour le moment.</p>
        @endif
    </div>

 
    @auth
    <form class="evaluation-form" action="{{ route('evaluation.store') }}" method="POST" style="margin-top: 30px;">
        @csrf
        <input type="hidden" name="service_id" value="{{ $service->id }}">
        
        <div class="rating">
        <input value="1" name="rate" id="star1" type="radio">
        <label for="star1"></label>
        <input value="2" name="rate" id="star2" type="radio">
        <label for="star2"></label>
        <input value="3" name="rate" id="star3" type="radio" checked>
        <label for="star3"></label>
        <input value="4" name="rate" id="star4" type="radio">
        <label for="star4"></label>
        <input value="5" name="rate" id="star5" type="radio">
        <label for="star5"></label>
    </div>

        <label for="comment">Commentaires</label>
        <textarea name="comment" rows="4" placeholder="Laissez un commentaire (facultatif)" style="width: 100%;"></textarea>

        <button type="submit">Envoyer évaluation</button>
    </form>
    @endauth
@endsection
