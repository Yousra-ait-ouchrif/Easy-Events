
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
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

/* Header */
.header {
    background-color: #222;
    color: #fff;
    text-align: center;
    padding: 20px 0;
}

.header h1 {
    font-size: 28px;
    margin: 0;
}

/* Section du formulaire */
.form-section {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    background-color: #f4f4f4;
}

.publish-form {
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    width: 100%;
    max-width: 500px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #333;
}

.form-group input[type="text"],
.form-group input[type="number"],
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

.form-group input[type="file"] {
    width: 100%;
    padding: 10px;
    border: none;
    font-size: 16px;
}

.submit-btn {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #222;
    color: #fff;
    font-size: 18px;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.submit-btn:hover {
    background-color: #444;
}


.footer {
    background-color: #222;
    color: #fff;
    text-align: center;
    padding: 10px 0;
}
    </style>

@extends('layouts')
@section('title', 'publier')
@section('content1')
@endsection
@section('content')
@if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin: 15px 0; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif
    
    <section style="background-color: gray;" class="form-section">
         
        <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    <label style="color: black;">Titre</label>
    <input style="border: #222;" type="text" name="titre" required>

    <label style="color: black;">Description</label>
    <textarea name="description" required></textarea>

    <label style="color: black;">Prix</label>
    <input style="border: #222; " type="number" step="0.01" name="prix" required>

    <label style="color: black;">Images</label>
    <input type="file" name="images" multiple required>


    <button type="submit" class="submit-btn">Publier</button>
</form>


    </section>
    @endsection

   