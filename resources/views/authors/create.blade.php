@extends('layout')

@section('content')
<h2>Add New Author</h2>

<form method="POST" action="{{ route('authors.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input name="name" class="form-control" value="{{ old('name') }}" required>
        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Bio</label>
        <textarea name="bio" class="form-control">{{ old('bio') }}</textarea>
    </div>

    <button class="btn btn-success">Create</button>
    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
