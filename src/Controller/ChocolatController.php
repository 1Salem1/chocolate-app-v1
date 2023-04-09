<?php

namespace App\Controller;

use App\Entity\Chocolate;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ChocolatController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/nos-produits", name="products")
     */
    public function index(Request $request)
    {
       
       

   
            $products = $this->entityManager->getRepository(Chocolate::class)->findAll();
  

        return $this->render('produit/index.html.twig', [
            'products' => $products
            
        ]);
    }

    /**
     * @Route("/produit/{slug}", name="product")
     */
    public function show($slug)
    {
        $product = $this->entityManager->getRepository(Chocolate::class)->findOneBySlug($slug);
        $products = $this->entityManager->getRepository(Chocolate::class)->findByIsBest(1);

        if (!$product) {
            return $this->redirectToRoute('products');
        }

        return $this->render('produit/show.html.twig', [
            'product' => $product,
            'products' => $products
        ]);
    }
}
