<?php

namespace App\Controller;
use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product")
     */
    public function getAll()
    {
    	/*$products = $this->getDoctrine()->getRepository(Product::class)->findAll();
    	 return $this->render('product/manageProduct.html.twig', ['product' => $products]);*/

    	$con =$this->getDoctrine()->getManager()->getConnection();
		$query = $con->prepare('SELECT name,description,quantity FROM Product');
		$query->execute();
		$users = $query->fetchAll(); 
		/*echo "<pre>";
		print_r($users);
		echo "</pre>";
		die;*/

    	/*$entityManager = $this->getDoctrine()->getManager();
        $query = $entityManager->createQuery('SELECT name,description,quantity FROM App\Entity\Product p');
		$users = $query->execute();*/
		 return $this->render('product/manageProduct.html.twig', ['product' => $users]);
    }
}
