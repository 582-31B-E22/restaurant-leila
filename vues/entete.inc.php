<!DOCTYPE html>
<html>
<head>
  <base href="<?= BASE_SERVEUR; ?>">
  <link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative:700,900|Roboto+Slab:300,700|Roboto:700,400' rel='stylesheet' type='text/css'>
  <meta charset="UTF-8">
  <meta name="robots" content="noindex, nofollow">
  <title>Accueil | Restaurant Leila</title>
  <meta name="description" content="Restaurant Leila - Montréal">
  <link rel="stylesheet" href="ressources/css/ext/normalize.css">
  <link rel="stylesheet" href="ressources/css/leila.css">
</head>
<body>
  <div id="conteneur" class="page-<?= $page; ?>">
    <header>
      <div class="barre-haut">
        <nav class="social">
          <a href="http://www.facebook.com" target="lien-externe">
            <img alt="Facebook" src="ressources/images/iu/nav-icone-facebook.svg">
          </a>
          <a href="http://www.twitter.com" target="lien-externe">
            <img alt="Twitter" src="ressources/images/iu/nav-icone-twitter.svg">
          </a>
        </nav>
        <?php if($page !== 'accueil') : ?>
        <h1 class="logo">
          <a href="accueil">LEILA</a>
        </h1>
        <?php endif; ?>
        
        <nav class="i18n">
          <a href="#" class="actif" title="Français">fr</a>
          <a href="#" title="English">en</a>
        </nav>
      </div>