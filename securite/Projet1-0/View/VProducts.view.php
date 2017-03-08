<?php
/**
 * Fichier de classe de type Vue
 * pour l'affichage des produits
 * @author Christian Bonhomme
 * @version 1.0
 * @package PROJET-MOOC
 */
 
/**
 * Affichage des produits
 *
 */
class VProducts
{
  /**
   * Constructeur
   */ 
  public function __construct() {}

  /**
   * Destructeur
   */ 
  public function __destruct() {}

  /**
   * Affichage d'un produit
   *
   * @return none
   */
  public function showProduct($_data)
  {
    // Met les retour à la ligne
    $description = nl2br($_data['PRODUCTS']['DESCRIPTION']);
      
    echo <<<HERE
<h2 id="titre">{$_data['PRODUCTS']['TITRE_PRODUCT']}</h2>
<div id="breadcrumb"><b>&gt; <a href="../Php/index.php?EX=products&amp;ID_CATEGORIE={$_data['CATEGORIES']['ID_CATEGORIE']}&amp;PAGE={$_data['PAGE']}">{$_data['CATEGORIES']['TITRE_CATEGORIE']}</a></b></div>
<p class="ref">{$_data['PRODUCTS']['REFERENCE']}</p>
<img src="../Img/{$_data['PRODUCTS']['IMAGE']}" alt="{$_data['PRODUCTS']['TITRE_PRODUCT']}" title="{$_data['PRODUCTS']['TITRE_PRODUCT']}" />
<p>$description</p>
<p id="prix"><button data-article="{$_data['PRODUCTS']['ID_PRODUCT']}" class="buy">Achat</button> <b><span class="cms">{$_data['PRODUCTS']['PRIX']}</span> €</b></p>
HERE;
    
    return;
  
  } // showProduct($_data)
  
  /**
   * Affichage des produits
   *
   * @return none
   */
  public function showProducts($_data)
  {
    // Test s'il n'y a pas de produit
    if (!$_data['COUNT'])
    {
      echo '<h2>Aucun produit présent</h2>';
      
      return;
    }
 
    // Affichage du titre du produit
    echo '<h2>' . $_data['CATEGORIES']['TITRE_CATEGORIE'] . '</h2>';
  
    // Boucle sur les produits
    foreach ($_data['PRODUCTS'] as $val)
    {
      // Prenons que les 150 premiers caractères
      $description = substr($val['DESCRIPTION'], 0, 150) . ' [...]';
  
      // Affichage des produits
        echo <<<HERE
  <article>
   <a href="../Php/index.php?EX=product&amp;ID_PRODUCT={$val['ID_PRODUCT']}&amp;ID_CATEGORIE={$_data['CATEGORIES']['ID_CATEGORIE']}&amp;PAGE={$_data['PAGE']}"><img src="../Img/{$val['VIGNETTE']}" alt="{$val['TITRE_PRODUCT']}" title="{$val['TITRE_PRODUCT']}" /></a>
   <h3><a href="../Php/index.php?EX=product&amp;ID_PRODUCT={$val['ID_PRODUCT']}&amp;ID_CATEGORIE={$_data['CATEGORIES']['ID_CATEGORIE']}&amp;PAGE={$_data['PAGE']}">{$val['TITRE_PRODUCT']}</a></h3>
   <p>$description</p>
   <p class="center"><button data-article="{$val['ID_PRODUCT']}" class="buy">Achat</button> <b>{$val['PRIX']}€</b></p>
  </article>
HERE;
    }

    // Test s'il y a une pagination
    if ($_data['COUNT'] > 6)
    {
      $this->showFooter($_data['COUNT'], $_data['CATEGORIES']['ID_CATEGORIE'], intval($_data['PAGE']));
    }
    
    return;
    
  } // showProducts($_data)
  
  /**
   * Ecriture de la pagination
   * @param int nombre de pages
   * @param int identifiant de la categorie
   * @param int numéro de la page courante
   *
   * @return none
   */
  private function showFooter($count, $id_categorie, $page_courante)
  {
    // Récupération du nombre de pages
    $pages = ceil($count/6);
    
    // Test si la page courante n'est pas la première page
    if ($page_courante != 1)
    {
      $page_previous = $page_courante - 1;
      $footer = '<span><a href="../Php/index.php?EX=products&amp;ID_CATEGORIE=' . $id_categorie . '&amp;PAGE=' . $page_previous . '">Page précédente</a></span><span>Page ';
    }
    else
    {
      $footer = '<span>&nbsp;</span><span>Page ';
    }
    
    // Boucle sur le nombre de pages
    for ($i = 0; $i < $pages;)
    {
      // Test si l'indice de page est égal à celui de la page courante
      if (++$i == $page_courante)
      {
          $footer .= '<strong>' . $i . '</strong>|';
      }
      else
      {
        $footer .= '<a href="../Php/index.php?EX=products&amp;ID_CATEGORIE=' . $id_categorie . '&amp;PAGE=' . $i . '">' . $i . '</a>|';
      }
    }
  
    // Suppression du dernier caractère |
    $footer = rtrim($footer, "|");
  
    // Fermeture de la balise <span>
    $footer .= '</span>';
  
    // Test si la page courante est différente du nombre de pages
    if ($page_courante != $pages)
    {
      $page_next = $page_courante + 1;
      $footer .= '<span><a href="../Php/index.php?EX=products&amp;ID_CATEGORIE=' . $id_categorie . '&amp;PAGE=' . $page_next . '">Page suivante</a></span>';
    }
    else
    {
      $footer .= '<span>&nbsp;</span>';
    }
  
    // Affichage de la pagination
    echo '<footer id="footer_products">' . $footer . '</footer>';
    
    return;
  
  } // showFooter($count, $id_categorie, $page_courante)

  /**
   * Ecriture des balises meta
   *
   * @return string meta d'un produit donné
   */
  public function metaProduct($_data)
  {
    // Retour des <meta> renseignées
    return <<<HERE
    <meta name="description" content="{$_data['PRODUCTS']['DESCRIPTION']}" />
    <meta name="keywords" content="{$_data['PRODUCTS']['KEYWORDS']}" />
    <meta name="author" content="Christian BONHOMME" />
    
HERE;
      
  } // metaProduct($_data)

  /**
   * Ecriture des balises meta
   *
   * @return string meta d'une catégorie donnée
   */
  public function metaProducts($_data)
  {
    // Boucle sur les produits
    $produits = '';
    foreach ($_data['PRODUCTS'] as $val)
    {
      $produits .= $val['TITRE_PRODUCT'] . ',';
    }
  
    // Suppression de la dernière virgule
    $produits = rtrim($produits, ",");
  
    // Retour des <meta> renseignées
    return <<<HERE
    <meta name="description" content="{$_data['CATEGORIES']['DESCRIPTION']}" />
    <meta name="keywords" content="$produits" />
    <meta name="author" content="Christian BONHOMME" />
    
HERE;
      
  } // metaProducts($_data)
  
} // VProducts
?>
