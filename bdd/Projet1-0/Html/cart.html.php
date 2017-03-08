<?php
global $value_article;

$tr_body = '';
$prix_total = 0;
// Génère les lignes du tableau du bon de commande
foreach ($value_article as $key => $val)
{
  $prix = $val['NOMBRE']*$val['PRIX'];
  $prix_unit = rtrim($val['PRIX']);
  $prix_total += $prix;
  $tr_body .= <<<HERE
<tr><td>{$val['NOMBRE']}</td><td>{$val['NOM']}</td><td>$prix_unit €</td><td>$prix  €</td></tr>
HERE;
}

$tr_body .= '<tr><td colspan="3">Prix Total</td><td>' . $prix_total . ' €</td>';
?>

<p class="right"><button id="close" class="button close">Quitter</button></p>
<table>
 <thead>
  <tr><th>Quantité</th><th>Articles</th><th>Prix Unit.</th><th>Prix</th></tr>
 </thead>
 <tbody>
  <?=$tr_body?>
 </tbody>
</table>