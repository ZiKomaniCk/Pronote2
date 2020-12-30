<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <title>Pronote 2</title>
</head>
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('students.index')}}">Pronote 2</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('students.index')}}">Eleves</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('modules.index')}}">Modules</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('promotions.index')}}">Promotions</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" name="search" placeholder="Reherche" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Rehercher</button>
        </form>
      </div>
    </div>
  </nav>
</header>
<br>
<body>
  
  <div class="container">
    
    <h1>
      @yield('title')
    </h1>
    
    <div>
      @yield('content')
    </div>
    
  </div>
  
  <footer class="footer py-3 bg-dark" style="margin-top: 10%">
    <div class="container">
      <span class="text-muted">Copyright©ㅤㅤㅤㅤㅤㅤ Grande Ville, L'entourage, Cool Connexion, Don Dada, NRM MMS LDO 667ㅤㅤㅤㅤS/O le FLEM et Philly Flingo </span>
    </div>
  </footer>
  
  <script src="https://kit.fontawesome.com/61ccd72277.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>
