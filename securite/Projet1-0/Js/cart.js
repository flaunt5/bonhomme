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

  // Récupère l'identifiant de l'article
  var id_product = elem.getAttribute('data-article');
 
  // Actionne la sauvegarde l'article et le calcule du prix total 
  var rep = actionParam('../Php/index.php', 'EX=buy&ID_PRODUCT=' + id_product);
  
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
  
  changeContent('window_cart', '../Php/index.php', 'EX=cart', 'initCart()');


    
} // cart()


/**
 * Initialisation de l'écouteur de fermeture de l'élément <div id="window_cart">
 * 
 * @return none
 */
function initCart()
{
  //Récupère l'élément <button id="close">
  var click_close = document.getElementById('close');
  Listener(click_close, 'click', function(){document.getElementById('window_cart').style.display = 'none'});

  //Récupère tous les éléments de class="quantity"
  var click_quantity =  document.getElementsByClassName('quantity');
  var nb_click_quantity = click_quantity.length;

  //Met un gestionnaire d'événement de type click sur tous les éléments de class="quantity"
  for (var i = 0; i < nb_click_quantity; ++i)
  {
	Listener(click_quantity[i], 'click', clickQuantity);
  }
  

  
} // initCart()

function clickQuantity(event)
{
  // Récupère l'élément cliqué (<td>)
  var target = event.target || event.srcElement;
  
  //Récupère la quantité de l'élément cliqué (contenu)
  var quantity = target.innerHTML;
  
  //Crée un élément <input>
  var input = document.createElement('input');
  //Ajoute la quantité récupérée comme valeur de l'élément input
  input.value = quantity;
  
  //Met le contenu l'élément cliqué à vide
  target.innerHTML = '';
  
  //Met un gestionnaire d'événement de type change sur l'élément <input>
  target.appendChild(input);
  
  Listener(input, 'change', changeQuantity);
  

  
} // clickQuantity(event)

function changeQuantity(event)
{
  // Récupère l'élément modifié (<input>)
  var target = event.target || event.srcElement;
  
  //Récupère la quantité de l'élément modifié (value)
  var quantity = target.value;
  
  //Instancie la variable param avec le paramètre ID_PRODUCT
  var param = 'EX=change_quantity&ID_PRODUCT=' + target.parentNode.getAttribute('data-id_product');
  param += '&QUANTITE=' + quantity;

  //Appel de la fonction actionForm() avec comme variable de contrôle change_quantity
   var rep = actionParam('../Php/index.php', param);

  // Modication de la commande et appel à la modification du panier via la callback changeCart()
  changeContent('window_cart', '../Php/index.php', 'EX=cart', 'changeCart()');
  

    
} // changeQuantity(event)

function changeCart()
{
  // Initialisation du panier
  initCart();

  //Récupération de la valeur du total dans la commande
  var total = document.getElementById('total').innerHTML;
	  
  //Modifie le prix total du panier
  document.querySelector('#cart b').innerHTML = total;
  

  
} // changeCart()
