/**
 * Initialisation des écouteurs
 * @author Christian Bonhomme
 * @version 1.0
 * @package PROJET-MOOC
 */

/**
 * Fonction générique de déclenchement des listeners
 */
function Listener(elem ,event, fnct) 
{
  if (elem)
  {
    // Teste si la méhode addEventListener existe (Non IE)
    if (elem.addEventListener)
    {
      // Associe à  l'événement click la fonction (Non IE)
      elem.addEventListener(event , fnct, false);
    }
    else
    {
      // Associe à  l'événement onclick la fonction  (IE)
      elem.attachEvent('on' + event, fnct);
    }
		
    // Si l'événement est un click on change le curseur de souris
    if ('click' == event) 
    { 
      elem.style.cursor = 'pointer';
    }
  }
  

    
} // Listener(elem ,event, fnct)

/**
 * Gestion du click sur le logo id="logo"
 */
// Récupère l'élément <h1 id="logo">
var click_logo = document.getElementById('logo');
Listener(click_logo, 'click', function(){location.replace('../Php/index.php')});

/**
 * Gestion du formulaire
 *
 * @return none
 */
function initSubmitContact()
{
  // Récupère l'élément <form>
  var submit_form = document.getElementsByTagName('form')[0];
  Listener(submit_form, 'submit', verifForm);
  
  // Teste si l'élément <form> existe
  if (submit_form)
  {
	// Récupère l'élément <input id="email">
	var change_email = document.getElementById('email');
	Listener(change_email, 'change', verifEmail);

	// Récupère les éléments ayant class="phone"
	var change_phone = document.getElementsByClassName('phone');
	// Calcule le nombre d'éléments ayant class="phone"
	var nb_change_phone = change_phone.length;
	// Boucle sur les éléments ayant class="phone"
	for (var i = 0; i < nb_change_phone; ++i)
	{
	  Listener(change_phone[i], 'change', verifTelephone);
	}
  }
  


} // initSubmitContact()

//Récupère les éléments ayant class="buy"
var click_buy = document.getElementsByClassName('buy');
// Calcule le nombre d'éléments ayant class="buy"
var nb_click_buy = click_buy.length;
//Boucle sur les éléments ayant class="buy"
for (var i = 0; i < nb_click_buy; ++i)
{
  Listener(click_buy[i], 'click', buy);
}

//Récupère l'élément <span id="contact">
var click_contact = document.getElementById('contact');
Listener(click_contact, 'click', function(){changeContent('content', '../Php/index.php', 'EX=contact', 'initSubmitContact()')});

//Récupère l'élément <div id="cart">
var click_cart = document.getElementById('cart');
Listener(click_cart, 'click', cart);

/**
 * Fonction d'arrêt de la propagation d'un événement dans la phase de bouillonnement
 * @param event objet événement
 *
 * @return none
 */
function stopEvent(event)
{
  // Teste si la méthode stopPropagation existe (Non IE)
  if (event.stopPropagation)
  {
    // Stoppe la propagation de l'événement (pas de bouillonnement)
    event.stopPropagation();
    // Remet l'événement à false
    event.preventDefault();
  }
  else
  {
    // Stoppe la propagation de l'événement (pas de bouillonnement)
    event.cancelBubble = true;
    // Remet l'événement à false
    event.returnValue = false;
  }
  


} // stopEvent(event)
