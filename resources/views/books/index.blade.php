@extends('layout')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="mb-4">Books</h2>
      <a href="{{ route('books.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i> + Add Book</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="table-responsive">
        <table id="booksTable" class="table table-striped table-bordered shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td>
                            <a href="{{ route('books.show', $book) }}" class="btn btn-info btn-sm" title="View"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm" title="Edit"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this book?');">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#booksTable').DataTable({
            paging: true,
            searching: true,
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50],
            order: [[0, 'asc']],
        });
    });
</script>
@endsection
