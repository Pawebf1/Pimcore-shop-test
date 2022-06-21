<?php

namespace App\Controller;

use Pimcore\Controller\FrontendController;
use Pimcore\Model\DataObject\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends FrontendController
{

    public function productTeaserAction(Request $request)
    {
        if ($request->get('type') == 'object') {
            if ($product = Product::getById($request->get('id'))) {
                return $this->render('product/product_teaser.html.twig', ['product' => $product]);
            }
        }

        throw new NotFoundHttpException('Product not found.');
    }

    /**
     * @Route("/products/{!id}", name="product_list")
     *
     * @param Request $request
     *
     * @return Response
     */
    public function productViewAction(Request $request, int $id)
    {
        $product = Product::getById($id);
        return $this->render('product/index.html.twig', ['product' => $product]);
    }
}
