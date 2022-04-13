<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\Type\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController{

    /**
     * @Route("/user")
     */
    function createUserForm(Request $request){
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

            $form->handleRequest($request);
            
            if ($form->isSubmitted() && $form->isValid()) { 

                $userInfos = $form->getData(); //On récupère les valeurs saisies dans le forumulaire 
                $entityManager = $this->getDoctrine()->getManager(); 
                $entityManager->persist($userInfos); //On prépare la transaction pour la base de données 
                $entityManager->flush(); //On effectue la transaction vers la base de données 

                return new Response("Form Submitted");
            }
        return $this->render('form.html.twig',['userForm' => $form->createView() ]);
    }
}