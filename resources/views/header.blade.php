<nav class="navbar navbar-expand-lg navbar-light bg-light">
 
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">Accueil </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/forum')}}">Forum </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/challenge')}}">Challenges </a>
      </li>

      @if(auth()->guest())

      <li class="nav-item active">
        <a class="nav-link" href="{{url('/connexion')}}"></a>
      </li>

      @else

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Mon compte
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Mon profil</a>
          <a class="dropdown-item" href="#">Changer mes informations confidentielles</a>
         
          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{url('/signout')}}">Déconnexion</a>

        </div>
      </li>

      @endif


      


    </ul>
  

    <span class="navbar-text">
      <a class="nav-link" href="{{url('/login')}}">Connexion</a>
      <a class="nav-link" href="{{url('/register')}}">Inscription </a>
    </span>
 
  </div>
</nav>