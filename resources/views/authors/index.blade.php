@extends('layout')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="mb-0">Authors List</h2>
      <a href="{{ route('authors.create') }}" class="btn btn-primary mb-0"><i class="bi bi-person-plus"></i> Add Author</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="table-responsive">
        <table id="authorsTable" class="table table-striped table-bordered shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Books Count</th>
                    <th>Actions</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $author)
                    <tr>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->books_count }}</td>
                        <td>
                            <a href="{{ route('authors.show', $author) }}" class="btn btn-info btn-sm" title="View"><i class="bi bi-eye"></i></a>
                            <a href="{{ route('authors.edit', $author) }}" class="btn btn-warning btn-sm" title="Edit"><i class="bi bi-pencil"></i></a>
                            <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this author?');">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" title="Delete"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                        <td>{{ $author->created_at}}</td>
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
        $('#authorsTable').DataTable({
            paging: true,
            searching: true,
            pageLength: 10,
            lengthMenu: [5, 10, 25, 50],
            order: [[3, 'desc']],
        });

        setTimeout(function () {
            $('.alert-success').fadeOut('slow');
        }, 4000);
    });
</script>
@endsection
