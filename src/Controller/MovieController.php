<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use App\Entity\Movie;
use App\Form\MovieType;

/**
 * Movie controller
 * @Route("/api", name="api_")
 */

class MovieController extends FOSRestController
{
   /**
    * List All Movie
    * @Rest\Get("/Movies")
    * @return Response
    */
    public function getMovieAction()
    {
        $rep = $this->getDoctrine()->getRepository(Movie::class);

        $movies = $rep->findAll();

        return $this->handleView($this->view($movies));
    }
    /**
     * create Movie
     * @Rest\Post("/Movie")
     * @param Request $request
     * @return Response
     */
    public function postMovieAction(Request $request)
    {
        $movie = new Movie();
        $form = $this->createForm(MovieType::class, $movie);
        
        $data = json_decode($request->getContent(), true);
        $form->submit($data);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($movie);
            $em->flush();
            return $this->handleView($this->view(['status' => 'success'], Response::HTTP_CREATED));
        }
        return $this->handleView($this->view($form->getErrors()));
    }
}
