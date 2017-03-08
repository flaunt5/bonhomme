<?php
/**
 * Fichier de classe de type Modèle 
 * pour la lecture et la gestion du fichier categories.txt
 * @author Christian Bonhomme
 * @version 1.0
 * @package PROJET-MOOC
 */
class MCategories
{
  /**
   * Chemin du fichier categories.txt
   * @var resource $file
   */
  private $file;
   
  /**
   * Constructeur de la class MCategories
   * @access public
   *        
   * @return none
   */
  public function __construct()
  {
    // Chemin du fichier categories.txt
    $this->file = '../Text/categories.txt';
    
    return;
    
  } // __construct()
  
  /**
   * Destructeur de la class MCategories
   * @access public
   *        
   * @return none
   */
  public function __destruct() {}
  
  /**
   * Récupère les données des lignes du fichier categories.txt
   * @access public
   *        
   * @return array données des lignes
   */
  public function SelectAll()
  {
    // Lit le fichier et renvoie le résultat dans un tableau
    $file_categories = file($this->file);
 
    $k = 0;
    foreach ($file_categories as $val)
    {
      // Découpe $val en tableau
      $tab = explode(';', $val);
      
      // Instancie le tableau $the_values
      $the_values[$k]['ID_CATEGORIE'] = $tab[0];
      // Teste s'il y a une valeur dans $tab[2]
      if (isset($tab[2]))
      {
        $the_values[$k]['TITRE_CATEGORIE'] = $tab[1];
        $the_values[$k++]['ID_MERE'] = rtrim($tab[2]);
      }
      else
      {
        $the_values[$k]['TITRE_CATEGORIE'] = rtrim($tab[1]);
        $the_values[$k++]['ID_MERE'] = 0;
      }
    }
    
    return $the_values;
  
  } // SelectAll()

    public function GetValues()
    {

    }
  
} // MCategories
?>