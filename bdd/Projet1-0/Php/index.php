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
  case 'home'     : home();     break;
  case 'products' : products(); break;
  case 'product'  : product();  break;
  case 'contact'  : contact();  exit;
  case 'buy'      : buy();      exit;
  case 'cart'     : cart();     exit;
  default         : home();
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

    $content['title'] = 'Produits';
    $content['meta'] = '<meta name="description" content="Description de la catégorie aromathérapie" />
                        <meta name="keywords" content="mots, clefs, page, aromathérapie" />
                        <meta name="author" content="Christian BONHOMME" />';
    $content['class'] = 'VHtml';
    $content['method'] = 'showHtml';
    $content['arg'] = '../Html/products.html.php';

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

    $content['title'] = 'Produit';
    $content['meta'] = '<meta name="description" content="Description du produit lorem ipsum" />
                        <meta name="keywords" content="mots, clefs, page, lorem, ipsum" />
                        <meta name="author" content="Christian BONHOMME" />';
    $content['class'] = 'VHtml';
    $content['method'] = 'showHtml';
    $content['arg'] = '../Html/product.html.php';

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
 * Sauvegarde dans un fichier achats.txt les articles achetés
 * Calcule le prix total et le renvoie au format JSON
 *
 * @return none
 */
function buy()
{
    // Ouverture en lecture du fichier articles.txt
    $fd = fopen('../Text/articles.txt', 'r');
    
    // Lit les lignes jusqu'à la fin de fichier
    while (!feof($fd))
    {
        // Récupère une ligne
        $line = fgets($fd, 4096);
        
        // Sépare la chaîne $line en tableau de chaînes par le séparateur ;
        $explo_line = explode(';', $line);
        
        // Teste si la chaîne du premier indice vaut $_POST['NUM'])
        // Si c'est le cas on sort du switch
        if ($explo_line[0] == $_POST['NUM']) break;
    }
    
    // Vérifie si le fichier achats.txt existe
    if (is_file('../Text/achats.txt'))
    {
      // Récupère le fichier dans une chaîne
      $textes = file_get_contents('../Text/achats.txt');
      
      // Sépare la chaîne $textes en tableau de chaînes par le séparateur \n 
      $explo_textes = explode("\n", $textes);
      // Booléen de test
      $test_article = false;
      // Prix total à 0
      $value['total_price'] = 0;
      // Boucle sur le tableau de textes
      foreach ($explo_textes as $key => $val)
      {
         // Sépare la chaîne $val en tableau de chaînes par le séparateur ;
         $explo_val = explode(';', $val);          

         // Teste si la valeur de l'indice 1 du tableau de chaînes de $val (titre de l'article)
         // est égal à la valeur de l'indice 1 du tableau de chaînes de $line (titre de l'article cliqué)  
         if ($explo_val[1] == $explo_line[1])
         {
           // Remplace dans le tableau de chaînes de $textes par cette nouvelle chaîne
           // en incrémentant la valeur du premier indice du tableau de chaînes de $val
           // correspondant au nombre d'articles
           $explo_textes[$key] = ++$explo_val[0] . ';' . $explo_val[1] . ';' . $explo_val[2];
           // Met le booléen de test à true
           $test_article = true;
         }
         
         // Calcul le prix total en ajoutant le nombre d'articles fois le prix de l'article
         $value['total_price'] += $explo_val[0]*$explo_val[2];
      }
      
      // Si le booléen de test est à false nouvel article
      if (!$test_article)
      {
        // Incrémente le tableau de chaînes de $textes par cette nouvelle chaîne
        // la fonction rtrim() supprime le retour chariot et la fin de ligne
        $explo_textes[] = '1;' . $explo_line[1] . ';' . rtrim($explo_line[2]);
        
        // Calcul le prix total en ajoutant le prix du nouvel article
        $value['total_price'] += $explo_line[2];
      }
      
      // Génère le nouveau texte qui sera mis dans le fichier
      $new_textes = implode("\n", $explo_textes);
    }
    else // Le fichier achats.txt n'existe pas
    {
      // Le prix total est le prix de l'article
      $value['total_price'] = rtrim($explo_line[2]);
      // Le nouveau texte correspond à cette chaîne
      $new_textes = '1;' . $explo_line[1] . ';' . rtrim($explo_line[2]);
    }
    
    // Ecrit le nouveau texte dans le fichier achats.txt
    file_put_contents('../Text/achats.txt', $new_textes);
    
    // Renvoie le tableau $value encodé au format json
    echo json_encode($value);

    return;
    
} // buy()

/**
 * Lit le fichier de commande et l'affiche
 *
 * @return none
 */
function cart()
{
    // Ouverture en lecture du fichier articles.txt
    $fd = fopen('../Text/achats.txt', 'r');
    
    global $value_article;
    
    $i = 0;
    // Lit les lignes jusqu'à la fin de fichier
    while (!feof($fd))
    {
      // Récupère une ligne
      $line = fgets($fd, 4096);
    
      // Sépare la chaîne $line en tableau de chaînes par le séparateur ;
      $explo_line = explode(';', $line);
          
      // Instancie le tableau suivant le nombre de ligne $i 
      // et suivant les colonnes : NOMBRE, NOM, PRIX
      $value_article[$i]['NOMBRE'] = $explo_line[0];
      $value_article[$i]['NOM'] = $explo_line[1];
      $value_article[$i]['PRIX'] = $explo_line[2];
      // Incrémentation du nombre de ligne
      ++$i;
    }
    
    // Affiche le bon de commande
    $vhtml = new VHtml();
    $vhtml->showHtml('../Html/cart.html.php');

    return;
    
} // cart()
?>