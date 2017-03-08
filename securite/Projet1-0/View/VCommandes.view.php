<?php
/**
 * Fichier de classe de type Vue
 * pour l'affichage du bon de commandes
 * @author Christian Bonhomme
 * @version 1.0
 * @package PROJET-MOOC
 */

/**
 * Affichage du bon de commandes
  *
 */ 
class VCommandes
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
   * Affichage du bon de commandes
   * 
   * @return none
   */ 
  public function showCommandes($_value)
  {
    $tr_body = '';
    $prix_total = 0;
    // Génère les lignes du tableau du bon de commande
    foreach ($_value as $key => $val)
    {
      $prix = $val['QUANTITE']*$val['PRIX'];
      $prix_total += $prix;
      $tr_body .= <<<HERE
<tr><td class="quantity" data-id_product="{$val['ID_PRODUCT']}">{$val['QUANTITE']}</td><td>{$val['TITRE_PRODUCT']}</td><td>{$val['PRIX']} €</td><td>$prix €</td></tr>
HERE;
    }
      
    $tr_body .= '<tr><td colspan="3">Prix Total</td><td id="total">' . $prix_total . ' €</td>';
      
    // Affiche le bon de commande
    echo <<<HERE
<p class="right"><button id="close" class="button close">Quitter</button></p>
<table>
 <thead>
  <tr><th>Quantité</th><th>Articles</th><th>Prix Unit.</th><th>Prix</th></tr>
 </thead>
 <tbody>
  $tr_body
 </tbody>
</table>
    
HERE;
    
    return;
  
  } // showCommandes()
 
} // VCommandes
?>