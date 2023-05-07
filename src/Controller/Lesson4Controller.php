<?php

namespace App\Controller;

use App\Entity\Lesson4;
use App\Form\Lesson4Type;
use App\Repository\Lesson4Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/lesson4')]
class Lesson4Controller extends AbstractController
{
    #[Route('/', name: 'app_lesson4_index', methods: ['GET'])]
    public function index(Lesson4Repository $lesson4Repository): Response
    {
        return $this->render('lesson4/index.html.twig', [
            'lesson4s' => $lesson4Repository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_lesson4_new', methods: ['GET', 'POST'])]
    public function new(Request $request, Lesson4Repository $lesson4Repository): Response
    {
        $lesson4 = new Lesson4();
        $form = $this->createForm(Lesson4Type::class, $lesson4);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $lesson4Repository->save($lesson4, true);

            return $this->redirectToRoute('app_lesson4_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lesson4/new.html.twig', [
            'lesson4' => $lesson4,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_lesson4_show', methods: ['GET'])]
    public function show(Lesson4 $lesson4): Response
    {
        return $this->render('lesson4/show.html.twig', [
            'lesson4' => $lesson4,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_lesson4_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Lesson4 $lesson4, Lesson4Repository $lesson4Repository): Response
    {
        $form = $this->createForm(Lesson4Type::class, $lesson4);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $lesson4Repository->save($lesson4, true);

            return $this->redirectToRoute('app_lesson4_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('lesson4/edit.html.twig', [
            'lesson4' => $lesson4,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_lesson4_delete', methods: ['POST'])]
    public function delete(Request $request, Lesson4 $lesson4, Lesson4Repository $lesson4Repository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lesson4->getId(), $request->request->get('_token'))) {
            $lesson4Repository->remove($lesson4, true);
        }

        return $this->redirectToRoute('app_lesson4_index', [], Response::HTTP_SEE_OTHER);
    }
}
