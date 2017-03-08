<?php
/**
 * Fichier de classe de type Vue
 * pour l'affichage des parties gauche et droite
 * @author Christian Bonhomme
 * @version 1.0
 * @package PROJET-MOOC
 */

/**
 * Affichage des parties gauche et droite
 *
 */
class VAside
{
  /**
   * Affichage HTML
   * @var object instancié par la classe VHtml
   */ 
  private $vhtml;

  /**
   * Constructeur
   * 
   * @return none
   */ 
  public function __construct()
  {
    $this->vhtml = new VHtml();
    
    return;
    
  }

  /**
   * Destructeur
   */ 
  public function __destruct() {}

  /**
   * Affichage de la partie gauche
   * 
   * @return none
   */ 
  public function showAsideLeft()
  {
     $this->vhtml->showHtml('../Html/left.html.php');
     
     return;
  		
  } // showAsideLeft()

  /**
   * Affichage de la partie droite
   * 
   * @return none
   */ 
  public function showAsideRight()
  {
     $this->vhtml->showHtml('../Html/right.html.php');
     
     return;
   		
  } // showAsideRight()

} // VAside

?>
