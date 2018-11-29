<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
      @for($i = 0; $i < $Count; $i++)

        <li class="nav-item{{ $Active[$i] }}">
          <a class="nav-link" href="/{{ $UrlNames[$i] }}">
            {{ $Names[$i] }}          
          </a>
        </li>

      @endfor
     
    </ul>
  </div>