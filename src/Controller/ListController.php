<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\User;
use App\Entity\Comment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListController extends AbstractController
{
    /**
     * @Route("/list", name="list")
     */
    public function index(EntityManagerInterface $em): Response
    {
        $listPosts = $em->getRepository(Post::class)->findBy([], ['created_at' => 'DESC']);

        return $this->render('list/index.html.twig', [
            'listPosts' => $listPosts,
        ]);
    }
}
