<?php

namespace App\Controller;

use App\Entity\LessonNote;
use App\Form\LessonNoteType;
use App\Repository\MakeLessonRepository;
use App\Repository\LessonNoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/lesson/add')]
class AddLessonController extends AbstractController
{
    #[Route('/', name: 'app_lesson_note_index', methods: ['GET'])]
    public function add(LessonNoteRepository $lessonNoteRepository, MakeLessonRepository $makeLessonRepository): Response
    {
        return $this->render('lesson_note/index.html.twig', [
            'lesson_notes' => $lessonNoteRepository->findAll(),
        ]);
    }


}