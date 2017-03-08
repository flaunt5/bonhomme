<?php
/**
 * Fichier de classe de type Modèle
 * pour la lecture et la gestion de la table COMMANDES
 * @author Christian Bonhomme
 * @version 1.0
 * @package PROJET-MOOC
 */
 
class MCommandes
{
  /**
   * Connexion à la Base de Données
   * @var object $conn
   */
  private $conn;

  /**
   * Clef primaire de la table COMMANDES
   * @var int $id_commande
   */
  private $id_commande;

  /**
   * Clef primaire de la table COMMANDES
   * @var int $id_product
   */
  private $id_product;

  /**
   * Tableau de gestion de données (insert ou update)
   * @var array $value
   */
  private $value;
  
  /**
   * Constructeur de la class MCommandes
   * @param int clef primaire identifiant de la commande
   * @param int clef primaire identifiant du produit
   * @access public
   *        
   * @return none
   */
  public function __construct($_id_commande, $_id_product = null)
  {
    // Connexion à la Base de Données
    $this->conn = new PDO(DATABASE, LOGIN, PASSWORD);

    // Instanciation du membre $id_commande
    $this->id_commande = $_id_commande;

    // Instanciation du membre $id_product
    $this->id_product = $_id_product;
    
    return;
    
  } // __construct($_id_commande, $_id_product = null)
  
  /**
   * Destructeur de la class MCommandes
   * @access public
   *        
   * @return none
   */
  public function __destruct(){}

  /**
   * Modificateur du membre $value
   * @param array tableau des données
   * @access public
   *
   * @return none
   */
  public function SetValue($_value)
  {
    $this->value = $_value;
    
    return;
    
  } // SetValue($_value)
  
  /**
   * Vérification s un tuple existe
   * @access public
   *
   * @return un tuple
   */
  public function Exist()
  {
    $query = "select QUANTITE
              from COMMANDES
              where ID_COMMANDE = '$this->id_commande'
              and ID_PRODUCT = $this->id_product";
  
    $result = $this->conn->prepare($query);
  
    $result->execute();
       
    return $result->fetch();
  
  } // Exist()
  
  /**
   * Insertion d'une ligne dans la table COMMANDES
   * @access public
   *        
   * @return none
   */
  public function Insert()
  {
    $query = "insert into COMMANDES (ID_COMMANDE, ID_PRODUCT, QUANTITE)
              values ('$this->id_commande', $this->id_product,  1)";

    $result = $this->conn->prepare($query);
 
    $result->execute();
    
    return;
  
  } // Insert()

  /**
   * Modification de QUANTITE dans la table COMMANDES pour un ID_COMMANDE donné
   * @access public
   *        
   * @return none
   */
  public function Update()
  {
    $query = "update COMMANDES
              set QUANTITE = {$this->value['QUANTITE']}
              where ID_COMMANDE = '$this->id_commande'
              and ID_PRODUCT = $this->id_product";

    $result = $this->conn->prepare($query);
  
    $result->execute();
    
    return;
  
  } // Update()

  /**
   * Modification de QUANTITE dans la table COMMANDES pour un ID_COMMANDE donné
   * @access public
   *
   * @return none
   */
  public function Delete()
  {
      $query = "delete from COMMANDES
                where ID_COMMANDE = '$this->id_commande'
                and ID_PRODUCT = $this->id_product";
  
      $result = $this->conn->prepare($query);
  
      $result->execute();
      
      return;
  
  } // Delete()
  
  /**
   * Calcule le prix total des commandes pour un ID_COMMANDE donné
   * @access public
   *
   * @return array un tuple
   */
  public function SelectCart()
  {
    $query = "select SUM(QUANTITE*PRIX) as total_price
  	          from COMMANDES, PRODUCTS
              where ID_COMMANDE = '$this->id_commande'
              and COMMANDES.ID_PRODUCT = PRODUCTS.ID_PRODUCT";
  
    $result = $this->conn->prepare($query);
  
    $result->execute();
  
    return $result->fetch();
  
  } // SelectCart()
  
  /**
   * Récupère tous les tuples de la table COMMANDES pour un ID_COMMANDE donné
   * @access public
   *        
   * @return array $result->fetchAll()
   */
  public function SelectByCommandeAll()
  {
    $query = "select COMMANDES.ID_PRODUCT,
                     QUANTITE,
                     TITRE_PRODUCT,
                     PRIX
	          from COMMANDES, PRODUCTS
              where ID_COMMANDE = '$this->id_commande'
              and COMMANDES.ID_PRODUCT = PRODUCTS.ID_PRODUCT";
 
    $result = $this->conn->prepare($query);
 
    $result->execute();
        
    return $result->fetchAll();  
  
  } // SelectByCommandeAll()
  
} // MCommandes
?>