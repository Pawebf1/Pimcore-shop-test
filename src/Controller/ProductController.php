<?php

namespace App\Controller;

use Pimcore\Controller\FrontendController;
use Pimcore\Model\DataObject\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
}
