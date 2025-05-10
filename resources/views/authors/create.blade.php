@extends('layout')

@section('content')
<h2>Add New Author</h2>

<form method="POST" action="{{ route('authors.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input name="name" class="form-control" value="" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Bio</label>
        <textarea name="bio" class="form-control" required></textarea>
    </div>

    <button class="btn btn-success">Create</button>
    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection
@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const nameInput = document.querySelector('input[name="name"]');
    const nameError = document.createElement('div');
    nameError.className = 'text-danger mt-1';
    nameInput.parentNode.appendChild(nameError);

    nameInput.addEventListener('input', function () {
        const regex = /^[a-zA-Z\s]*$/;
        if (!regex.test(nameInput.value)) {
            nameError.textContent = 'Only letters and spaces are allowed.';
        } else {
            nameError.textContent = '';
        }
    });
});
</script>
@endsection

