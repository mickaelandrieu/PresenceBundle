<html>
  <head>
    <title>ESGI - Facebook Network</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link href="./ui/css/bootstrap.min.css" rel="stylesheet">
	  <script src="http://www.google.com/jsapi"></script>
    <script type="text/javascript" src="./ui/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="./ui/js/facebook.js"></script>
    <script type="text/javascript" src="./ui/js/news.js"></script>
  </head>
  <body>
    <div class="container">
      <h2 class="well"> Réseau des étudiants de l'ESGI </h2>

      <!-- appel au module de vérification de la connexion -->
      <div class="span12">  
      </div>

      <div id="fb-root"></div>
      
      <br><br><br>
      <!-- Appel au formulaire -->
      <div class="span3" id="personForm">
        <?php
          //echo $personForm;
        ?>

        <h3>A propos de vous </h3>
        <p class="alert alert-info">Remplir le formulaire vous donne l'accès aux news complètes !</p>
        <form id="myBeautifulForm" class="form form-vertical" action="#" method="post">
          <label for="first_name">Prénom :</label>
            <input id="first_name" name="first_name" type="text"/>
          <span class="alert alert-error" id="first_name-error" style="display: none;"></span>

          <label for="last_name">Nom :</label>
            <input id="last_name" name="last_name" type="text"/>
          <span class="alert alert-error" id="last_name-error" style="display: none;"></span>

          <label for="age">Age :</label>
            <input id="age" name="age" type="text"/>
          <span class="alert alert-error" id="age-error" style="display: none;"></span>

          <label for="email">Email :</label>
            <input id="email" name="email" type="text"/>
          <span class="alert alert-error" id="age-error" style="display: none;"></span>

          <label for="formation">Formation :</label>
            <select name="formation">
              <option value="1">1<sup>ière</sup> année</option>
              <option value="2">2<sup>ième</sup> année</option>
              <option value="3">3<sup>ième</sup> année</option>
              <option value="4">4<sup>ième</sup> année</option>
              <option value="5">5<sup>ième</sup> année</option>
            </select>
          <span class="alert alert-error" id="age-error" style="display: none;"></span>
          <br><br>
          
          <input class="btn btn-primary" type="submit" value="Valider ce joli formulaire"/>
        </form>
      
      </div>
      
      <!-- bouton de publication sur son propre mur -->
      <a onclick="publication()" href="#">Publier sur le mur</a>



      <!-- liste des news -->
      <ul id="news" class="unstyled" style="height: 300px;">
        <div class="post_results" id="post_results2" rss_num="5" rss_url="http://www.science.gouv.fr/fr/flux-rss/bdd/flux/15/format/RSS2.0">
            <div class="loading_rss">
              <span>En attente de Google...</span>
            </div>

        </div>
        <div style="clear:both;"></div>

      </ul>

    </div> <!-- fin news -->
    <!-- insertion d'un bouton -->
      <div class="fb-like" data-send="false" data-layout="standard" data-width="450" data-show-faces="false" data-action="like" data-colorscheme="light"></div>
      

      <!-- liste des amis -->
      <div id="friends"></div>
  </body>
</html>
