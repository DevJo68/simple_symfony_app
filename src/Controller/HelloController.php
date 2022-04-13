<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\Greeter;



class HelloController extends AbstractController{

 
    /**
     * @Route("hello/{_locale}")
     */
    function hello(Request $request, Greeter $greeter){
           $message = $greeter->greet();
           //return new Response('Hello locale:'.$locale);
           return new Response($message);
    }


    /**
     * @Route("hello/{name}", name="helloWithName")
     */
    function helloWithName($name){

           return new Response('Hello '.$name);

        //return new Response('Hello number !'.$name);
     //var_dump($request->query);
    }



}