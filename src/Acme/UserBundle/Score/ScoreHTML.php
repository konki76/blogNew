<?php
// src/Acme/UserBundle/Score/Score.php

namespace Acme\UserBundle\Score;

use Symfony\Component\HttpFoundation\Response;

class ScoreHTML
{
  // M�thode pour ajouter le � b�ta � � une r�ponse
  public function displayBeta(Response $response, $remainingDays)
  {
  
    $content = $response->getContent();

    // Code � rajouter
//    $html = '<span style="color: red; font-size: 0.5em;"> - FROM Score Beta J-'.(int) $remainingDays.' !</span>';
	$html = '';
    // Insertion du code dans la page, dans le premier <h1>
    $content = preg_replace(
      '#<h1>(.*?)</h1>#iU',
      '<h1>$1'.$html.'</h1>',
      $content,
      1
    );

    // Modification du contenu dans la r�ponse
    $response->setContent($content);

    return $response;
  }
}