@extends('layout')

@section('content')
<h2>Add New Book</h2>

<form method="POST" action="{{ route('books.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Title</label>
        <input name="title" class="form-control" value="{{ old('title') }}" required>
        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Author</label>
        <select name="author_id" class="form-select" required>
            <option value="">Select Author</option>
            @foreach($authors as $author)
                <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>
                    {{ $author->name }}
                </option>
            @endforeach
        </select>
        @error('author_id') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <button class="btn btn-success">Create</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
