
@extends('layouts')

@section('title', 'Contact')
@section('content1')
@endsection
@section('content')

<div class="contact-container">
    <h2>Contactez-nous</h2>
@if(session('success'))
    <div style="color:black;" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="contact-wrapper">
        
        <form action="{{ route('contact.send') }}" method="POST" class="contact-form">
            @csrf
            
            <label for="message" style="font-family: Verdana, Geneva, Tahoma, sans-serif;">Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>
<button>
  <div class="svg-wrapper-1">
    <div class="svg-wrapper">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        width="18"
        height="18"
      >
        <path fill="none" d="M0 0h24v24H0z"></path>
        <path
          fill="currentColor"
          d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"
        ></path>
      </svg>
    </div>
  </div>
  <span>Envoyer</span>
</button>
        </form>   
<div class="contact-info">
    <h4 style="font-family: verdana;">Nos réseaux</h4>
    <p>Email : <a href="mailto:evenementsfaciles@gmail.com">evenementsfaciles@gmail.com</a></p>
    <div class="social-links">
        <a href="https://www.facebook.com" target="_blank" title="Facebook" class="facebook">
            <i class="fab fa-facebook"></i>
        </a>
        <a href="https://www.instagram.com" target="_blank" title="Instagram" class="instagram">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="https://www.twitter.com" target="_blank" title="Twitter" class="twitter">
            <i class="fab fa-twitter"></i>
        </a>
    </div>
</div>
    </div>
    <div class="about-section">
        <h3 style="font-family: verdana;">À propos de nous</h3>
        <p>Événements Faciles est votre partenaire idéal pour organiser des événements mémorables avec des services de qualité. Que vous soyez à la recherche de photographes, de traiteurs, de décorateurs ou d'autres prestataires de services, nous vous offrons une expérience sans stress pour tous vos événements.</p>
    </div>
</div>
@endsection

