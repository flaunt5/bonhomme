<?php
/**
 * Fichier de classe de type Modèle 
 * pour la lecture et la gestion de la table CATEGORIES
 * @author Christian Bonhomme
 * @version 1.0
 * @package PROJET-MOOC
 */
class MCategories
{
  /**
   * Connexion à la Base de Données
   * @var object $conn
   */
  private $conn;

  /**
   * Clef primaire de la table CATEGORIES
   * @var int $id_categorie
   */
  private $id_categorie;
  
 /**
   * Constructeur de la class MCategories
   * @param int clef primaire identifiant une catégorie
   * @access public
   *        
   * @return none
   */
  public function __construct($_id_categorie = null)
  {
    // Connexion à la Base de Données
    $this->conn = new PDO(DATABASE, LOGIN, PASSWORD);

    // Instanciation du membre $id_categorie
    $this->id_categorie = $_id_categorie;
  
    return;
    
  } // __construct($_id_categorie = null)
  
  /**
   * Destructeur de la class MCategories
   * @access public
   *        
   * @return none
   */
  public function __destruct(){}

  /**
   * Récupère un tuple de la table CATEGORIES
   * @access public
   *
   * @return array un tuple
   */
  public function Select()
  {
    $query = 'select ID_CATEGORIE,
                     TITRE_CATEGORIE,
                     DESCRIPTION,
    		         ORDRE,
  			         ID_MERE
              from CATEGORIES
              where ID_CATEGORIE = ' . $this->id_categorie;
  
    $result = $this->conn->prepare($query);
  
    $result->execute();
  
    return $result->fetch();
  
  } // Select()
  
  /**
   * Récupère tous tuples de la table CATEGORIES
   * @access public
   *        
   * @return array tous les tuples
   */
  public function SelectAll()
  {
    $query = 'select ID_CATEGORIE,
                     TITRE_CATEGORIE,
                     DESCRIPTION,
    		         ORDRE,
                     ID_MERE
	          from CATEGORIES
              order by ORDRE';
 
    $result = $this->conn->prepare($query);
 
    $result->execute();
        
    return $result->fetchAll();
  
  } // SelectAll()
  
} // MCategories
?>