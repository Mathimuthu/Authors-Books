@extends('layout')

@section('content')
<style>
    .author-background {
        background-image: url('{{ asset('images/author.webp') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        padding: 100px 0;
        color: white;
        text-align: center;
    }

    .author-background::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background-color: rgba(0, 0, 0, 0.6); /* Dark overlay for contrast */
        z-index: 1;
    }

    .author-content {
        position: relative;
        z-index: 2;
    }

    .list-group-item {
        background-color: rgba(255, 255, 255, 0.9);
        color: #000;
    }

    .btn-outline-primary {
        margin-top: 20px;
    }
</style>

<div class="author-background">
    <div class="container author-content">
        <h2 class="display-4">{{ $author->name }}</h2>
        <p class="lead">{{ $author->bio }}</p>

        <h4 class="mt-5">Books by this Author:</h4>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="list-group">
                    @forelse($author->books as $book)
                        <a href="{{ route('books.show', $book->id) }}" class="list-group-item list-group-item-action">
                            {{ $book->title }}
                        </a>
                    @empty
                        <div class="list-group-item">
                            <em>No books available.</em>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <a href="{{ route('authors.index') }}" class="btn btn-outline-primary">Back to Authors</a>
    </div>
</div>
@endsection
