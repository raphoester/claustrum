<nav class="navbar navbar-expand-lg navbar-light bg-light">
 
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Accueil </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Forum </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Challenges </a>
      </li>

      @if(auth()->guest())

      <li class="nav-item active">
        <a class="nav-link" href="{{url('/connexion')}}">Connexion/Inscription </a>
      </li>

      @else

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Mon compte
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Mon profil</a>
          <a class="dropdown-item" href="#">Changer mes informations confidentielles</a>
          <a class="dropdown-item" href=" {{url('/news_feed')}}">Newsfeed</a>
          <a class="dropdown-item" href=" {{url('/dashboard')}}">Dashboard</a>
         
          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{url('/signout')}}">Déconnexion</a>

        </div>
      </li>

      @endif


      


    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>