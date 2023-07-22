<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findBy([], [], 6); // Lấy tất cả sản phẩm từ repository
        return $this->render('home/index.html.twig', [
            'products' => $products,
        ]);
    }
    #[Route('/productuser', name: 'app_productuser')]
    public function index1(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll(); // Lấy tất cả sản phẩm từ repository
        return $this->render('home/product/index.html.twig', [
            'products' => $products,
        ]);
    }
}
