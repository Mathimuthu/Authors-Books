<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books & Authors App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .centered-image {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
        }
        .heading {
            text-align: center;
            margin: 20px 0;
            font-size: 2rem;
            font-weight: bold;
            color: #343a40;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">📚 BooksApp</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
           <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('authors.index') }}">
                        <i class="fas fa-user-edit me-2"></i> Authors
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books.index') }}">
                        <i class="fas fa-book me-2"></i> Books
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('chatbot') }}">
                        <i class="fas fa-robot me-2"></i> Chatbot
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h1 class="heading mt-5">Welcome to the Books & Authors App</h1>
    <img src="{{ asset('images/authorbook.png') }}" class="centered-image mt-4" alt="Books App Image">
    
    {{-- Page Content --}}
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

@yield('scripts')

</body>
</html>