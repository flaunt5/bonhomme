/**
 * Fonctions utilisées pour le caddy
 * @author Christian Bonhomme
 * @version 1.0
 * @package PROJET-MOOC
 */

/**
 * Récupère le prix d'un article, l'ajoute au prix total et l'affiche dans le panier
 * @param événement
 * 
 * @return none
 */
function buy(event)
{
  // Récupère l'élément <button>
  var elem = event.target || event.srcElement;

  // Récupère le numéro de l'article
  var num_article = elem.getAttribute('data-article');
 
  // Actionne la sauvegarde l'article et le calcule du prix total 
  var rep = actionParam('../Php/index.php', 'EX=buy&NUM=' + num_article);
  
  // Récupération de l'élément <div id="cart">
  var cart = document.getElementById('cart');
   
  // Affiche le prix total avec le €
  cart.querySelector('b').innerHTML = rep.total_price + '€';
  
  // Visualise l'élément <div id="cart"> en display de type table
  cart.style.display = 'table';
  


} // function buy(event)

/**
 * Affiche l'élément <div id="window_cart">
 * et le contenu du bon de commande
 * @param événement
 * 
 * @return none
 */
function cart()
{
  document.getElementById('window_cart').style.display = 'block';
  
  changeContent('window_cart', '../Php/index.php', 'EX=cart', 'initCloseWindow()');


    
} // cart()


/**
 * Initialisation de l'écouteur de fermeture de l'élément <div id="window_cart">
 * 
 * @return none
 */
function initCloseWindow()
{
  //Récupère l'élément <button id="close">
  var click_close = document.getElementById('close');
  Listener(click_close, 'click', function(){document.getElementById('window_cart').style.display = 'none'});


    
} // initCloseWindow()
