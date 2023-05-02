<?php

namespace App\Controller;

use App\Entity\MakeLesson;
use App\Form\MakeLessonType;
use App\Repository\MakeLessonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/make/lesson')]
class MakeLessonController extends AbstractController
{
    #[Route('/', name: 'app_make_lesson_index', methods: ['GET'])]
    public function index(MakeLessonRepository $makeLessonRepository): Response
    {
        return $this->render('make_lesson/index.html.twig', [
            'make_lessons' => $makeLessonRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_make_lesson_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MakeLessonRepository $makeLessonRepository): Response
    {
        $makeLesson = new MakeLesson();
        $form = $this->createForm(MakeLessonType::class, $makeLesson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $makeLessonRepository->save($makeLesson, true);

            return $this->redirectToRoute('app_make_lesson_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('make_lesson/new.html.twig', [
            'make_lesson' => $makeLesson,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_make_lesson_show', methods: ['GET'])]
    public function show(MakeLesson $makeLesson): Response
    {
        return $this->render('make_lesson/show.html.twig', [
            'make_lesson' => $makeLesson,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_make_lesson_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, MakeLesson $makeLesson, MakeLessonRepository $makeLessonRepository): Response
    {
        $form = $this->createForm(MakeLessonType::class, $makeLesson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $makeLessonRepository->save($makeLesson, true);

            return $this->redirectToRoute('app_make_lesson_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('make_lesson/edit.html.twig', [
            'make_lesson' => $makeLesson,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_make_lesson_delete', methods: ['POST'])]
    public function delete(Request $request, MakeLesson $makeLesson, MakeLessonRepository $makeLessonRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$makeLesson->getId(), $request->request->get('_token'))) {
            $makeLessonRepository->remove($makeLesson, true);
        }

        return $this->redirectToRoute('app_make_lesson_index', [], Response::HTTP_SEE_OTHER);
    }
}
