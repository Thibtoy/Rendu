<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Film;
use App\Entity\Reservation;
use App\Entity\Seance;

use Symfony\Component\HttpFoundation\JsonResponse;

header("Acces-Control-Allow-Origin: http://localhost:3000");

/**
 * @Route("/api", name="api")
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/", name="apiIndex")
     */
    public function index()
    {
        $test = $this->getDoctrine()->getManager()->getRepository(Film::class)->getLastsFilms();
        $data = [];

        foreach ($test as $item) {
            $seances = [];
            foreach($item->getSeances() as $seance) {
                $seances[] = [
                    'Id' => $seance->getId(),
                    'Date' => $seance->getDate(),
                ];
            }
            $data[] = [
                'Id' => $item->getId(),
                'Titre' => $item->getTitre(),
                'Synopsis' => $item->getSynopsis(),
                'Durée' => $item->getDuree(),
                'Teaser' => $item->getBandeAnnonce(),
                'Sortie' => $item->getDateDeSortie(),
                'Seances' => $seances,
            ];
        }

        return new JsonResponse($data);
    }

    /**
     * @Route("/Reservation", name="apiResa")
     */
    public function Reservation(Request $request, \Swift_Mailer $mailer)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $seance = $entityManager->getRepository(Seance::class)->find($_POST['seance']);
        $reservation = new Reservation();
        $reservation->setEmail($_POST['email']);
        $reservation->setNom($_POST['nom']);
        $reservation->setPrenom($_POST['prenom']);
        $reservation->setSeance($seance);
        $entityManager->persist($reservation);
        $entityManager->flush();

        $message = (new \Swift_Message('Subject'))
                ->setFrom('NoReply@Noreply.com')
                ->setTo($_POST['email'])
                ->setSubject('Reservation dans le super cine tchi-tcha')
                ->setBody('COUCOU TOI!');
                //->setBody('Bonjour '.$_POST['prenom'].' '.$_POST['nom'].'Vous avez reservé une seance');
            $mailer->send($message);

        return new JsonResponse($reservation);
    }   
}
