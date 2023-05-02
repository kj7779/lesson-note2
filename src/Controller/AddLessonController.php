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

        $add_pose =$makeLessonRepository->findBy(['lesson_name' =>$lesson_name]);
        $check_pose =$lessonNoteRepository->findAll();
        $count2 =count($check_pose);
        for($i=0; $i< $count2; $i++){
            $check_pose_name[$i] =$check_pose[$i]->getMyLesson();
            if($check_pose_name[$i] == $lesson_name){
                return $this->render('lesson_note/index.html.twig', [
                    'lesson_notes' => $lessonNoteRepository->findAll(),
                ]);
            }
        }
        $count = count($add_pose);
        for($i=0; $i<$count; $i++) {
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