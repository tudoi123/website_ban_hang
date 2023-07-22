<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;


class ProductdetailController extends AbstractController
{

        #[Route('productdetail/{id}', name: 'app_productdetail', methods: ['GET'])]
        public function show(Product $product): Response
    {
        return $this->render('productdetail/index.html.twig', [
            'products' => $product,
        ]);
    }

}


