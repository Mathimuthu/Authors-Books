@extends('layout')

@section('content')

<style>
    body {
        background-image: url('{{ asset('images/books.jpg') }}');
        background-size: cover; /* Cover the entire screen */
        background-position: center;
        background-attachment: fixed;
        background-repeat: no-repeat;
        color: white; /* Ensures text is readable on the background */
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Dark overlay for better contrast */
    }

    .content {
        position: relative;
        z-index: 1; /* Ensures the content is above the overlay */
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh; /* Full screen height */
        text-align: center; /* Centers the text */
    }

    .book-info {
        background-color: rgba(0, 0, 0, 0.7); /* Slight dark background for readability */
        padding: 20px;
        border-radius: 10px;
        max-width: 80%; /* Adjusts width for better layout */
        margin: 0 auto;
    }

    .btn-custom {
        background-color: #9b7575;
        border: none;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
    }

    .btn-custom:hover {
        background-color: #7e5b5b;
    }
</style>

<div class="overlay"></div>

<div class="content">
    <div class="book-info">
        <h2 class="display-4">{{ $book->title }}</h2>
        <p class="lead">By <strong>{{ $book->author->name }}</strong></p>
        <hr>
        <p>{{ $book->description }}</p>
        <a href="{{ route('books.index') }}" class="btn-custom mt-3">Back to Books</a>
    </div>
</div>

@endsection
