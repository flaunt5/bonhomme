/**
 * Fichier Javascript appelant tous les autres fichiers
 * @author Christian Bonhomme
 * @version 1.0
 * @package PROJET-MOOC
 */

var src = [];
var i = 0;

src[i++] = 'ajax.js';
src[i++] = 'form.js';
src[i++] = 'cart.js';
src[i++] = 'init.js';

for (var j = 0; j < i; ++j)
{
  document.write('<script src="../Js/' + src[j] + '"></script>');
}
