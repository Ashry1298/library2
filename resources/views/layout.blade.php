<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="index.php">Store</a>
                            </li>
                            @auth
                            <li class="nav-item">
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('book.create')}}">Add Book</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('category.create')}}">Add Category</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="add-author.php">Add Author</a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{route('auth.logout')}}">Logout</a>
                            </li>
                            <li>
                            @endauth
                                <a class="nav-link disabled" href="#">
                                    <p></p>
                                </a>
                            </li>
    
                            @guest   
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('auth.login')}}">Login</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link " href="{{route('auth.register')}}">Register</a>
                            </li>
                            @endguest

                    </ul>
                </div>
            </div>
        </nav>
        <div class="container py-5">

            @yield('content')
        </div>


        <script src="{{ asset('js/bootstrap.js') }}"></script>
        <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
</body>

</html>
