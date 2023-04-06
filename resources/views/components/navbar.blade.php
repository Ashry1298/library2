<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @lang("site.languages")
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="{{route('lang.en')}}">English</a></li>
                          <li><a class="dropdown-item" href="{{route('lang.ar')}}">العربيه</a></li>
                        </ul>
                      </li>
                    @auth
                        <li class="nav-item">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('book.create') }}">
                                @lang("site.AddBook")
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('category.create') }}"> @lang("site.AddCat")</a>
                        </li>
                    @endauth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @lang("site.cat")
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                          <li><a class="dropdown-item" href="{{route('category.show',$category->id)}}">{{$category->name}}</a></li>
                          @endforeach
                        </ul>
                      </li>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('auth.login') }}">@lang('site.login')</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('auth.register') }}">@lang('site.register')</a>
                        </li>
                    @endguest
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('auth.logout') }}"> @lang("site.logout")</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
