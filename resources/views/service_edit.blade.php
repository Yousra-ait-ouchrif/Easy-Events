@extends('layouts')
@section('title', 'edit')
@section('content1')
@endsection
@section('content')
<div class="form-section" style="padding: 30px; max-width: 600px; margin: auto;">

    <h2>Modifier le service</h2>

    <form method="POST" action="{{ route('service.update', $service->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label style="color: gray;" for="titre">Titre</label>
            <input type="text" name="titre" value="{{ old('titre', $service->titre) }}" required class="form-control">
        </div>

        <div class="form-group">
            <label for="description" style="color: gray;">Description</label>
            <textarea name="description" required class="form-control">{{ old('description', $service->description) }}</textarea>
        </div>

        <div class="form-group">
            <label style="color: gray;" for="prix">Prix</label>
            <input type="number" name="prix" step="0.01" value="{{ old('prix', $service->prix) }}" required class="form-control">
        </div>

        <button type="submit" class="submit-btn">Modifier</button>
    </form>
</div>
@endsection
