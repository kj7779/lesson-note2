<?php

namespace App\Controller;

use App\Entity\LessonNote;
use App\Form\LessonNoteType;
use App\Repository\LessonNoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/lesson/note')]
class LessonNoteController extends AbstractController
{
    #[Route('/', name: 'app_lesson_note_index', methods: ['GET'])]
    public function index(LessonNoteRepository $lessonNoteRepository): Response
    {
        $sort=[];
        $check_pose =$lessonNoteRepository->findAll();
        $count2 =count($check_pose);
        for($i=0; $i<$count2; $i++) {
            $sort[$i] = $check_pose[$i]->getMyLesson();
        }
        $sort2 = array_unique($sort);

        return $this->render('lesson_note/index.html.twig', [
            'lesson_notes' => $lessonNoteRepository->findAll(),
            'lesson_notes2' => $sort2
        ]);
    }

    #[Route('/new', name: 'app_lesson_note_new', methods: ['GET', 'POST'])]
    public function new(Request $request, LessonNoteRepository $lessonNoteRepository): Response
    {
        $lessonNote = new LessonNote();
        $form = $this->createForm(LessonNoteType::class, $lessonNote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $lessonNoteRepository->save($lessonNote, true);

            return $this->redirectToRoute('app_lesson_note_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lesson_note/new.html.twig', [
            'lesson_note' => $lessonNote,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_lesson_note_show', methods: ['GET'])]
    public function show(LessonNote $lessonNote): Response
    {
        return $this->render('lesson_note/show.html.twig', [
            'lesson_note' => $lessonNote,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_lesson_note_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, LessonNote $lessonNote, LessonNoteRepository $lessonNoteRepository): Response
    {
        $form = $this->createForm(LessonNoteType::class, $lessonNote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $lessonNoteRepository->save($lessonNote, true);

            return $this->redirectToRoute('app_lesson_note_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lesson_note/edit.html.twig', [
            'lesson_note' => $lessonNote,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_lesson_note_delete', methods: ['POST'])]
    public function delete(Request $request, LessonNote $lessonNote, LessonNoteRepository $lessonNoteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lessonNote->getId(), $request->request->get('_token'))) {
            $lessonNoteRepository->remove($lessonNote, true);
        }

        return $this->redirectToRoute('app_lesson_note_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/sort/{my_lesson}', name: 'app_lesson_note_sort', methods:  ['GET', 'POST'])]
    public function sort(string $my_lesson,Request $request,LessonNoteRepository $lessonNoteRepository): Response
    {
        $sort=[];
        $check_pose =$lessonNoteRepository->findAll();
        $count2 =count($check_pose);
        for($i=0; $i<$count2; $i++) {
            $sort[$i] = $check_pose[$i]->getMyLesson();
        }
        $sort2 = array_unique($sort);
        return $this->render('lesson_note/index.html.twig', [
            'lesson_notes' => $lessonNoteRepository->findBy(['my_lesson' => $my_lesson]),
            'lesson_notes2' => $sort2
        ]);
    }
}
