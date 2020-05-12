<?php

namespace App\Controller;

use App\Entity\Minecraft;
use App\Form\MinecraftType;
use App\Repository\MinecraftRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/minecraft")
 */
class MinecraftController extends AbstractController
{
    /**
     * @Route("/", name="minecraft_index", methods={"GET"})
     */
    public function index(MinecraftRepository $minecraftRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $this->render('minecraft/index.html.twig', [
            'minecrafts' => $minecraftRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="minecraft_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $minecraft = new Minecraft();
        $form = $this->createForm(MinecraftType::class, $minecraft);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($minecraft);
            $entityManager->flush();

            return $this->redirectToRoute('minecraft_index');
        }

        return $this->render('minecraft/new.html.twig', [
            'minecraft' => $minecraft,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="minecraft_show", methods={"GET"})
     */
    public function show(Minecraft $minecraft): Response
    {
        return $this->render('minecraft/show.html.twig', [
            'minecraft' => $minecraft,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="minecraft_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Minecraft $minecraft): Response
    {
        $form = $this->createForm(MinecraftType::class, $minecraft);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('minecraft_index');
        }

        return $this->render('minecraft/edit.html.twig', [
            'minecraft' => $minecraft,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="minecraft_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Minecraft $minecraft): Response
    {
        if ($this->isCsrfTokenValid('delete'.$minecraft->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($minecraft);
            $entityManager->flush();
        }

        return $this->redirectToRoute('minecraft_index');
    }
}
