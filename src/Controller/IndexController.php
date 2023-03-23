<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\Type\ContactType;
use App\Form\Type\TriType;
use App\Repository\AccessoryRepository;
use App\Repository\AtoRepository;
use App\Repository\DiyRepository;
use App\Repository\EcigRepository;
use App\Repository\EliquidRepository;
use App\Repository\FullkitRepository;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    protected function tri($productRepository)
    {
        $tri =  $_GET['tri']['option2'] ?? "";
	    $products = match ( $tri ) {
		    'a' => $productRepository->findAllByPriceAsc(),
		    'b' => $productRepository->findAllByPriceDesc(),
		    'c' => $productRepository->findAllByAZ(),
		    'd' => $productRepository->findAllByZA(),
		    default => $productRepository->findAll(),
	    };
		return $products;

    }
    
    protected function showProducts($productRepository, $repository, $type){
        $Products = $repository->findAll();
        $form = $this->createForm(ContactType::class, null, [
            'action' => $this->generateUrl('traitementmail'),
        ]);
        $tri = $this->createForm(TriType::class );
        $products = $this->tri($productRepository);
        return $this->render('index/'.$type.'.html.twig', [$type.'sProducts' => $Products, 'products' => $products, 'form' => $form->createView(), 'tri' => $tri->createView()]);
    }
    /**
     * @Route("index/legaleNotice", name="legaleNotice")
     */
    public function legaleNotice() : Response
    {
        return $this->render('index/legaleNotice.html.twig'); 
    }
    /**
     * @Route("/index", name="index")
     */
    public function index(ProductRepository $productRepository): Response {
        unset($_COOKIE["__stripe_mid"]);
        $nouveau = $productRepository->findBy(
            ['nouveau' => 1]
        );
        $form = $this->createForm(ContactType::class, null, [
            'action' => $this->generateUrl('traitementmail'),
        ]);
        return $this->render('index/index.html.twig', ['form' => $form->createView(),'nouveau' => $nouveau]);

    }

    /**
     * @Route("/product/traitementmail", name="traitementmail")
     */
    public function traitementmail(): RedirectResponse {
        $contact = $_POST['contact'];
        $lastName = $contact['lastName'];
        $firstName = $contact['firstName'];
        $email = $contact['email'];
        $msg = $contact['msg'];

        $to      = '';
        $subject = 'support';
        $message = '<strong>Nom : '.$lastName.'</strong></br>
                    <strong>Prénom : '.$firstName.'</strong></br>
                    <strong>Message: '.$msg;
        // $message = 'Bonjour '.$lastName.' '.$firstName.'! ceci est un test. votre adresse mail est : '.$email.'. Et votre message est :'.$msg.'';
        $headers = 'From: webmaster@symproject2.fr' . "\r\n" .
        'Reply-To: '.$email."\r\n" .
        'X-Mailer: PHP/' . phpversion();
    
        mail($to, $subject, $message, $headers);
        return $this->redirectToRoute('index');
    }
    /**
     *  @Route("eliquid", name="eliquid")
     */
    public function eliquid(EliquidRepository $eliquidRepository, ProductRepository $productRepository): Response {        
        return $this->showProducts($productRepository, $eliquidRepository, "eliquid");
    }

    /**
     *  @Route("/ficheTechnique/{id}", name="ficheTechnique")
     */
    public function ficheTechnique($id, ProductRepository $productRepository, EliquidRepository $eliquidRepository): Response {
        $product = $productRepository->find($id);
        $product= $product[0];
        $form = $this->createForm(ContactType::class, null, [
            'action' => $this->generateUrl('traitementmail'),
        ]);
        $eliquid = $eliquidRepository->findBy([
            'product' => $id
        ]);
        return $this->render('index/ficheTechnique.html.twig', ['product' => $product, 'eliquid' => $eliquid[0], 'form' => $form->createView()]);
    }

    /**
     * @Route("/ecig", name="Ecig")
     */
    public function Ecig(EcigRepository $ecigRepository, ProductRepository $productRepository): Response {
        return $this->showProducts($productRepository, $ecigRepository, 'ecig');

    }

    /**
     * @Route("/atomizer", name="ato")
     */
    public function ato(AtoRepository $atoRepository, ProductRepository $productRepository): Response {
        return $this->showProducts($productRepository, $atoRepository, 'ato');
    }
    
    /**
     * @Route("/accessory", name="accessory")
     */
    public function accessory(AccessoryRepository $accessoryRepository, ProductRepository $productRepository): Response {
        return $this->showProducts($productRepository, $accessoryRepository, 'accessory');
    }

    /**
     * @Route("/diy", name="diy")
     */
    public function diy(DiyRepository $diyRepository, ProductRepository $productRepository): Response {
        return $this->showProducts($productRepository, $diyRepository, 'diy');
    }
    
    /**
     * @Route("/fullkit", name="Fullkit")
     */
    public function Fullkit(FullkitRepository $fullkitRepository, ProductRepository $productRepository): Response {
        return $this->showProducts($productRepository, $fullkitRepository, 'fullkit');
    }
}