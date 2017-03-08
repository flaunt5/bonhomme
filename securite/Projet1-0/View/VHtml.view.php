<?php
/**
 * Fichier de classe de type Vue
 * pour l'affichage des fichiers html ou html.php
 * @author Christian Bonhomme
 * @version 1.0
 * @package PROJET-MOOC
 */

/**
 * Classe pour l'affichage des fichiers html ou html.php
 */
class VHtml
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
   * Affichage du fichier HTML
   * @param fichier HTML
   * 
   * @return none
   */ 
  public function showHtml($_html)
  {
    (file_exists($_html)) ? include($_html) : include('../Html/unknown.html');
    
    return;
    
  } // showHtml($_html)
  
} // VHtml
?>