<?php
/**
 * Fichier de mise en page
 * @author Christian Bonhomme
 * @version 1.0
 * @package PROJET-MOOC
 */

// Classe d'affichage des fichiers HTML
$vhtml = new VHtml();

// Classe d'affichage de la naigation
$vnav = new VNav();

// Classe d'affichage des parties gauche et droite
$vaside = new VAside();

// Tableau variable
global $content;
// Classe variable
$vcontent = new $content['class']();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">
<head>
 <meta charset="utf-8" />
 <title><?= $content['title']?></title>
 <?= $content['meta']?>
 <link rel="icon" type="image/png" href="../Img/e-www.png" />
 <link rel="stylesheet" type="text/css" href="../Css/e-www.css" />
</head>

<body>

 <header>
  <?php $vnav->showNav()?>
 </header>

 <aside>
  <?php $vaside->showAsideLeft() ?>
 </aside>

 <div id="content">
  <?php $vcontent->{$content['method']}($content['arg']) ?>
 </div><!-- id="content" -->

 <aside>
  <?php $vaside->showAsideRight() ?>
 </aside>

 <footer>
  <?php $vhtml->showHtml('../Html/footer.html.php')?>
 </footer>
 
 <script src="../Js/e-www.js"></script>

</body>
</html>
