/**
 * Fonctions utilisées pour les formulaires
 * @author Christian Bonhomme
 * @version 1.0
 * @package PROJET-MOOC
 */

// Tableau des éléments obligatoires du formulaire
var elemRequired = [];
// Tableau de booleens des éléments obligatoires du formulaire
var boolNoRequired = [];
/**
 * Vérification du formulaire 
 * Vérifie que les attributs de type NOT NULL soient renseignés
 * @param événement
 * 
 * return boolean
 */
function verifForm(event)
{
  // Récupère l'élément <form>
  var frm = event.target || event.srcElement;
  
  // Récupère les éléments <label>
  var tabLabel = frm.getElementsByTagName('label');
  // Récupère le nombre d'éléments <label>
  var nbLabel = tabLabel.length;

  // Boucle sur les éléments <label>
  for (var i = 0, k = 0, message = [], errors = 0; i < nbLabel; ++i)
  {
    // Récupère, dans l'élément <label> d'indice i, le contenu de l'attribut for 
    // correspondant au id de l'élément associé au label (input, select, ...)
    var atFor = tabLabel[i].getAttribute('for');

    // Teste si l'attribut for existe
    if (atFor)
    {
      // Récupère l'élément associé au label ayant pour id la valeur de l'attribut for
      var elemById = document.getElementById(atFor);
 
      // Récupére la valeur de la classe associée à l'id
      var atClass = elemById.getAttribute('class');
      
      // Teste si l'attribut class existe
      if (atClass)
      {
      	// Expression régulière permettant de rechercher le mot mandatory
      	var pattern = /(required)/;
     	// Si la class est required et l'élément est vide alors erreur
    	if (pattern.test(atClass))
    	{
          // Eléments du formulaire    	
          elemRequired[k] = elemById;
          // Eléments non requis (initialisation par défaut)
          boolNoRequired[k] = false;
          
    	  if (!elemById.value)
    	  {
    	    // Eléments requis
    		boolNoRequired[k] = true;
    	    // Message d'erreurs en récupérant le texte du label
            message[errors] = '- ' + tabLabel[i].innerHTML;
            // Incrémentation du compteur d'erreurs
    	    ++errors;
    	  }
      	  
      	  ++k;
    	}
      }
    }
  }
  
  // Si error est différent de 0 alors alerte
  if (errors)
  {
    // Message d'erreurs suivant le nombre d'erreurs
    var text_message = (errors > 1) ? 'Vous devez renseigner les champs suivants :' : 'Vous devez renseigner le champ suivant :';
	    
    // Appel à la fenêtre d'erreur personnalisée
    windowError(text_message, message, errors);
    
    // Stop l'événement
    stopEvent(event);
	    
    return false;
  }

  return true;

} // verifForm(event)

/**
 * Fenêtre d'erreurs personnalisée 
 * Affiche une Fenêtre d'erreurs personnalisée 
 * @param text_message message d'erreur
 * @param message tableau des messages (champs non renseignés)
 * @param errors nombre d'erreurs
 * 
 * return none
 */
function windowError(text_message, message, errors)
{
  // Teste si la boîte d'alerte est affichée
  if ('block' == document.getElementById('error').style.display) return false;
	
  // Crée un élément paragraphe <p>
  var p = document.createElement('p');
  // Ajoute à l'élément paragraphe <p> le début du message suivant si une ou plusieurs erreurs
  p.innerHTML = text_message;

  // Récupère l'élément <div id="error">
  var window = document.getElementById('error');
  // Ajoute à l'élément <div id="error"> l'élément paragraphe <p>
  window.appendChild(p);
  
  for (var i = 0; i < errors; ++i)
  {
    // Crée un élément paragraphe <p>
    var p = document.createElement('p');
    // Insère dans l'élément paragraphe <p> son message
    p.innerHTML = message[i];
    // Ajoute un attribut class="label"
    p.setAttribute('class', 'label');
    // Ajoute à l'élément <div id="error"> l'élément paragraphe <p>
    window.appendChild(p);
  }
  
  // Crée un élément paragraphe <button>
  var button = document.createElement('button');
  // Ajoute à l'élément paragraphe <button> la valeur Ok
  button.innerHTML = 'Ok';
  // Ajoute un attribut événement intrinsèque onclick
  button.setAttribute('onclick', 'closeDivError()');

  // Crée un élément paragraphe <p>
  var p = document.createElement('p');
  // Ajoute un attribut class="center"
  p.setAttribute('class', 'center');
  // Ajoute à l'élément <p> l'élément button <button>
  p.appendChild(button);
  
  // Ajoute à l'élément <div id="error"> l'élément paragraphe <p>
  window.appendChild(p);
    
  // Visualise l'élément <div id="error">
  window.style.display = 'block';
    
  // Récupère la largeur de l'élément <div id="error">
  var window_width = window.offsetWidth;
  // Récupère la hauteur de l'élément <div id="error">
  var window_height = window.offsetHeight;
     
  // Déplace l'élément <div id="error"> vers la gauche de la moitié de sa largeur
  window.style.marginLeft = '-' + Math.round(window_width/2) + 'px';
  // Déplace l'élément <div id="error"> vers le haut de la moitié de sa hauteur
  window.style.marginTop = '-50px';  

} // windowError(text_message, message, errors)


/**
 * Fermeture de la fenêtre d'erreurs 
 * 
 * @return none
 */
function closeDivError()
{
  // Récupère l'élément <div id="error">
  var div_error = document.getElementById('error');
  // Efface le contenu de l'élément <div id="error">
  div_error.innerHTML = '';
  
  // Rends non visible l'élément <div id="error">
  div_error.style.display = 'none';
  
  // Nombre d'éléments du formulaire
  var nbElem = elemRequired.length;
  
  // Boucle sur les éléments du formulaire  
  for (var i = 0; i < nbElem; ++i)
  {
	// Récupération de la valeur de l'attribut class
	var classRequired = elemRequired[i].getAttribute('class');
	// Suppression du mot norequired (remise à zéro)
	classRequired = classRequired.replace(' norequired', '');

	// Test si l'élément est obligatoire et non renseigné
	if (boolNoRequired[i])
	{
	  // Ajout du mot norequired
      classRequired += ' norequired';
	}
	
	// Remplacement du contenu de la class par son nouveau contenu
    elemRequired[i].setAttribute('class', classRequired);
  }
  

  
} // closeDivError()

/**
 * Vérification de l'email 
 * @param event événement
 * 
 * @return none
 */
function verifEmail(event)
{
  // Récupère l'élément <input>
  var elem = event.target || event.srcElement;

  // Expression régulière vérifiant la validité de  l'email
  var pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

  // Teste si l'email est valide
  if (!elem.value.match(pattern))
  {
    // Appel à la fenêtre d'erreur personnalisée
	windowError('Votre adresse email comporte une erreur !');
  }
  
} // verifEmail(event)


/**
 * Vérification du format du téléphone 
 * @param event événement
 * 
 * @return none
 */
function verifTelephone(event)
{
  // Récupère l'élément <input>
  var elem = event.target || event.srcElement;
  
  // Expression régulière vérifiant la validité du format de téléphone
  var pattern = /^\(?([0-9]{2})[.]?([0-9]{2})[.]?([0-9]{2})[.]?([0-9]{2})[.]?([0-9]{2})$/; 
  
  // Teste si le format du telephone est valide
  if (!elem.value.match(pattern))
  {
    // Appel à la fenêtre d'erreur personnalisée
    windowError("Le numéro de téléphone n\'est pas dans un bon format.");
    // Remise à vide du champ
    elem.value = '';
  }
  
} // verifTelephone(event)