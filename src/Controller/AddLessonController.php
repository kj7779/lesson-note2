<?php

namespace App\Controller;

use App\Entity\LessonNote;
use App\Entity\MakeLesson;
use App\Repository\MakeLessonRepository;
use App\Repository\LessonNoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/lesson/note')]
class AddLessonController extends AbstractController
{
    #[Route('/add/{lesson_name}', name: 'app_lesson_note_add', methods: ['GET',"POST"])]
    public function add(string $lesson_name,Request $request,LessonNoteRepository $lessonNoteRepository, MakeLessonRepository $makeLessonRepository): Response
    {
        $i=0;
        $add_pose =$makeLessonRepository->findBy(['lesson_name' =>$lesson_name]);
        for($i; $i<2; $i++) {
            $add_lesson_name = $add_pose[$i]->getLessonName();
            $add_lesson_part = $add_pose[$i]->getLessonPart();
            $lesson_note = new LessonNote();
            $lesson_note->setMyLesson($add_lesson_name);
            $lesson_note->setMyLessonPart($add_lesson_part);
            $lessonNoteRepository->add($lesson_note);
        }
        return $this->render('lesson_note/index.html.twig', [
            'lesson_notes' => $lessonNoteRepository->findAll(),
        ]);
    }


}