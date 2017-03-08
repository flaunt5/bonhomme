<?php
/**
 * Contrôleur
 * @author Christian Bonhomme
 * @version 1.0
 * @package PROJET-MOOC
 */

// Inclusion du fichier des utilitaires de l'application
require('../Inc/require.inc.php');

// Instancie la variable de contrôle
$EX = isset($_REQUEST['EX']) ? $_REQUEST['EX'] : 'home';

// Contrôleur
switch($EX)
{
  case 'home'            : home();            break;
  case 'products'        : products();        break;
  case 'product'         : product();         break;
  case 'contact'         : contact();         exit;
  case 'buy'             : buy();             exit;
  case 'cart'            : cart();            exit;
  case 'change_quantity' : change_quantity(); exit;
  default                : home();
}

// Inclusion du fichier de mise en page
require('../View/layout.view.php');

/**
 * Affiche la page d'accueil
 *
 * @return none
 */
function home()
{
    global $content;

    $content['title'] = 'Accueil';
    $content['meta'] = '<meta name="description" content="Description de la page d\'accueil" />
                        <meta name="keywords" content="mots, clefs, page, accueil" />
                        <meta name="author" content="Christian BONHOMME" />';
    $content['class'] = 'VHtml';
    $content['method'] = 'showHtml';
    $content['arg'] = '../Html/home.html.php';
    
    return;

} // home()

/**
 * Affiche la page des produits
 *
 * @return none
 */
function products()
{
  global $content;

  // Instancions l'objet $mcategories avec la classe MCategories
  $mcategories = new MCategories($_GET['ID_CATEGORIE']);
  // Récupérons dans le tableau associatif $data le tuple de la table CATEGORIES pour un ID_CATEGORIE donné
  $data['CATEGORIES'] = $mcategories->Select();

  // Instancions l'objet $mproducts avec la classe MProducts
  $mproducts = new MProducts();
  // Récupérons dans le tableau associatif $data les tuples de la table PRODUCTS pour un ID_CATEGORIE donné
  $data['PRODUCTS'] = $mproducts->SelectByCategoryAll($_GET['ID_CATEGORIE'], $_GET['PAGE']);
  $value = $mproducts->SelectCount($_GET['ID_CATEGORIE']);
    
  // Complétons le tableau $data avec le nombre de produits (['COUNT']) et la page courante (['PAGE']) 
  $data['COUNT'] = $value['COUNT'];
  $data['PAGE'] = $_GET['PAGE'];

  // Instancions l'objet $vproducts avec la classe VProducts
  $vproducts = new VProducts();
  // Récupérons les meta associés à la catégorie et aux produits associés
  $meta = $vproducts->metaProducts($data);
    
  // Instancions les clefs du tableau associatif $content
  $content['title'] = $data['CATEGORIES']['TITRE_CATEGORIE'];
  $content['meta'] = $meta;
  $content['class'] = 'VProducts';
  $content['method'] = 'showProducts';
  $content['arg'] = $data;
  
  return;
    
} // products()

/**
 * Affiche la page d'un produit
 *
 * @return none
 */
function product()
{
    global $content;

    // Instancions l'objet $mcategories avec la classe MCategories
    $mcategories = new MCategories($_GET['ID_CATEGORIE']);
    // Récupérons dans le tableau associatif $data le tuple de la table CATEGORIES pour un ID_CATEGORIE donné
    $data['CATEGORIES'] = $mcategories->Select();
    
    // Instancions l'objet $mproducts avec la classe MProducts et la clef primaire $_GET['ID_PRODUCT']
    $mproducts = new MProducts($_GET['ID_PRODUCT']);
    // Récupérons le tuple ayant pour clef primaire $_GET['ID_PRODUCT']
    $data['PRODUCTS'] = $mproducts->Select();

    // Instancions la clef PAGE du tableau associatif $data
    $data['PAGE'] = $_GET['PAGE'];
    
    // Instancions l'objet $vproducts avec la classe VProducts
    $vproducts = new VProducts();
    // Récupérons les meta associés au produit
    $meta = $vproducts->metaProduct($data);
    
    // Instancions les clefs du tableau associatif $content
    $content['title'] =  $data['PRODUCTS']['TITRE_PRODUCT'];
    $content['meta'] = $meta;
    $content['class'] = 'VProducts';
    $content['method'] = 'showProduct';
    $content['arg'] = $data;
    
    return;
    
} // product()

/**
 * Affiche le formulaire de contact
 *
 * @return none
 */
function contact()
{
    $vhtml = new VHtml();
    $vhtml->showHtml('../Html/contact.html.php');

    return;
    
} // contact()

/**
 * Sauvegarde dans la table COMMANDES les articles achetés
 * Calcule le prix total et le renvoie au format JSON
 *
 * @return none
 */
function buy()
{
  // Instancie l'objet $mcommandes
  // 1 représente le numéro du bon de commandes
  // $_POST['ID_PRODUCT'] représente l'identifiant du produit
  $mcommandes = new MCommandes(1, $_POST['ID_PRODUCT']);
  // Vérifie l'existence du produit ID_PRODUCT
  $commande = $mcommandes->Exist();

  // Si la quantité n'est pas nulle Update (incrémentation de la quantité), sinon Insert
  if ($commande['QUANTITE'])
  {
    $value['QUANTITE'] = ++$commande['QUANTITE'];
    $mcommandes->SetValue($value);
    $mcommandes->Update();
  }
  else
  {
    $mcommandes->Insert();
  }

  // Récupération du prix total du panier
  $value = $mcommandes->SelectCart();

  // Renvoie le tableau $value encodé au format json
  echo json_encode($value);
  
  return;
    
} // buy()

/**
 * Lit les commandes dans la table COMMANDES et les affiche
 *
 * @return none
 */
function cart()
{
  // Instancie l'objet Model $mcommandes
  // 1 représente le numéro du bon de commandes
  $mcommandes = new MCommandes(1);
  // Récupère les tuples du bon de commande
  $commandes = $mcommandes->SelectByCommandeAll();

  // Instancie l'objet Vue $vcommandes
  $vcommandes = new VCommandes();
  // Affiche le bon de commande
  $vcommandes->showCommandes($commandes);
  
  return;
    
} // cart()

/**
 * Modifie la quantité d'un produit
 *
 * @return none
 */
function change_quantity()
{
  // Instancie l'objet Model $mcommandes
  // 1 représente le numéro du bon de commandes
  $mcommandes = new MCommandes(1, $_POST['ID_PRODUCT']);
  // Modifie la quantité
  $value['QUANTITE'] = $_POST['QUANTITE'];
  $mcommandes->SetValue($value);
  
  // Update ou Delete suivant que la quantité est non nulle ou nulle
  ($value['QUANTITE']) ? $mcommandes->Update() : $mcommandes->Delete();

  echo json_encode($_POST);
    
  return;

} // change_quantity()
?>