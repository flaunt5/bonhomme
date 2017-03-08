<?php
/**
 * Fichier de classe de type Vue
 * pour l'affichage de la navigation
 * @author Christian Bonhomme
 * @version 1.0
 * @package PROJET-MOOC
 */

/**
 * Affichage de la navigation
 *
 */
class VNav
{
  /**
   * Constructeur
   */ 
  public function __construct(){}
  
  /**
   * Destructeur
   */ 
  public function __destruct(){}
  
  /**
   * Affichage de la navigation
   * 
   * @return none
   */ 
  public function showNav()
  {
    // Récupère les données des catégories
    $mcategories = new MCategories();
    $data_categories = $mcategories->SelectAll();

    // Initialisation de $li avec l'élément <ol>
    $li = '';
    // Boucle sur les tuples racines de la table CATEGORIES
    foreach ($data_categories as $val1)
    {
      if ($val1['ID_MERE']) continue;
          
      // Concaténation avec l'ancre et le titre de la catégorie
      $li .= '<li><a>'.$val1['TITRE_CATEGORIE'].'</a>';
         
      // Concaténation avec l'élément <ol> (imbrication)
      $li .= '<ol>';
      
      // Boucle sur les tuples enfants de la table CATEGORIES
      foreach ($data_categories as $val2)
      {
        if ($val1['ID_CATEGORIE'] == $val2['ID_MERE'])
        {
          $href = ('Aromathérapie' == $val2['TITRE_CATEGORIE']) ? '../Php/index.php?EX=products' : '#';
          $li .= '<li><a href="'.$href.'">'.$val2['TITRE_CATEGORIE'].'</a></li>';
        }
      } 
      // Concaténation avec la fin des éléments <ol> et <li>
      $li .= '</ol></li>';
   }
    
    echo <<<HERE
  <h1 id="logo" title="logo">Logo</h1>
  <div id="bandeau"><p>Bandeau</p></div>
  <nav>
   <ol>$li</ol>
   <div id="cart"><img src="../Img/cart.png" alt="panier" /><b></b></div> 
  </nav>
  
  <div id="window_cart"></div>
HERE;
    
    return;

  } // showNav()
  
} // VNav
?>
