@extends('layout')

@section('content')
<h2>Edit Author</h2>

<form method="POST" action="{{ route('authors.update', $author) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input name="name" class="form-control" value="{{ old('name', $author->name) }}" required>
        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Bio</label>
        <textarea name="bio" class="form-control">{{ old('bio', $author->bio) }}</textarea>
    </div>

    <button class="btn btn-success">Update</button>
    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
