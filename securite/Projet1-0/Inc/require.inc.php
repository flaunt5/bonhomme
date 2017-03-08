<?php
/**
 * Fichier d'inclusion des constantes et des fonctions
 * dont à besoin l'application en particulier l'Autoload
 * @author Christian Bonhomme
 * @version 1.0
 * @package PROJET-MOOC
 */

// Debugggage
define('DEBUG', false);

// Connexion Base de Données
/*define('DATABASE', 'mysql:host=votre_host;dbname=nom_de_votre_base');
define('LOGIN', 'login_de_connexion');
define('PASSWORD', 'mot_de_passe_de_connexion');*/
define('DATABASE', 'mysql:host=localhost;dbname=methodologie-web2.0');
define('LOGIN', 'root');
define('PASSWORD', 'gulliver');

/**
 * Chargement automatique des class
 * @param string class appelée
 *
 * @return none
 */
function __autoload($class)
{
  switch ($class[0])
  {
    // Inclusion des class de type View
    case 'V' : require_once('../View/'.$class.'.view.php');
               break;
    // Inclusion des class de type Mod
    case 'M' : require_once('../Mod/'.$class.'.mod.php');
               break;
  }
    
  return;

} // __autoload($class)

// Visualisation des erreurs
if (DEBUG)
{
  // Détecte toutes les erreurs  
  error_reporting(E_ALL);
  // Affiche les erreurs
  ini_set('display_errors', 1);

  /**
   * Fonction de debug pour les tableaux
   * @param array tableau à débugguer
   *
   * @return none
   */
  function debug($Tab)
  {
    echo '<pre>Tab';
    print_r($Tab);
    echo '</pre>';
         
  } // debug($Tab)
}
?>