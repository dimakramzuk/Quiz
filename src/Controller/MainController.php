<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;



class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function index(QuestionRepository $questionRepository)
    {
        $questions = $questionRepository->findBy([], ['created' => 'DESC']);
        return $this->render('main/index.html.twig', [
            'questions' => $questions,
        ]);
    }
}
