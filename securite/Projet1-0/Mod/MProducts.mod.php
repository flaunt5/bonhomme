<?php
/**
 * Fichier de classe de type Modèle 
 * pour la lecture et la gestion de la table PRODUCTS
 * @author Christian Bonhomme
 * @version 1.0
 * @package PROJET-MOOC
 */
class MProducts
{
  /**
   * Connexion à la Base de Données
   * @var object $conn
   */
  private $conn;

  /**
   * Clef primaire de la table PRODUCTS
   * @var int $id_product
   */
  private $id_product;
  
  /**
   * Constructeur de la class MProducts
   * @param int clef primaire identifiant un produit
   * @access public
   *        
   * @return none
   */
  public function __construct($_id_product = null)
  {
    // Connexion à la Base de Données
    $this->conn = new PDO(DATABASE, LOGIN, PASSWORD);

    // Instanciation du membre $id_product
    $this->id_product = $_id_product;
    
    return;
    
  } // __construct($_id_product = null)
  
  /**
   * Destructeur de la class MProducts
   * @access public
   *        
   * @return none
   */
  public function __destruct(){}

  /**
   * Récupère un tuple de la table PRODUCTS
   * @access public
   *
   * @return array un tuple
   */
  public function Select()
  {
    $query = 'select ID_PRODUCT,
                     TITRE_PRODUCT,
                     REFERENCE,
                     DESCRIPTION,
                     KEYWORDS,
                     VIGNETTE,
                     IMAGE,
                     PRIX
	          from PRODUCTS
              where ID_PRODUCT = ' . $this->id_product;
  
    $result = $this->conn->prepare($query);
   
    $result->execute();
  
    return $result->fetch();
  
  } // Select()
  
  /**
   * Récupère plusieurs tuples de la table PRODUCTS
   * jointure entre les tables : CATEGORIES_PRODUCTS, PRODUCTS
   * @param int identifiant de la la table CATEGORIES_PRODUCTS
   * @param int numéro de la page en cours
   * @access public
   * 
   * @return array tous les tuples
   */
  public function SelectByCategoryAll($_id_categorie, $page)
  {
    $offset = ($page - 1) * 6;
    $limit = $offset + 6;
  
    $query = 'select PRODUCTS.ID_PRODUCT,
                     TITRE_CATEGORIE,
                     TITRE_PRODUCT,
                     REFERENCE,
                     PRODUCTS.DESCRIPTION,
                     KEYWORDS,
                     VIGNETTE,
                     IMAGE,
                     PRIX
	          from CATEGORIES_PRODUCTS, PRODUCTS, CATEGORIES
              where CATEGORIES_PRODUCTS.ID_PRODUCT = PRODUCTS.ID_PRODUCT
              and CATEGORIES_PRODUCTS.ID_CATEGORIE = CATEGORIES.ID_CATEGORIE
              and CATEGORIES_PRODUCTS.ID_CATEGORIE = ' . $_id_categorie .'
              order by CATEGORIES_PRODUCTS.ORDRE
              limit ' . $offset . ', ' . $limit;
  
    $result = $this->conn->prepare($query);
  
    $result->execute();
  
    return $result->fetchAll();
  
  } // SelectByCategoryAll($_id_categorie, $page)

  /**
   * Récupère le nombre de tuple de la table PRODUCTS
   * @access public
   *
   * @return array un tuple
   */
  public function SelectCount($_id_categorie)
  {
    $query = 'select COUNT(*) as COUNT
	          from CATEGORIES_PRODUCTS, PRODUCTS
              where CATEGORIES_PRODUCTS.ID_PRODUCT = PRODUCTS.ID_PRODUCT
              and CATEGORIES_PRODUCTS.ID_CATEGORIE = ' . $_id_categorie;
    
    $result = $this->conn->prepare($query);
  
    $result->execute();
  
    return $result->fetch();
  
  } // SelectCount($_id_categorie)
  
} // MProducts
?>