<!DOCTYPE html>
<html>
<head>
    <title>@yield('titulo', 'TITLE')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        html, body {
            background-color: #949296;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #55156E">
        <a href="/" class="navbar-brand">SCP</a>

        <div class="collapse navbar-collapse" id="menuPrincipal">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item"> 
                    <a class="nav-link" href="{{route('areaGeral')}}">Área Geral</a>
                </li>
                <li class="nav-item"> 
                    <a class="nav-link" href="{{route('request.index')}}">Área do usuário</a>
                </li>
                @if (Auth::check() && Auth::user()->type == 1)
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('subject.index')}}">Área administrativa</a>
                    </li> 
                @endif
            </ul>               
            <ul class="navbar-nav navbar-right mr-6">
                @if (Auth::check())
                    <li class="nav-item dropdown mr-4">
                        <a class="nav-link dropdown-toogle" href="#" data-toggle="dropdown">{{Auth::user()->name}}</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">{{ csrf_field() }}
                            </form>
                        </div>
                    </li>                       
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toogle" href="#" data-toggle="dropdown">Acessar</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                            <a class="dropdown-item" href="{{ route('register') }}">Registrar</a>
                        </div>
                    </li> 
                @endif
            </ul>
            
        </div>
    </nav>

    @if( Session::has('mensagem') )
        <div class="container alert alert-secondary alert-dismissible fade show mt-2" role="alert">
            <h6 class="align-middle">{{ Session::get('mensagem') }}</h6>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @yield('conteudo')  

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">$('.alert').alert()</script>
</body>

</html>