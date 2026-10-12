
@extends('layouts')
@section('title', 'Service')
@section('content1')
@endsection
@section('content')


    <h1 style="color: black;">Nos Services</h1>
    <p style="color: dimgray;">Recherchez et réservez les services pour vos événements.</p>
    <form action="{{ route('services.search') }}" method="GET">   
        <input type="text" name="q" placeholder="Rechercher un service..." value="{{ request('q') }}">
        <button class="recherche" type="submit">Rechercher</button>
    </form>
    <section class="services">
   
    <div class="services-container">
        @foreach($services as $service)
<div class="service">
@if($service->images && $service->images->count() > 0)
    <img src="{{ asset('storage/' . $service->images->first()->image_path) }}" alt="{{ $service->titre }}">
@else
    <p style="color: black;">pas d'images</p>
@endif




    <p>{{ $service->titre }}</p>
    <p>{{ $service->prix }} DH</p>

    @php
        $evaluations = \App\Models\Evaluation::where('service_id', $service->id)->get();
        $avgRate = $evaluations->avg('rate');
        $countEval = $evaluations->count();
    @endphp

    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:10px;">
        <div>
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= round($avgRate))
                    <span style="color: orange; font-size: 16px;">&#9733;</span>
                @else
                    <span style="color: #ccc; font-size: 16px;">&#9733;</span>
                @endif
            @endfor
        </div>
        <div style="font-size: 14px; color: #555;">
            ({{ $countEval }} avis)
        </div>
    </div>

    <a href="{{ route('service_show', $service->id) }}" class="reserver">Voir détails</a>
</div>

@endforeach

    </div>

</section>





@endsection
