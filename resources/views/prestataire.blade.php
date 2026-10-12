
@extends('layouts')
@section('title', 'Événements Faciles')
@section('content1')
@endsection
@section('content')
<section class="prestataire-steps">
  <h2>Devenir Prestataire sur notre plateforme</h2>
  <div class="steps-container">
   
<a href="{{route('publier')}}">
<div class="step">
      
      <i class="fas fa-bullhorn"></i>
      <h3>Publier un service</h3>
      <p>Proposez vos offres à des milliers de clients potentiels.</p>
    </div>
</a>
<a href="{{route('service_prestataire')}}">
<div class="step">
      <i class="fas fa-briefcase"></i>
      <h3>Mes service</h3>
      <p>Offrez vos services et soyez rémunéré rapidement.</p>
    </div>
</a>
   
    <a href="{{route('reservation_prestataire')}}">
    <div class="step">
      <i class="fas fa-calendar-check"></i>
      <h3>Gérer les réservations</h3>
      <p>Organisez votre planning facilement et efficacement.</p>
    </div>
    </a>
   
    
    
 
  </div>
</section>

@endsection
