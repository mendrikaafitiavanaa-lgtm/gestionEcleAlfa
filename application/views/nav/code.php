<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Horizontal Bootstrap</title>
    <!-- Lien vers le CSS de Bootstrap 5 -->
    <link href="https://jsdelivr.net" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">MonSite</a>
    <!-- Bouton hamburger pour mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Liens du menu -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto"> <!-- ms-auto aligne le menu à droite -->
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Fonctionnalités</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Tarifs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Désactivé</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- JavaScript de Bootstrap 5 -->
<script src="https://jsdelivr.net"></script>
</body>
</html>


<!-- Exemple : Navbar fond bleu, texte clair -->
<nav class="navbar navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
  </div>
</nav>