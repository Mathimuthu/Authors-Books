@extends('layout')

@section('content')
<h2>Add New Book</h2>

<form method="POST" action="{{ route('books.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Title</label>
        <input name="title" class="form-control" value="" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Author</label>
        <select name="author_id" class="form-select" required>
            <option value="">Select Author</option>
            @foreach($authors as $author)
                <option value="{{ $author->id }}">
                    {{ $author->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Create</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
