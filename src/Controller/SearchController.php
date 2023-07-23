<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;
use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\CategoryRepository;





class SearchController extends AbstractController
{
    private $entityManager;

    public function __construct(ManagerRegistry $registry)
    {
        $this->entityManager = $registry->getManager();
    }


    #[Route('/search', name: 'app_search')]
    public function search(Request $request, ProductRepository $productRepository): Response
    {
        $keyword = $request->query->get('keyword');

        $product = $productRepository->searchByKeyword($keyword);

        return $this->render('search/index.html.twig', [
            'product' => $product,
            'keyword' => $keyword,
        ]);
    }
    #[Route('/treem', name: 'app_treem')]
    public function treemIndex(ProductRepository $productRepository): Response
    {
        $category = $this->entityManager->getRepository(Category::class)->findOneBy(['name' => 'Trẻ em']);
        $product = $productRepository->findBy(['category' => $category]);

        return $this->render('search/treem/index.html.twig', [
            'product' => $product,
        ]);
    }


    #[Route('/nguoilon', name: 'app_nguoilon')]
    public function nguoilonindex(ProductRepository $productRepository): Response
    {

        $category = $this->entityManager->getRepository(Category::class)->findOneBy(['name' => 'Người lớn']);
        $product = $productRepository->findBy(['category' => $category]);

        return $this->render('search/nguoilon/index.html.twig', [
            'product' => $product,
        ]);
    }
    #[Route('/sinhvien', name: 'app_sinhvien')]

    public function index(ProductRepository $productRepository): Response
    {

        $category = $this->entityManager->getRepository(Category::class)->findOneBy(['name' => 'Sinh viên']);
        $product = $productRepository->findBy(['category' => $category]);

        return $this->render('search/sinhvien/index.html.twig', [
            'product' => $product,
        ]);
    }

}