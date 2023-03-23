<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;
use App\Form\Type\ProductType;
use App\Form\Type\EliquidType;
use App\Form\Type\EcigType;
use App\Form\Type\AtoType;
use App\Form\Type\AccessoryType;
use App\Form\Type\DiyType;
use App\Form\Type\FullkitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Product;
use App\Entity\Eliquid;
use App\Entity\Ecig;
use App\Entity\Ato;
use App\Entity\Accessory;
use App\Entity\Diy;
use App\Entity\Fullkit;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;
use App\Repository\ProductRepository;
use App\Repository\EliquidRepository;
use App\Repository\EcigRepository;
use App\Repository\DiyRepository;
use App\Repository\FullkitRepository;
use App\Repository\AtoRepository;
use Doctrine\Persistence\ManagerRegistry;

class ProductsController extends AbstractController
{
    private $requestStack;
    public function __construct(RequestStack $requestStack, SluggerInterface $slugger)
    {
        $this->requestStack = $requestStack;
        $this->slugger = $slugger;
    }
    private $slugger;

    /**
     * @Route("/products/show", name="show")
     */
    public function show(Request $request, ProductRepository $productRepository, EliquidRepository $eliquidRepository, EcigRepository $ecigRepository, DiyRepository $diyRepository, FullkitRepository $fullkitRepository, AtoRepository $atoRepository)
    {
         if ($_SERVER['REMOTE_ADDR'] == $_ENV['IPADMIN']) {
            //list 
            $showProduct = $productRepository->findAll();
            $showEliquid = $eliquidRepository->findAll();
            $showEcig = $ecigRepository->findAll();
            $showDiy = $diyRepository->findAll();
            $showFullkit = $fullkitRepository->findAll();
            $showAto = $atoRepository->findAll();

            //end list
            return $this->creationForm($request, $showProduct, $showEcig, $showEliquid, $showDiy, $showFullkit, $showAto); //call creationForm function
        } else {
            return $this->attack($_SERVER['REMOTE_ADDR']);
        }
    }

    public function attack($ip)
    {
        return $this->render('product/attack.html.twig', ['ipattack' => $ip]);
    }
    public function creationForm(Request $request, $showProduct, $showEcig, $showEliquid, $showDiy, $showFullkit, $showAto)
    {
        // form creation add product
        $formulaire = new Product(); //instantiates the entity Product
        $form = $this->createForm(ProductType::class, $formulaire); // form creation add product
        $form->handleRequest($request); //retrieving form content

        $liquid = new Eliquid(); //instantiates the entity Eliquid
        $formEliquid = $this->createForm(EliquidType::class, $liquid); //form creation add eliquid
        $formEliquid->handleRequest($request);

        $ecig = new Ecig(); //instantiates the entity Ecig
        $formEcig = $this->createForm(EcigType::class, $ecig); //form creation add ecig
        $formEcig->handleRequest($request);

        $ato = new Ato(); //instantiates the entity Eliquid
        $formAto = $this->createForm(AtoType::class, $ato); //form creation add ato
        $formAto->handleRequest($request);

        $accessory = new Accessory(); //instantiates the entity Eliquid
        $formAccessory = $this->createForm(AccessoryType::class, $accessory); //form creation add accessory
        $formAccessory->handleRequest($request);

        $diy = new Diy(); //instantiates the entity Eliquid
        $formDiy = $this->createForm(DiyType::class, $diy); //form creation add diy
        $formDiy->handleRequest($request);

        $fullKit = new Fullkit(); //instantiates the entity Fullkit
        $formFullKit = $this->createForm(FullkitType::class, $fullKit);//form creation add fullkit
        $formFullKit->handleRequest($request);

        // $new = $this->createForm(NewType::class, null);
        return $this->updateForm($showProduct, $form, $formEliquid, $formEcig, $formAto, $formAccessory, $formDiy, $formFullKit, $showEcig, $showEliquid, $showDiy, $showFullkit, $showAto);//, $new); //call updateForm function
    }
    /**
     * @Route("/product/traitementModifNew", name="traitementModifNew")
     */
    public function traitementModifNew(ManagerRegistry $doctrine)
    {
        $nouveau = $_GET['checked'] === "false" ? 0 : 1;
        
        $entityManager = $doctrine->getManager();
        $product = $entityManager->getRepository(Product::class)->find($_GET['id']);
        $product->setNouveau($nouveau);
        $entityManager->persist($product);
        $entityManager->flush();
        return $this->render('product/json.html.twig');
    }
    public function updateForm($showProduct, $form, $formEliquid,  $formEcig, $formAto, $formAccessory, $formDiy, $formFullKit, $showEcig, $showEliquid, $showDiy, $showFullkit, $showAto)//, $new)
    {
        $forms = []; //creation of empty table
        $formsEliquid = [];
        $formsEcig = [];
        $formsAto = [];
        $formsDiy = [];
        $formsFullkit = [];
        // form creation edit product
        foreach ($showProduct as $key => $product) {
            $updateForm  = $this->createForm(ProductType::class, $product);
            $updateForm2 = $updateForm->createView();
            $forms[]     = $updateForm2; //put forms ($updateform) in the variable ($updateForms)
        }
        foreach ($showEliquid as $key => $eliquid) {
            $updateEliquidForm = $this->createForm(EliquidType::class, $eliquid);
            $updateEliquidForm2 = $updateEliquidForm->createView();
            $formsEliquid[] = $updateEliquidForm2;
        }
        foreach ($showEcig as $key => $ecig) {
            $updateEcigForm = $this->createForm(EcigType::class, $ecig);
            $updateEcigForm2 = $updateEcigForm->createView();
            $formsEcig[] = $updateEcigForm2;
        }
        foreach ($showAto as $key => $ato) {
            $updateAtoForm = $this->createForm(AtoType::class, $ato);
            $updateAtoForm2 = $updateAtoForm->createView();
            $formsAto[] = $updateAtoForm2;
        }
        foreach ($showDiy as $key => $diy) {
            $updateDiyForm = $this->createForm(DiyType::class, $diy);
            $updateDiyForm2 = $updateDiyForm->createView();
            $formsDiy[] = $updateDiyForm2;
        }
        foreach ($showFullkit as $key => $fullkit) {
            $updateFullkitForm = $this->createForm(FullkitType::class, $fullkit);
            $updateFullkitForm2 = $updateFullkitForm->createView();
            $formsFullkit[] = $updateFullkitForm2;
        }
        $render = [
            'form' => $form->createView(),
            'formEliquid' => $formEliquid->createView(),
            'formEcig' => $formEcig->createView(),
            'formAto' => $formAto->createView(),
            'formAccessory' => $formAccessory->createView(),
            'formDiy' => $formDiy->createView(),
            'formFullKit' => $formFullKit->createView(),
            // 'new' => $new->createView(),
            'products' => $showProduct,
            'Eliquids' => $showEliquid,
            'Ecigs' => $showEcig,
            'Atos' => $showAto,
            'Diys' => $showDiy,
            'Fullkits' => $showFullkit,
            'formsDiy' => $formsDiy,
            'formsEcig' => $formsEcig,
            'formsAto' => $formsAto,
            'formsEliquid' => $formsEliquid,
            'formsFullkit' => $formsFullkit
        ];
        foreach ($forms as $key => $value) {
            $render['form' . $key] = $value;
        }
        // foreach ($formsEliquid as $key => $value) {
        //     $render['formEliquid'.$key] = $value; 
        // }
        // foreach ($formsEcig as $key => $value) {
        //     $render['formEcig'.$key] = $value; 
        // }
        // foreach ($formsAto as $key => $value) {
        //     $render['formAto'.$key] = $value; 
        // }
        // foreach ($formsDiy as $key => $value) {
        //     $render['formDiy'.$key] = $value; 
        // }

        // return and passing variable
        return $this->render('product/show.html.twig', $render);
        //end return and passing variable
    }

    /**
     * @Route("/product/traitementproduct", name="traitementProduct")
     */
    public function traitementProduct(ManagerRegistry $doctrine)
    {
        $postProduct = $_POST['product'];
        $entityManager = $doctrine->getManager();
	    $nouveau       = $postProduct['nouveau'] ?? "";
        $product = new Product();

        $product->setPrice($postProduct['price']);
        $product->setBrand($postProduct['brand']);
        $product->setName($postProduct['name']);
        $product->setDescription($postProduct['description']);
        $product->setShortDescription($postProduct['shortDescription']);
        $product->setNouveau($nouveau);
        $product->setType($postProduct['type']);

        if(!empty($_FILES['product']['name']['image'][0]))
        {
            $tableNewFileName = [];
            for ($i=0; $i < count($_FILES['product']['name']['image']); $i++) 
            { 
                for ($i=0; $i < count($_FILES['product']['type']['image']); $i++) 
                { 
                    for ($i=0; $i < count($_FILES['product']['tmp_name']['image']); $i++) 
                    { 
                        $safeFilename = $this->slugger->slug($_FILES['product']['name']['image'][$i]);
                        $ext = explode('/', $_FILES['product']['type']['image'][$i]);
                        $newFilename = $safeFilename . '-' . uniqid() . '.' . $ext[1];
                        try 
                        {
                            move_uploaded_file($_FILES['product']['tmp_name']['image'][$i], $_ENV['PATHFILE'] .$postProduct['type']. $newFilename);                            
                        } catch (FileException $e) 
                        {
                            // ... handle exception if something happens during file upload
                            // var_dump($e);
                            exit();
                        }
                        $tableNewFileName[] = $newFilename;
                    }
                }   
            }
        }
        
        if(isset($tableNewFileName[0]))
        {
            $product->setImage('/uploads/brochures/' . $tableNewFileName[0]);
            
            if(count($tableNewFileName)>= 2)
            {
                $product->setImage2('/uploads/brochures/' . $tableNewFileName[1]);
            }
            if(count($tableNewFileName)>= 3)
            {
                $product->setImage3('/uploads/brochures/' . $tableNewFileName[2]);
            }
            if(count($tableNewFileName)>= 4)
            {
                $product->setImage4('/uploads/brochures/' . $tableNewFileName[3]);
            }
            if(count($tableNewFileName)>= 5)
            {
                $product->setImage5('/uploads/brochures/' . $tableNewFileName[4]);
            }
        }

        $entityManager->persist($product);
        $entityManager->flush();
        return $this->render('product/json.html.twig');
    }

    /**
     * @Route("/product/traitementeliquid", name="traitementEliquid")
     */
    public function traitementEliquid(ManagerRegistry $doctrine, ProductRepository $productRepository)
    {
        $productsLastId = $productRepository->findOneBy([], ['id' => 'desc']);
        $lastId = $productsLastId->getId();
        $entityManager = $doctrine->getManager();
        $postEliquid = $_POST['eliquid'];
        $eliquid = new Eliquid();

        $eliquid->setCollection($postEliquid['collection']);
        $eliquid->setDominantNotes($postEliquid['Dominant_notes']);
        $eliquid->setFlavour($postEliquid["Flavour"]);
        $eliquid->setPG($postEliquid["PG"]);
        $eliquid->setVG($postEliquid["VG"]);
        $eliquid->setNicotine($postEliquid["Nicotine"]);
        $eliquid->setCapacity($postEliquid["Capacity"]);
        $eliquid->setOrigin($postEliquid["Origin"]);
        $eliquid->setTypeOfNicotine($postEliquid["TypeOfNicotine"]);
        $eliquid->setTypeOfAroma($postEliquid["TypeOfAroma"]);
        $eliquid->setWater($postEliquid["water"]);
        $eliquid->setAddedAlcohol($postEliquid["addedAlcohol"]);
        $eliquid->setRecommendedDosage($postEliquid["recommendedDosage"]);
        $eliquid->setMaturationTime($postEliquid['maturationTime']);
        $eliquid->setProduct($lastId);

        $entityManager->persist($eliquid);
        $entityManager->flush();

        return $this->render('product/json.html.twig');
    }
    /**
     * @Route("/product/traitementecig", name="traitementEcig")
     */
    public function traitementEcig(ManagerRegistry $doctrine, ProductRepository $productRepository)
    {
        $productsLastId = $productRepository->findOneBy([], ['id' => 'desc']);
        $lastId = $productsLastId->getId();
        $entityManager = $doctrine->getManager();
        $postEcig = $_POST['ecig'];

        $ecig = new Ecig();
        $ecig->setWeight($postEcig['weight']);
        $ecig->setPower($postEcig['power']);
        $ecig->setBattery($postEcig["battery"]);
        $ecig->setOperation($postEcig["operation"]);
        $ecig->setHeight($postEcig["height"]);
        $ecig->setWidth($postEcig["width"]);
        $ecig->setDepth($postEcig["depth"]);
        $ecig->setMatter($postEcig["matter"]);
        $ecig->setTypeOfBatteries($postEcig["typeOfBatteries"]);
        $ecig->setRechargableByUsb($postEcig["rechargableByUsb"]);
        $ecig->setRechargingConnectors($postEcig["rechargingConnectors"]);
        $ecig->setMaxPower($postEcig["maxPower"]);
        $ecig->setInputVoltage($postEcig["inputVoltage"]);
        $ecig->setOutputVoltage($postEcig["outputVoltage"]);
        $ecig->setChargingVoltage($postEcig["chargingVoltage"]);
        $ecig->setChargingCurrent($postEcig["chargingCurrent"]);
        $ecig->setCompatibleResistance($postEcig["compatibleResistance"]);
        $ecig->setProduct($lastId);

        $entityManager->persist($ecig);
        $entityManager->flush();

        return $this->render('product/json.html.twig');
    }

    /**
     * @Route("/product/traitementato", name="traitementAto")
     */
    public function traitementAto(ManagerRegistry $doctrine, ProductRepository $productRepository)
    {
        $productsLastId = $productRepository->findOneBy([], ['id' => 'desc']);
        $lastId = $productsLastId->getId();
        $entityManager = $doctrine->getManager();
        $postAto = $_POST['ato'];
	    $airflow = $postAto['airflow'] ?? "0";
        $ato = new Ato();

        $ato->setCapacity($postAto['capacity']);
        $ato->setLength($postAto["length"]);
        $ato->setDiameter($postAto["diameter"]);
        $ato->setResistance($postAto["resistance"]);
        $ato->setFilling($postAto["filling"]);
        $ato->setAirflow($airflow);
        $ato->setProduct($lastId);

        $entityManager->persist($ato);
        $entityManager->flush();

        return $this->render('product/json.html.twig');
    }

    /**
     * @Route("/product/traitementaccessory", name="traitementAccessory")
     */
    public function traitementAccessory(ManagerRegistry $doctrine, ProductRepository $productRepository)
    {
        $productsLastId = $productRepository->findOneBy([], ['id' => 'desc']);
        $lastId = $productsLastId->getId();
        $entityManager = $doctrine->getManager();
        $accessory = new Accessory();

        $accessory->setProduct($lastId);
        $entityManager->persist($accessory);
        $entityManager->flush();

        return $this->render('product/json.html.twig');
    }

    /**
     * @Route("/product/traitementdiy", name="traitementDiy")
     */
    public function traitementDiy(ManagerRegistry $doctrine, ProductRepository $productRepository)
    {
        $productsLastId = $productRepository->findOneBy([], ['id' => 'desc']);
        $lastId = $productsLastId->getId();
        $entityManager = $doctrine->getManager();
        $postDiy = $_POST['diy'];
        $diy = new Diy();

        $diy->setCollection($postDiy['collection']);
        $diy->setDominantNotes($postDiy['Dominant_notes']);
        $diy->setFlavour($postDiy["Flavour"]);
        $diy->setPG($postDiy["PG"]);
        $diy->setVG($postDiy["VG"]);
        $diy->setNicotine($postDiy["Nicotine"]);
        $diy->setCapacity($postDiy["Capacity"]);
        $diy->setOrigin($postDiy["Origin"]);
        $diy->setTypeOfNicotine($postDiy['TypeOfNicotine']);
        $diy->setTypeOfAroma($postDiy["TypeOfAroma"]);
        $diy->setWater($postDiy["water"]);
        $diy->setAddedAlcohol($postDiy["addedAlcohol"]);
        $diy->setRecommendedDosage($postDiy["recommendedDosage"]);
        $diy->setMaturationTime($postDiy['maturationTime']);
        $diy->setProduct($lastId);

        $entityManager->persist($diy);
        $entityManager->flush();

        return $this->render('product/json.html.twig');
    }
    /**
     * @Route("/product/traitementfullkit", name="traitementfullkit")
     */
    public function traitementfullkit(ManagerRegistry $doctrine, ProductRepository $productRepository)
    {
        $productsLastId = $productRepository->findOneBy([], ['id' => 'desc']);
        $lastId = $productsLastId->getId();
        $entityManager = $doctrine->getManager();
        $postFullkit = $_POST['fullkit'];
	    $airflow = $postFullkit['airflow'] ?? '';
        $fullkit = new Fullkit();
        
        $fullkit->setAutonomy($postFullkit['autonomy']);
        $fullkit->setWeight($postFullkit['weight']);
        $fullkit->setCapacity($postFullkit['capacity']);
        $fullkit->setLength($postFullkit["length"]);
        $fullkit->setDiameter($postFullkit["diameter"]);
        $fullkit->setResistance($postFullkit["resistance"]);
        $fullkit->setFilling($postFullkit["filling"]);
        $fullkit->setAirflow($airflow);
        $fullkit->setPower($postFullkit['power']);
        $fullkit->setBattery($postFullkit["battery"]);
        $fullkit->setOperation($postFullkit["operation"]);
        $fullkit->setHeight($postFullkit["height"]);
        $fullkit->setWidth($postFullkit["width"]);
        $fullkit->setDepth($postFullkit["depth"]);
        $fullkit->setMatter($postFullkit["matter"]);
        $fullkit->setTypeOfBatteries($postFullkit["typeOfBatteries"]);
        $fullkit->setRechargableByUsb($postFullkit["rechargableByUsb"]);
        $fullkit->setRechargingConnectors($postFullkit["rechargingConnectors"]);
        $fullkit->setMaxPower($postFullkit["maxPower"]);
        $fullkit->setInputVoltage($postFullkit["inputVoltage"]);
        $fullkit->setOutputVoltage($postFullkit["outputVoltage"]);
        $fullkit->setChargingVoltage($postFullkit["chargingVoltage"]);
        $fullkit->setChargingCurrent($postFullkit["chargingCurrent"]);
        $fullkit->setCompatibleResistance($postFullkit["compatibleResistance"]);
        $fullkit->setProduct($lastId);

        $entityManager->persist($fullkit);
        $entityManager->flush();

        if($postFullkit['addIndividual']){
            $ecig = new Ecig();
            $ecig->setAutonomy($postFullkit['autonomy']);
            $ecig->setWeight($postFullkit['weight']);
            $ecig->setPower($postFullkit['power']);
            $ecig->setBattery($postFullkit["battery"]);
            $ecig->setOperation($postFullkit["operation"]);
            $ecig->setHeight($postFullkit["height"]);
            $ecig->setWidth($postFullkit["width"]);
            $ecig->setDepth($postFullkit["depth"]);
            $ecig->setMatter($postFullkit["matter"]);
            $ecig->setTypeOfBatteries($postFullkit["typeOfBatteries"]);
            $ecig->setRechargableByUsb($postFullkit["rechargableByUsb"]);
            $ecig->setRechargingConnectors($postFullkit["rechargingConnectors"]);
            $ecig->setMaxPower($postFullkit["maxPower"]);
            $ecig->setInputVoltage($postFullkit["inputVoltage"]);
            $ecig->setOutputVoltage($postFullkit["outputVoltage"]);
            $ecig->setChargingVoltage($postFullkit["chargingVoltage"]);
            $ecig->setChargingCurrent($postFullkit["chargingCurrent"]);
            $ecig->setCompatibleResistance($postFullkit["compatibleResistance"]);
            $ecig->setProduct($lastId - 1 );
            $entityManager->persist($ecig);
            $entityManager->flush();
            $entityManager = $doctrine->getManager();
            $product = $entityManager->getRepository(Product::class)->find($lastId - 1);
            $product->setType("ecig");
            if(isset($_POST['EcigName']))
            {
                $product->setName($_POST['EcigName']);
            }
            if(isset($_POST['EcigPrice']))
            {
                $product->setPrice($_POST['EcigPrice']);
            }
            if(isset($_POST['EcigNew']))
            {
                $product->setNouveau($_POST['EcigNew']);
            }else
            {
                $product->setNouveau("");
            }
            
            $tableNewFileNameEcig = [];
            for ($i=0; $i < count($_FILES['AtoImage']['name']); $i++) 
            { 
                for ($i=0; $i < count($_FILES['AtoImage']['type']); $i++) 
                { 
                    for ($i=0; $i < count($_FILES['AtoImage']['tmp_name']); $i++) 
                    { 
                        $safeFilename = $this->slugger->slug($_FILES['AtoImage']['name'][$i]);
                        $ext = explode('/', $_FILES['AtoImage']['type'][$i]);
                        $newFilename = $safeFilename . '-' . uniqid() . '.' . $ext[1];
                        try 
                        {
                            move_uploaded_file($_FILES['product']['tmp_name']['image'][$i], $_ENV['PATHFILE'].'/ecig' . $newFilename);
                        } catch (FileException $e) 
                        {
                            // ... handle exception if something happens during file upload
                            // var_dump($e);
                            exit();
                        }
                        $tableNewFileNameEcig[] = $newFilename;
                    }
                }
            }
            $product->setImage('/uploads/brochures/' . $tableNewFileNameEcig[0]);
            if(count($tableNewFileNameEcig)>= 2)
            {
                $product->setImage2('/uploads/brochures/' . $tableNewFileNameEcig[1]);
            }
            if(count($tableNewFileNameEcig)>= 3)
            {
                $product->setImage3('/uploads/brochures/' . $tableNewFileNameEcig[2]);
            }
            if(count($tableNewFileNameEcig)>= 4)
            {
                $product->setImage4('/uploads/brochures/' . $tableNewFileNameEcig[3]);
            }
            if(count($tableNewFileNameEcig)>= 5)
            {
                $product->setImage5('/uploads/brochures/' . $tableNewFileNameEcig[4]);
            }

            $entityManager->persist($product);
            $entityManager->flush();
            
            $ato = new Ato();
            
            $ato->setCapacity($postFullkit['capacity']);
            $ato->setLength($postFullkit["length"]);
            $ato->setDiameter($postFullkit["diameter"]);
            $ato->setResistance($postFullkit["resistance"]);
            $ato->setFilling($postFullkit["filling"]);
            $ato->setAirflow($airflow);
            $ato->setProduct($lastId - 2);
            $entityManager->persist($ato);
            $entityManager->flush();
            $entityManager = $doctrine->getManager();
            $product = $entityManager->getRepository(Product::class)->find($lastId - 2);
            $product->setType("ato");
            if(isset($_POST['AtoName']))
            {
                $product->setName($_POST['AtoName']);
            }
            if(isset($_POST['AtoPrice']))
            {
                $product->setPrice($_POST['AtoPrice']);
            }
            if(isset($_POST['AtoNew']))
            {
                $product->setNouveau($_POST['AtoNew']);
            }else
            {
                $product->setNouveau("");
            }

            $tableNewFileNameAto = [];
            for ($i=0; $i < count($_FILES['AtoImage']['name']); $i++) 
            { 
                for ($i=0; $i < count($_FILES['AtoImage']['type']); $i++) 
                { 
                    for ($i=0; $i < count($_FILES['AtoImage']['tmp_name']); $i++) 
                    { 
                        $safeFilename = $this->slugger->slug($_FILES['AtoImage']['name'][$i]);
                        $ext = explode('/', $_FILES['AtoImage']['type'][$i]);
                        $newFilename = $safeFilename . '-' . uniqid() . '.' . $ext[1];
                        try 
                        {
                            move_uploaded_file($_FILES['product']['tmp_name']['image'][$i], $_ENV['PATHFILE'].'/ato' . $newFilename);
                        } catch (FileException $e) 
                        {
                            // ... handle exception if something happens during file upload
                            // var_dump($e);
                            exit();
                        }
                        $tableNewFileNameAto[] = $newFilename;
                    }
                }
            }
            $product->setImage('/uploads/brochures/' . $tableNewFileNameAto[0]);
            if(count($tableNewFileNameAto)>= 2)
            {
                $product->setImage2('/uploads/brochures/' . $tableNewFileNameAto[1]);
            }
            if(count($tableNewFileNameAto)>= 3)
            {
                $product->setImage3('/uploads/brochures/' . $tableNewFileNameAto[2]);
            }
            if(count($tableNewFileNameAto)>= 4)
            {
                $product->setImage4('/uploads/brochures/' . $tableNewFileNameAto[3]);
            }
            if(count($tableNewFileNameAto)>= 5)
            {
                $product->setImage5('/uploads/brochures/' . $tableNewFileNameAto[4]);
            }

            $entityManager->persist($product);
            $entityManager->flush();
        }
        return $this->render('product/json.html.twig');
    }

    /**
     * @Route("/product/traitementUpdate", name="traitementUpdate")
     */
    public function traitementUpdate(ManagerRegistry $doctrine, ProductRepository $productRepository)
    {
        // var_dump($_POST);
        $post = $_POST['product'];
	    $nouveau = $post['nouveau'] ?? "";

        $id = $_POST['id'];
        $entityManager = $doctrine->getManager();
        $product = $productRepository->find($id);
        $product->setPrice($post['price']);
        $product->setBrand($post['brand']);
        $product->setName($post['name']);
        $product->setNouveau($nouveau);
        $product->setType($post['type']);
        // $product->setDescription($post['Description']);
        // $product->setShortDescription($post['shortDescription']);
        $entityManager->persist($product);
        $entityManager->flush();

        return $this->render('product/json.html.twig');
    }
    
    /**
     * @Route("/product/traitementUpdateSpe", name="traitementUpdateSpe")
     */
    public function traitementUpdateSpe(ManagerRegistry $doctrine)
    {
        // var_dump($_POST);
        $entityManager = $doctrine->getManager();
        if(isset($_POST['eliquid'])){
            $postEliquid = $_POST['eliquid'];
            $id = $postEliquid['product'];
            $eliquid = $entityManager->getRepository(Eliquid::class)->findOneBy(
                ['product' => $id]
            );
            $eliquid->setCollection($postEliquid['collection']);
            $eliquid->setDominantNotes($postEliquid['Dominant_notes']);
            $eliquid->setFlavour($postEliquid["Flavour"]);
            $eliquid->setPG($postEliquid["PG"]);
            $eliquid->setVG($postEliquid["VG"]);
            $eliquid->setNicotine($postEliquid["Nicotine"]);
            $eliquid->setCapacity($postEliquid["Capacity"]);
            $eliquid->setOrigin($postEliquid["Origin"]);
            $eliquid->setTypeOfNicotine($postEliquid["TypeOfNicotine"]);
            $eliquid->setTypeOfAroma($postEliquid["TypeOfAroma"]);
            $eliquid->setWater($postEliquid["water"]);
            $eliquid->setAddedAlcohol($postEliquid["addedAlcohol"]);
            $eliquid->setRecommendedDosage($postEliquid["recommendedDosage"]);
            $eliquid->setMaturationTime($postEliquid['maturationTime']);
            $entityManager->persist($eliquid);
            $entityManager->flush();
        }elseif(isset($_POST['ecig']))
        {
            $postEcig = $_POST['ecig'];
            $id = $postEcig['product'];
            $ecig  = $entityManager->getRepository(Ecig::class)->findOneBy(
                ['product' => $id]
            );
            $ecig->setWeight($postEcig['weight']);
            $ecig->setPower($postEcig['power']);
            $ecig->setPower($postEcig['power']);
            $ecig->setBattery($postEcig["battery"]);
            $ecig->setOperation($postEcig["operation"]);
            $ecig->setHeight($postEcig["height"]);
            $ecig->setWidth($postEcig["width"]);
            $ecig->setDepth($postEcig["depth"]);
            $ecig->setMatter($postEcig["matter"]);
            $ecig->setTypeOfBatteries($postEcig["typeOfBatteries"]);
            $ecig->setRechargableByUsb($postEcig["rechargableByUsb"]);
            $ecig->setRechargingConnectors($postEcig["rechargingConnectors"]);
            $ecig->setMaxPower($postEcig["maxPower"]);
            $ecig->setInputVoltage($postEcig["inputVoltage"]);
            $ecig->setOutputVoltage($postEcig["outputVoltage"]);
            $ecig->setChargingVoltage($postEcig["chargingVoltage"]);
            $ecig->setChargingCurrent($postEcig["chargingCurrent"]);
            $ecig->setCompatibleResistance($postEcig["compatibleResistance"]);
            $entityManager->persist($ecig);
            $entityManager->flush();
        }elseif(isset($_POST['ato']))
        {
            $postAto = $_POST['ato'];
            $id  = $postAto['product'];
            $ato = $entityManager->getRepository(Ato::class)->findOneBy(
                ['product' => $id]
            );
	        $airflow = $postAto['airflow'] ?? '';
            $ato->setLength($postAto['length']);
            $ato->setDiameter($postAto['diameter']);
            $ato->setCapacity($postAto['capacity']);
            $ato->setResistance($postAto['resistance']);
            $ato->setFilling($postAto['filling']);
            $ato->setAirflow($airflow);
            $entityManager->persist($ato);
            $entityManager->flush();
        }elseif(isset($_POST['diy']))
        {
            $postDiy = $_POST['diy'];
            $id = $postDiy['product'];
            $diy = $entityManager->getRepository(Diy::class)->findOneBy(
                ['product' => $id]
            );
            $diy->setCollection($postDiy['collection']);
            $diy->setDominantNotes($postDiy['Dominant_notes']);
            $diy->setFlavour($postDiy["Flavour"]);
            $diy->setPG($postDiy["PG"]);
            $diy->setVG($postDiy["VG"]);
            $diy->setNicotine($postDiy["Nicotine"]);
            $diy->setCapacity($postDiy["Capacity"]);
            $diy->setOrigin($postDiy["Origin"]);
            $diy->setTypeOfNicotine($postDiy["TypeOfNicotine"]);
            $diy->setTypeOfAroma($postDiy["TypeOfAroma"]);
            $diy->setWater($postDiy["water"]);
            $diy->setAddedAlcohol($postDiy["addedAlcohol"]);
            $diy->setRecommendedDosage($postDiy["recommendedDosage"]);
            $diy->setMaturationTime($postDiy['maturationTime']);
            $entityManager->persist($diy);
            $entityManager->flush();
        }elseif(isset($_POST['fullkit']))
        {
            $postFullkit = $_POST['fullkit'];
            var_dump($postFullkit);
            $id = $_POST['productId'];
            $fullkit = $entityManager->getRepository(Fullkit::class)->findOneBy(
                ['product' => $id]
            );
	        $airflow = $postFullkit['airflow'] ?? '';
            $fullkit->setWeight($postFullkit['weight']);
            $fullkit->setPower($postFullkit['power']);
            $fullkit->setBattery($postFullkit['battery']);
            $fullkit->setAutonomy($postFullkit['autonomy']);
            $fullkit->setLength($postFullkit['length']);
            $fullkit->setDiameter($postFullkit['diameter']);
            $fullkit->setCapacity($postFullkit['capacity']);
            $fullkit->setResistance($postFullkit['resistance']);
            $fullkit->setFilling($postFullkit['filling']);
            $fullkit->setAirflow($airflow);
            $fullkit->setOperation($postFullkit['operation']);
            $fullkit->setHeight($postFullkit['height']);
            $fullkit->setWidth($postFullkit['width']);
            $fullkit->setDepth($postFullkit['depth']);
            $fullkit->setMatter($postFullkit['matter']);
            $fullkit->setNumberOfBatteries($postFullkit['numberOfBatteries']);
            $fullkit->setTypeOfBatteries($postFullkit['typeOfBatteries']);
            $fullkit->setRechargableByUsb($postFullkit['rechargableByUsb']);
            $fullkit->setRechargingConnectors($postFullkit['rechargingConnectors']);
            $fullkit->setMaxPower($postFullkit['maxPower']);
            $fullkit->setInputVoltage($postFullkit['inputVoltage']);
            $fullkit->setOutputVoltage($postFullkit['outputVoltage']);
            $fullkit->setChargingVoltage($postFullkit['chargingVoltage']);
            $fullkit->setChargingCurrent($postFullkit['chargingCurrent']);
            $fullkit->setCompatibleResistance($postFullkit['compatibleResistance']);

            $entityManager->persist($fullkit);
            $entityManager->flush();
        }
        return $this->render('product/json.html.twig');
    }

    /**
     * @Route("/product/delete/{id}", name="delete")
     */
    public function delete(int $id, ManagerRegistry $doctrine)
    {
        $entityManager = $doctrine->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);
        $entityManager->remove($product);
        $entityManager->flush();
        ?><script>
            alertSuccess("La suppression du produit a bien été effectué")
        </script><?php
        exit();
        return $this->redirect('/products/show');
    }

    /**
     * @Route("/product/deleteSome", name="deleteSome")
     */
    public function deleteSome(ManagerRegistry $doctrine)
    {
        $entityManager = $doctrine->getManager();
        foreach ($_GET as $value) {
            $product = $entityManager->getRepository(Product::class)->find($value);
            var_dump($value);
            if($product != NULL)
            {
                $entityManager->remove($product);
            }
        }
        $entityManager->flush();
        return $this->redirect('/products/show');
    }
}
