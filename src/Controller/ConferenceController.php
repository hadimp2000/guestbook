<?php

namespace App\Controller;

use App\Entity\Conference;
use App\Repository\CommentRepository;
use App\Repository\ConferenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Twig\Environment;

final class ConferenceController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(Environment $twig, ConferenceRepository $conferenceRepository): Response
    {
        return new Response($twig->render('conference/index.html.twig', [
            'conferences' => $conferenceRepository->findAll(),
        ]));
    }

    #[Route('/conference/{id}', name: 'conference_show')]
    public function show(Environment $twig, string $id, Conference $conference, CommentRepository $commentRepository): Response
    {
        // foreach($conferenceRepository->find($id)->getComments() as $comment) {
        //     dump($comment);
        // }die;
        // dump($conferenceRepository->find($id)->getComments());die;
        return new Response($twig->render('conference/show.html.twig', [
            'conference' => $conference,
            'comments' => $commentRepository->findBy(['conference' => $conference]),
        ]));
    }
}
