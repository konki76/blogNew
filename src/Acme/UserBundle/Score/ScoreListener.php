<?php
// src/Acme/UserBundle/Score/ScoreListener.php

namespace Acme\UserBundle\Score;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class ScoreListener
{
    // Notre processeur
  protected $ScoreHTML;

  // La date de fin de la version bêta :
  // - Avant cette date, on affichera un compte à rebours (J-3 par exemple)
  // - Après cette date, on n'affichera plus le « bêta »
  protected $endDate;

    public function __construct(ScoreHTML $ScoreHTML, $endDate)
    {
        $this->ScoreHTML = $ScoreHTML;
        $this->endDate  = new \Datetime($endDate);
    }

    public function processScore(FilterResponseEvent $event)
    {
        if (!$event->isMasterRequest()) {
            return;
        }

        $remainingDays = $this->endDate->diff(new \Datetime())->format('%d');

    // Si la date est dépassée, on ne fait rien
    if ($remainingDays <= 0) {
        return;
    }

    // On utilise notre BetaHTML
    $response = $this->ScoreHTML->displayBeta($event->getResponse(), $remainingDays);
    // On met à jour la réponse avec la nouvelle valeur
    $event->setResponse($response);
    }
}
