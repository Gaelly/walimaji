<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container"> 
            <div class="navbar-header">
                <a href="{{ url('/') }}" class="navbar-brand"><b>{{ config("APP_NAME", "Walimaji") }}</b></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <form class="navbar-form navbar-left" role="search" action="" method="GET">
                    @csrf

                    <div class="form-group">
                        <input type="text" name="q" class="form-control" id="navbar-search-input" placeholder="Rechercher...">
                    </div>
                </form>
            </div>
            <div class ="collapse navbar-collapse pull-right" id="navbar-collapse identification">
                <ul class = "nav navbar-right" >
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sidentifier <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('login') }}">Connexion</a></li>
                            <li><a href="{{ route('register2') }}">Inscription</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('password.request') }}">Mot de passe oublié ?</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>