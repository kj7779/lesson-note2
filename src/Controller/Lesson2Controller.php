<?php

namespace App\Controller;

use App\Entity\Lesson2;
use App\Form\Lesson2Type;
use App\Repository\Lesson2Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/lesson2')]
class Lesson2Controller extends AbstractController
{
    #[Route('/', name: 'app_lesson2_index', methods: ['GET'])]
    public function index(Lesson2Repository $lesson2Repository): Response
    {
        return $this->render('lesson2/index.html.twig', [
            'lesson2s' => $lesson2Repository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_lesson2_new', methods: ['GET', 'POST'])]
    public function new(Request $request, Lesson2Repository $lesson2Repository): Response
    {
        $lesson2 = new Lesson2();
        $form = $this->createForm(Lesson2Type::class, $lesson2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $lesson2Repository->save($lesson2, true);

            return $this->redirectToRoute('app_lesson2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lesson2/new.html.twig', [
            'lesson2' => $lesson2,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_lesson2_show', methods: ['GET'])]
    public function show(Lesson2 $lesson2): Response
    {
        return $this->render('lesson2/show.html.twig', [
            'lesson2' => $lesson2,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_lesson2_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Lesson2 $lesson2, Lesson2Repository $lesson2Repository): Response
    {
        $form = $this->createForm(Lesson2Type::class, $lesson2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $lesson2Repository->save($lesson2, true);

            return $this->redirectToRoute('app_lesson2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lesson2/edit.html.twig', [
            'lesson2' => $lesson2,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_lesson2_delete', methods: ['POST'])]
    public function delete(Request $request, Lesson2 $lesson2, Lesson2Repository $lesson2Repository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lesson2->getId(), $request->request->get('_token'))) {
            $lesson2Repository->remove($lesson2, true);
        }

        return $this->redirectToRoute('app_lesson2_index', [], Response::HTTP_SEE_OTHER);
    }
}
