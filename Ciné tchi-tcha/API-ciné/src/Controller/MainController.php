<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Security;
use App\Form\NewsletterType;
use App\Form\LoginType;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {   
        
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/newsletter", name="newsletter")
     */
    public function newsletter(Request $request, \Swift_Mailer $mailer)
    {
    	$form = $this->createForm(NewsletterType::class);
    	$form->handleRequest($request);
    	if ($form->isSubmitted()) {
    		$list = [];
    		$all = $this->getDoctrine()->getManager()->getRepository(NewsletterAbo::class)->findAll();
    		foreach ($all as $item) {
    			$list[] = $item->getEmail();
    		}
    		$message = (new \Swift_Message('Subject'))
    			->setFrom('NoReply@Noreply.com')
    			->setTo($list)
    			->setSubject($request->request->get('newsletter')['Title'])
    			->setBody($request->request->get('newsletter')['Message']);
    		$mailer->send($message);
    	}

    	return $this->render('main/newsletter.html.twig', [
    			'form' => $form->createView(),
    	]);
    	
    }
}
