<?php

namespace App\Controller;

use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;


class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     */
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles_array= $articleRepository->findAll();
        if (!$articles_array){
            throw $this->createNotFoundException("aucune table");
        }
        else {
            return $this->render('article/index.html.twig', [
                'articles' => $articles_array ]);
        }

    }
    /**
     * @Route("/article/{id}", name="article_byId")
     */
    public function articleDetail(ArticleRepository $articleRepository,$id): Response
    {
        $article= $articleRepository->find($id);
        if (!$article){
           throw $this->createNotFoundException("pas d'article avec ce id");
        }
        else {
            return $this->render('article/detail.html.twig', [
                'article' => $article ]);
        }

    }

    /**
     * @Route("/add/article", name="article_add")
     */

    public function add(Request $request): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager(); // On r&#xE9;cup&#xE8;re l'entity manager
            $em->persist($article); // On confie notre entit&#xE9; &#xE0; l'entity manager (on persist l'entit&#xE9;)
            $em->flush(); // On execute la requete
            return $this->redirectToRoute('article');
        }

        return $this->render('article/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete_article")
     */

    public function delete(ArticleRepository $articleRepository,$id): Response
    {
        $em = $this->getDoctrine()->getManager();
        $article= $articleRepository->find($id);
        $em->remove($article);
        $em->flush();
        return $this->redirectToRoute('article');
    }

    /**
     * @Route("/update/{id}", name="update_article")
     */

    public function update(ArticleRepository $articleRepository,$id, Request $request): Response
    {

        $article = $articleRepository->find($id);
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $article = $form->getData();
            $em->persist($article);
            $em->flush();
            return $this->redirectToRoute('article');
        }
        return $this->render('article/update.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
