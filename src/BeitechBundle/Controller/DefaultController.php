<?php

namespace BeitechBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use BeitechBundle\Entity\User;
use BeitechBundle\Form\UserType;
use BeitechBundle\Entity\Product;
use BeitechBundle\Form\ProductType;
use BeitechBundle\Entity\Availability;
use BeitechBundle\Form\AvailabilityType;
use BeitechBundle\Entity\Setlist;
use BeitechBundle\Form\SetlistType;
use BeitechBundle\Entity\SetlistDetail;
use BeitechBundle\Form\SetlistDetailType;
use BeitechBundle\Entity\Keyword;
use BeitechBundle\Form\KeywordType;
use BeitechBundle\Entity\ProductKeyword;
use BeitechBundle\Form\ProductKeywordType;
use BeitechBundle\Entity\Visit;
use BeitechBundle\Form\VisitType;
use BeitechBundle\Entity\Login;
use BeitechBundle\Form\LoginType;

class DefaultController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $userEntity = new User;
        $productEntity = new Product;
        $availabilityEntity = new Availability;
        $setlistEntity = new Setlist;
        $keywordEntity = new Keyword;
        $visitEntity = new Visit;
        $loginEntity = new Login;

        $introduce_user_data_form_ajax = $this->CreateCustomForm(
                new \BeitechBundle\Form\UserType(), $userEntity, 'POST', 'introduce_user_data_form');

        $login_user_data_form_ajax = $this->CreateCustomForm(
                new \BeitechBundle\Form\UserType(), $userEntity, 'POST', 'login_user_data_form');

        $upload_product_form_ajax = $this->CreateCustomForm(
                new \BeitechBundle\Form\ProductType(), $productEntity, 'POST', 'upload_product_form');

        $introduce_setlist_data_form_ajax = $this->CreateCustomForm(
                new \BeitechBundle\Form\SetlistType(), $setlistEntity, 'POST', 'introduce_setlist_data_form');

        $add_product_setlist_form_ajax = $this->CreateCustomForm(
                new \BeitechBundle\Form\ProductType(), $productEntity, 'POST', 'add_product_setlist_form');

        $upload_keywords_form_ajax = $this->CreateCustomForm(
                new \BeitechBundle\Form\KeywordType(), $keywordEntity, 'POST', 'upload_keywords_form');

        $amount_visits_form_ajax = $this->createCustomForm(
                new \BeitechBundle\Form\VisitType(), $visitEntity, 'POST', 'amount_visits_form');

        $increase_amount_view_video_form_ajax = $this->createCustomForm(
                new \BeitechBundle\Form\ProductType(), $productEntity, 'POST', 'increase_amount_view_video_form');

        $update_product_form_ajax = $this->CreateCustomForm(
                new \BeitechBundle\Form\ProductType(), $productEntity, 'POST', 'update_product_form');

        $marketing_and_publicity_form_ajax = $this->CreateCustomForm(
                new \BeitechBundle\Form\ProductType(), $productEntity, 'POST', 'marketing_and_publicity_form');

        $logout_user_data_form_ajax = $this->CreateCustomForm(
                new \BeitechBundle\Form\UserType(), $userEntity, 'POST', 'logout_user_data_form');

        $check_sesion_form_ajax = $this->createCustomForm(
                new \BeitechBundle\Form\LoginType(), $loginEntity, 'POST', 'check_sesion_form');

        $show_videos_by_artist_form_ajax = $this->createCustomForm(
                new \BeitechBundle\Form\ProductType(), $productEntity, 'POST', 'show_videos_by_artist_form');

        $show_videos_by_genre_form_ajax = $this->createCustomForm(
                new \BeitechBundle\Form\ProductType(), $productEntity, 'POST', 'show_videos_by_genre_form');

        $show_videos_by_data_mining_form_ajax = $this->createCustomForm(
                new \BeitechBundle\Form\ProductType(), $productEntity, 'POST', 'show_videos_by_data_mining_form');

        return $this->render('BeitechBundle:Default:index.html.twig', array(
                    'introduce_user_data_form_ajax' => $introduce_user_data_form_ajax->createView(),
                    'login_user_data_form_ajax' => $login_user_data_form_ajax->createView(),
                    'upload_product_form_ajax' => $upload_product_form_ajax->createView(),
                    'introduce_setlist_data_form_ajax' => $introduce_setlist_data_form_ajax->createView(),
                    'add_product_setlist_form_ajax' => $add_product_setlist_form_ajax->createView(),
                    'upload_keywords_form_ajax' => $upload_keywords_form_ajax->createView(),
                    'amount_visits_form_ajax' => $amount_visits_form_ajax->createView(),
                    'increase_amount_view_video_form_ajax' => $increase_amount_view_video_form_ajax->createView(),
                    'update_product_form_ajax' => $update_product_form_ajax->createView(),
                    'marketing_and_publicity_form_ajax' => $marketing_and_publicity_form_ajax->createView(),
                    'logout_user_data_form_ajax' => $logout_user_data_form_ajax->createView(),
                    'check_sesion_form_ajax' => $check_sesion_form_ajax->createView(),
                    'show_videos_by_artist_form_ajax' => $show_videos_by_artist_form_ajax->createView(),
                    'show_videos_by_genre_form_ajax' => $show_videos_by_genre_form_ajax->createView(),
                    'show_videos_by_data_mining_form_ajax' => $show_videos_by_data_mining_form_ajax->createView()
//                    'upload_availability_form_ajax' => $upload_availability_form_ajax->createView()
        ));
    }

    public function showVideosByArtistFormAction(Request $request) {

        if ($request->isXMLHttpRequest()) {

            $em = $this->getDoctrine()->getManager();

            if (isset($_SESSION['loginSession'])) {
//                $product_id = $_POST["user_id"];
                $product_id = 1;

                $query = $em->createQuery(
                        "SELECT p.id, p.name, p.description, p.price, p.image, p.video 
                            FROM BeitechBundle:Product p"
                );

                $users = $query->getResult();
                $products = array();

                $j = 1;

                $amount = 0;
                $maximum = 1;


                for ($i = 0; $i < $maximum; $i++) {

                    if (isset($users[$i]['id'])) {
                        $amount++;
                        $maximum++;
                    } else {
                        $maximum = 0;
                    }
                }

                for ($i = 0; $i < $j; $i++) {

                    if (isset($users[$i]['id'])) {

                        $j++;
                        $id = $users[$i]['id'];
                        $name = $users[$i]['name'];
                        $description = $users[$i]['description'];
                        $price = $users[$i]['price'];
                        $image = $users[$i]['image'];
                        $video = $users[$i]['video'];

                        $products[$i] = array(
                            'product_id' => $id,
                            'product_name' => $name,
                            'product_description' => $description,
                            'product_price' => $price,
                            'product_image' => $image,
                            'product_video' => $video,
                            'amount' => $amount
                        );
                    } else {
                        $j = 0;
                    }
                }
            } else {

                $product = $em->getRepository('BeitechBundle:Product')->findAll();

                $products = array();

                $products[0] = array(
                    'product_id' => "tu",
                    'product_name' => "me"
                );

                $products[1] = array(
                    'product_id' => "tu2",
                    'product_name' => "me2"
                );
            }
            return new Response(json_encode($products), 200, array('Content-Type' => 'application/json'));
        }
    }

    public function showVideosByDataMiningFormAction(Request $request) {

        if ($request->isXMLHttpRequest()) {

            $em = $this->getDoctrine()->getManager();

            if (isset($_SESSION['loginSession'])) {
//                $product_id = $_POST["user_id"];
                $product_id = 1;

                $query = $em->createQuery(
                        "SELECT p.id, p.name, p.description, p.price, p.image, p.video 
                            FROM BeitechBundle:Product p"
                );

                $users = $query->getResult();
                $products = array();

                $j = 1;

                $amount = 0;
                $maximum = 1;


                for ($i = 0; $i < $maximum; $i++) {

                    if (isset($users[$i]['id'])) {
                        $amount++;
                        $maximum++;
                    } else {
                        $maximum = 0;
                    }
                }

                for ($i = 0; $i < $j; $i++) {

                    if (isset($users[$i]['id'])) {

                        $j++;
                        $id = $users[$i]['id'];
                        $name = $users[$i]['name'];
                        $description = $users[$i]['description'];
                        $price = $users[$i]['price'];
                        $image = $users[$i]['image'];
                        $video = $users[$i]['video'];

                        $products[$i] = array(
                            'product_id' => $id,
                            'product_name' => $name,
                            'product_description' => $description,
                            'product_price' => $price,
                            'product_image' => $image,
                            'product_video' => $video,
                            'amount' => $amount
                        );
                    } else {
                        $j = 0;
                    }
                }
            } else {

                $product = $em->getRepository('BeitechBundle:Product')->findAll();

                $products = array();

                $products[0] = array(
                    'product_id' => "tu",
                    'product_name' => "me"
                );

                $products[1] = array(
                    'product_id' => "tu2",
                    'product_name' => "me2"
                );
            }
            return new Response(json_encode($products), 200, array('Content-Type' => 'application/json'));
        }
    }

    public function showVideosByGenreFormAction(Request $request) {

        if ($request->isXMLHttpRequest()) {

            $em = $this->getDoctrine()->getManager();

            if (isset($_SESSION['loginSession'])) {
//                $product_id = $_POST["user_id"];
                $product_id = 1;

                $query = $em->createQuery(
                        "SELECT p.id, p.name, p.description, p.price, p.image, p.video 
                            FROM BeitechBundle:Product p"
                );

                $users = $query->getResult();
                $products = array();

                $j = 1;

                $amount = 0;
                $maximum = 1;


                for ($i = 0; $i < $maximum; $i++) {

                    if (isset($users[$i]['id'])) {
                        $amount++;
                        $maximum++;
                    } else {
                        $maximum = 0;
                    }
                }

                for ($i = 0; $i < $j; $i++) {

                    if (isset($users[$i]['id'])) {

                        $j++;
                        $id = $users[$i]['id'];
                        $name = $users[$i]['name'];
                        $description = $users[$i]['description'];
                        $price = $users[$i]['price'];
                        $image = $users[$i]['image'];
                        $video = $users[$i]['video'];

                        $products[$i] = array(
                            'product_id' => $id,
                            'product_name' => $name,
                            'product_description' => $description,
                            'product_price' => $price,
                            'product_image' => $image,
                            'product_video' => $video,
                            'amount' => $amount
                        );
                    } else {
                        $j = 0;
                    }
                }
            } else {

                $product = $em->getRepository('BeitechBundle:Product')->findAll();

                $products = array();

                $products[0] = array(
                    'product_id' => "tu",
                    'product_name' => "me"
                );

                $products[1] = array(
                    'product_id' => "tu2",
                    'product_name' => "me2"
                );
            }
            return new Response(json_encode($products), 200, array('Content-Type' => 'application/json'));
        }
    }

    public function checkSesionFormAction(Request $request) {
        if ($request->isXMLHttpRequest()) {

            if (isset($_SESSION['loginSession'])) {
                // en caso de que exista una sesión
                $users2 = array();
                $users2[] = array(
                    'sessionStatus' => "1"
                );
            } else {
                // en caso de que no exista una sesión
                $users2 = array();
                $users2[] = array(
                    'sessionStatus' => "0"
                );
            }

            return new Response(json_encode($users2), 200, array('Content-Type' => 'application/json'));
        }
    }

    public function marketingAndPublicityFormAction() {
        return $this->redirectToRoute('beitech_homepage');
    }

    public function reloadLogInAction() {
        return $this->render('BeitechBundle:Default:reloadLogIn.html.twig');
    }

    public function reloadSignUpAction() {
        return $this->render('BeitechBundle:Default:reloadSignUp.html.twig');
    }

    public function introduceUserDataFormAction(Request $request) {
        $user_name = $_POST['user_name'];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $mobile_number = $_POST["mobile_number"];
        $password = $_POST["password"];
        $birthday = $_POST["birthday"];
        $genre = $_POST["genre"];

        $em = $this->getDoctrine()->getManager();

        if ($request->isXMLHttpRequest()) {
            $user = new User();
            $user->setUserName($user_name);
            $user->setFirstName($first_name);
            $user->setLastName($last_name);
            $user->setMobileNumber($mobile_number);
            $user->setPassword($password);
            $user->setBirthday($birthday);
            $user->setGenre($genre);

            $em->persist($user);
            $em->flush();

            $response = array();
            $response[] = array(
                'user_id' => $user->getId(),
                'user_user_name' => $user->getUserName(),
                'user_first_name' => $user->getFirstName(),
                'user_last_name' => $user->getLastName(),
                'user_mobile_number' => $user->getMobileNumber(),
                'user_password' => $user->getPassword(),
                'user_birthday' => $user->getBirthday(),
                'user_genre' => $user->getGenre()
            );
            return new Response(json_encode($response), 200, array('Content-Type' => 'application/json'));
        }
    }

    public function introduceSetlistDataFormAction(Request $request) {
        $delivery_address = $_POST['delivery_address'];
        $user_id = $_POST["user_id"];

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('BeitechBundle:User')->findOneById($user_id);

        if ($request->isXMLHttpRequest()) {
            $setlist = new Setlist();
            $setlist->setIdUser($user);
            $setlist->setDeliveryAddress($delivery_address);

            $em->persist($setlist);
            $em->flush();

            $response = array();
            $response[] = array(
                'order_id' => $setlist->getId(),
                'order_id_user' => $setlist->getIdUser(),
                'order_delivery_address' => $setlist->getDeliveryAddress()
            );
            return new Response(json_encode($response), 200, array('Content-Type' => 'application/json'));
        }
    }

    public function logoutUserDataFormAction(Request $request) {
        session_destroy();
//        session_start();
        $geolocalization33 = $_SERVER["REMOTE_ADDR"];
        if ($request->isXMLHttpRequest()) {

            $users2 = array();
            $users2[] = array(
                'id' => $geolocalization33,
                'userName' => $geolocalization33
            );
            return new Response(json_encode($users2), 200, array('Content-Type' => 'application/json'));
        }
    }

    public function loginUserDataFormAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        $user_name = $_POST['user_name'];
        $password = $_POST["password"];

        $geolocalization33 = $_SERVER["REMOTE_ADDR"];

        if ($request->isXMLHttpRequest()) {

            $user = $em->createQuery(
                    "SELECT u.id, u.userName 
                FROM BeitechBundle:User u 
                WHERE u.userName = '$user_name' and u.password = '$password'"
            );

            $users = $user->getResult();

            if (!$users) {
//                vacio
                $users2 = array();
                $users2[] = array(
                    'id' => "0",
                    'userName' => "0"
                );
                return new Response(json_encode($users2), 200, array('Content-Type' => 'application/json'));
            } else {
//                lleno    
//                insertar login de sesion 
//                $idUsuario = $user->getId();
                $_SESSION['loginSession'] = $user_name;


                $user = $em->getRepository('BeitechBundle:User')->findOneById(1);

                $login = new Login();
                $login->setHour("2222");
                $login->setGeolocalization("6978766");
                $login->setIdUser($user);

                $em->persist($login);
                $em->flush();

                return new Response(json_encode($users), 200, array('Content-Type' => 'application/json'));
            }
        }
    }

    public function uploadProductFormAction(Request $request) {

        $carpeta = "files/";
        opendir($carpeta);

        $filenameVideo = $_FILES['product_video']['tmp_name'];
        $destinationVideo = $carpeta . $_FILES['product_video']['name'];
        $typeVideo = $_FILES['product_video']['type'];
        if (!$typeVideo == "video/mp4") {
            move_uploaded_file($filenameVideo, $destinationVideo);
        } else {
//            $product_video = "yyy";
            //            ejecutar una acción que le diga al usuario que no se pudo subir el vídeo
        }

        $filenameImage = $_FILES['product_image']['tmp_name'];
        $destinationImage = $carpeta . $_FILES['product_image']['name'];
        $typeImage = $_FILES['product_image']['type'];
        if ($typeImage == "image/jpeg" OR $typeImage == "image/jpg" OR $typeImage == "image/png") {
            move_uploaded_file($filenameImage, $destinationImage);
        } else {
//            $product_image = "xxx";
            //            ejecutar una acción que le diga al usuario que no se pudo subir la imagen
        }
        return $this->redirectToRoute('beitech_homepage');
    }

    public function updateProductFormAction(Request $request) {
        $product_name = $_POST['product_name'];
        $product_description = $_POST["product_description"];
        $product_price = $_POST["product_price"];
        $product_image = $_FILES['product_image']['name'];
        $product_video = $_FILES['product_video']['name'];

        $user_id_login = $_POST["user_id_login"];


        $em = $this->getDoctrine()->getManager();

        if ($request->isXMLHttpRequest()) {
            $user = $em->getRepository('BeitechBundle:User')->findOneById($user_id_login);

            $product = new Product();
            $product->setName($product_name);
            $product->setDescription($product_description);
            $product->setPrice($product_price);
            $product->setImage($product_image);
            $product->setVideo($product_video);
            $product->setAmountViews(1);
            $product->setIdUser($user);

            $em->persist($product);
            $em->flush();


            $product = $em->getRepository('BeitechBundle:Product')->findOneById($product->getId());

            $availability = new Availability();
            $availability->setIdUser($user);
            $availability->setIdProduct($product);
            $availability->setStatus("available");

            $em->persist($availability);
            $em->flush();

            $response = array();
            $response[] = array(
                'product_id' => $product->getId(),
                'product_name' => $product->getName(),
                'product_description' => $product->getDescription(),
                'product_price' => $product->getPrice(),
                'product_image' => $product->getImage(),
                'product_video' => $product->getVideo()
            );
            return new Response(json_encode($response), 200, array('Content-Type' => 'application/json'));
        }

        return $this->redirectToRoute('beitech_homepage');
    }

    private function createCustomForm($objForm, $objEntity, $method, $route) {
        $form = $this->createForm($objForm, $objEntity, array(
            'action' => $this->generateUrl($route),
            'method' => $method
        ));
        return $form;
    }

    public function reloadListSearchProductAction(Request $request) {
        $keywords_entered_2 = $_POST["keyword"];

        // me retira (espacios en blanco, saltos de linea, etc) que haya al inicio de la variable $keywords_entered
        $keywords_entered_1 = ltrim($keywords_entered_2);

        // me retira (espacios en blanco, saltos de linea, etc) que haya al final de la variable $keywords_entered
        $keywords_entered = rtrim($keywords_entered_1);


        $characters_entered_amount = 0;
        $word_entered = array();
        $temporal_word = "";

        for ($i = 0; $i < strlen($keywords_entered); $i++) {
            //si llegase a existir un espacio entre la frase que se escribió en el buscador,
            //entonces que me ejecute lo siguiente:
            if ($keywords_entered[$i] == " ") {
                $temporal_word = "";
                $previous = $i - 1;

                //si el caracter actual y el caracter anterior son espacios en blanco
                if ($keywords_entered[$previous] == " ") {
                    
                } else {

                    //si el caracter actual es espacio en blanco,
                    //pero el caracter anterior NO es espacio en blanco
                    $characters_entered_amount++;
                }
            } else {
                $temporal_character = $keywords_entered[$i];
                $temporal_word .= $temporal_character;
                $word_entered[$characters_entered_amount] = $temporal_word;
            }
        }

        $em = $this->getDoctrine()->getManager();

        $consulta_2 = "SELECT p.id, p.name, p.description, p.price, p.image, p.video FROM BeitechBundle:Product p ";
        $consulta_2 .= "JOIN BeitechBundle:ProductKeyword pk ";
        $consulta_2 .= "WITH p.id = pk.idProduct ";
        $consulta_2 .= "JOIN BeitechBundle:Keyword k ";
        $consulta_2 .= "WITH k.id = pk.idKeyword AND (";
        for ($i = 0; $i <= $characters_entered_amount; $i++) {
            $consulta_2 .= "k.name = '" . $word_entered[$i] . "' OR ";
        }
        $consulta_2 .= "k.name = '')";

        $product = $em->createQuery(
                $consulta_2
        );

        return $this->render('BeitechBundle:Default:reloadListSearchProduct.html.twig', array(
                    'product' => $product->getResult()
        ));
    }

    public function reloadListOrdersAction(Request $request) {
        $user_id = $_POST["user_id"];

        $em = $this->getDoctrine()->getManager();

        $setlist = $em->createQuery(
                "SELECT s.id, s.deliveryAddress 
                FROM BeitechBundle:Setlist s 
                WHERE s.idUser = '$user_id'"
        );

        $setlists = $setlist->getResult();

        return $this->render('BeitechBundle:Default:reloadListOrders.html.twig', array(
                    'setlist' => $setlist->getResult()
        ));
    }

    public function reloadPresentationProductAction() {
        $productId = $_POST["productId"];

        $em = $this->getDoctrine()->getManager();

        $product = $em->createQuery(
                "SELECT p.id, p.name, p.description, p.price, p.image, p.video, p.amountViews 
            FROM BeitechBundle:Product p
            WHERE p.id = '$productId'"
        );

        return $this->render('BeitechBundle:Default:reloadPresentationProduct.html.twig', array(
                    'product' => $product->getResult()
        ));
    }

    public function addProductSetlistFormAction(Request $request) {
        $id_product = $_POST['id_product'];
        $amount_product = $_POST['amount_product'];
        $id_setlist = $_POST['id_setlist'];

        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('BeitechBundle:Product')->findOneById($id_product);
        $setlist = $em->getRepository('BeitechBundle:Setlist')->findOneById($id_setlist);

        if ($request->isXMLHttpRequest()) {

            $setlist222 = $em->getRepository('BeitechBundle:SetlistDetail')->findByIdSetlist($id_setlist);
            $countSetlist = count($setlist222);


            if ($countSetlist < 5) {
                $setlistDetail = new SetlistDetail();
                $setlistDetail->setIdProduct($product);
                $setlistDetail->setAmountProduct($amount_product);
                $setlistDetail->setIdSetlist($setlist);

                $em->persist($setlistDetail);
                $em->flush();

                $response = array();
                $response[] = array(
                    'setlistDetail_id' => $setlistDetail->getId(),
                    'setlistDetail_idProduct' => $setlistDetail->getIdProduct(),
                    'setlistDetail_amountProduct' => $setlistDetail->getAmountProduct(),
                    'setlistDetail_idIdSetlist' => $setlistDetail->getIdSetlist(),
                    'contador' => $countSetlist
                );
                return new Response(json_encode($response), 200, array('Content-Type' => 'application/json'));
            } else {
                $setlistDetail = array();
                $setlistDetail[] = array(
                    'setlistDetail_id' => "0",
                    'setlistDetail_idProduct' => "0",
                    'setlistDetail_amountProduct' => "0",
                    'setlistDetail_idSetlist' => "0",
                    'contador' => $countSetlist
                );
                return new Response(json_encode($setlistDetail), 200, array('Content-Type' => 'application/json'));
            }
        }
    }

    public function reloadListProductsAction() {
        $setlist_id = $_POST["setlist_id"];

        $em = $this->getDoctrine()->getManager();

        $setlist = $em->createQuery(
                "SELECT sd.id, sd.amountProduct, p.name, p.description, p.price, s.deliveryAddress
                FROM BeitechBundle:SetlistDetail sd
                JOIN BeitechBundle:Product p
                WITH p.id = sd.idProduct
                JOIN BeitechBundle:Setlist s
                WITH s.id = sd.idSetlist
                WHERE sd.idSetlist = $setlist_id"
        );

        return $this->render('BeitechBundle:Default:reloadListProducts.html.twig', array(
                    'setlist' => $setlist->getResult()
        ));
    }

    public function uploadKeywordsFormAction(Request $request) {
        $currentKeywordId = $_POST['currentKeywordId'];
        $productId = $_POST['productId'];

        $em = $this->getDoctrine()->getManager();

        if ($request->isXMLHttpRequest()) {
            $currentKeywordIdObject = new Keyword();
            $currentKeywordIdObject->setName($currentKeywordId);
            $em->persist($currentKeywordIdObject);
            $em->flush();
            $currentKeywordIdObjectId = $currentKeywordIdObject->getId();
            $currentKeywordIdObjectEntity = $em->getRepository('BeitechBundle:Keyword')->findOneById($currentKeywordIdObjectId);

            $productIdEntity = $em->getRepository('BeitechBundle:Product')->findOneById($productId);

            $productcurrentKeywordIdObject = new ProductKeyword();
            $productcurrentKeywordIdObject->setIdKeyword($currentKeywordIdObjectEntity);
            $productcurrentKeywordIdObject->setIdProduct($productIdEntity);
            $em->persist($productcurrentKeywordIdObject);
            $em->flush();

            $response = array();
            $response[] = array(
                'variable' => $currentKeywordIdObjectId
            );
            return new Response(json_encode($response), 200, array('Content-Type' => 'application/json'));
        }
    }

    public function uploadAvailabilityFormAction() {
        
    }

    public function uploadVideoAction() {
        $filename = $_FILES['video']['tmp_name'];
        $destination = $carpeta . $_FILES['video']['name'];

        move_uploaded_file($filename, "files" . $destination);
    }

    public function amountVisitsFormAction(Request $request) {
        $year = date("Y"); //2017
        $month = date("m"); // mes actual del 00 hasta el 12
        $day = date("d"); // dia del mes desde el 01 hasta el 31
        $hour = date("H"); // horas de 00 hasta la 23
        $minute = date("i"); // minutos con ceros iniciales
        $second = date("s"); // segundos con ceros iniciales

        $visit_id = $_POST['id'];
        $visit_hour = $year . "/" . $month . "/" . $day . "-" . $hour . ":" . $minute . ":" . $second;
        $visit_geolocalization = $_SERVER["REMOTE_ADDR"];
        $geolocalization33 = $_SERVER["REMOTE_ADDR"];

        $em = $this->getDoctrine()->getManager();

        if ($request->isXMLHttpRequest()) {
            $visit = new Visit();
            $visit->setHour($visit_hour);
            $visit->setGeolocalization($visit_geolocalization);

            $em->persist($visit);
            $em->flush();

            $response = array();
            $response[] = array(
                'id' => $visit->getId(),
                'hour' => $visit->getHour(),
                'geolocalization' => $visit->getGeolocalization(),
                'geolocalization33' => $geolocalization33
            );
            return new Response(json_encode($response), 200, array('Content-Type' => 'application/json'));
        }
        return $this->redirectToRoute('beitech_homepage');
    }

    public function increaseAmountViewVideoFormAction(Request $request) {
        $product_id = $_POST['id_product'];
        if ($request->isXMLHttpRequest()) {

            $em = $this->getDoctrine()->getManager();
            $product = $em->getRepository('BeitechBundle:Product')->find($product_id);
            $amountViews = $product->getAmountViews();

            if (!$product) {
                throw $this->createNotFoundException(
                        'No product found for the respect id'
                );
            }

            $product->setAmountViews($amountViews + 1);
            $em->flush();

            $response = array();
            $response[] = array(
                'product_id' => $product_id,
                'product_amountVisits' => $product->getAmountViews()
            );
            return new Response(json_encode($response), 200, array('Content-Type' => 'application/json'));
        }
        return $this->redirectToRoute('beitech_homepage');
    }

    function reloadListByArtistAction() {

        $setlist_id = 1;

        $em = $this->getDoctrine()->getManager();

        $product = $em->createQuery(
                "SELECT p.id, p.name, p.description, p.price, p.image, p.video, p.amountViews, 
                u.userName, u.firstName, u.lastName, u.mobileNumber, u.password, u.birthday, u.genre
                FROM BeitechBundle:Product p
                JOIN BeitechBundle:User u
                WITH u.id = p.idUser
                WHERE p.id = 1"
        );

        return $this->render('BeitechBundle:List:reloadListByArtist.html.twig', array(
                    'product' => $product->getResult()
        ));
    }

    function reloadListByGenreAction() {
//        $setlist_id = $_POST["setlist_id"];

        $setlist_id = 1;

        $em = $this->getDoctrine()->getManager();

        $setlist = $em->createQuery(
                "SELECT sd.id, sd.amountProduct, p.name, p.description, p.price, s.deliveryAddress
                FROM BeitechBundle:SetlistDetail sd
                JOIN BeitechBundle:Product p
                WITH p.id = sd.idProduct
                JOIN BeitechBundle:Setlist s
                WITH s.id = sd.idSetlist
                WHERE sd.idSetlist = $setlist_id"
        );

        return $this->render('BeitechBundle:List:reloadListByGenre.html.twig', array(
                    'setlist' => $setlist->getResult()
        ));
    }

    function reloadListByDataMiningAction() {
//        $setlist_id = $_POST["setlist_id"];

        $setlist_id = 1;

        $em = $this->getDoctrine()->getManager();

        $setlist = $em->createQuery(
                "SELECT sd.id, sd.amountProduct, p.name, p.description, p.price, s.deliveryAddress
                FROM BeitechBundle:SetlistDetail sd
                JOIN BeitechBundle:Product p
                WITH p.id = sd.idProduct
                JOIN BeitechBundle:Setlist s
                WITH s.id = sd.idSetlist
                WHERE sd.idSetlist = $setlist_id"
        );

        return $this->render('BeitechBundle:List:reloadListByDataMining.html.twig', array(
                    'setlist' => $setlist->getResult()
        ));
    }

    function reloadListByYouAction() {
//        $setlist_id = $_POST["setlist_id"];

        $setlist_id = 1;

        $em = $this->getDoctrine()->getManager();

        $setlist = $em->createQuery(
                "SELECT sd.id, sd.amountProduct, p.name, p.description, p.price, s.deliveryAddress
                FROM BeitechBundle:SetlistDetail sd
                JOIN BeitechBundle:Product p
                WITH p.id = sd.idProduct
                JOIN BeitechBundle:Setlist s
                WITH s.id = sd.idSetlist
                WHERE sd.idSetlist = $setlist_id"
        );

        return $this->render('BeitechBundle:List:reloadListByYou.html.twig', array(
                    'setlist' => $setlist->getResult()
        ));

        /*

          //        METODO DOS

          //si llegase a existir un espacio entre la frase que se escribió en el buscador,
          //entonces que me ejecute lo siguiente:
          if ($keywords_entered[$i] == " ") {
          $temporal_word = "";
          $previous = $i - 1;

          //si el caracter actual y el caracter anterior son espacios en blanco
          if ($keywords_entered[$previous] == " ") {

          } else {

          //si el caracter actual es espacio en blanco,
          //pero el caracter anterior NO es espacio en blanco
          $characters_entered_amount++;
          }
          } else {
          $temporal_character = $keywords_entered[$i];
          $temporal_word .= $temporal_character;
          $word_entered[$characters_entered_amount] = $temporal_word;
          }
          }

          $em = $this->getDoctrine()->getManager();

          $consulta_2 = "SELECT p.id, p.name, p.description, p.price, p.image, p.video FROM BeitechBundle:Product p ";
          $consulta_2 .= "JOIN BeitechBundle:ProductKeyword pk ";
          $consulta_2 .= "WITH p.id = pk.idProduct ";
          $consulta_2 .= "JOIN BeitechBundle:Keyword k ";
          $consulta_2 .= "WITH k.id = pk.idKeyword AND (";
          for ($i = 0; $i <= $characters_entered_amount; $i++) {
          $consulta_2 .= "k.name = '" . $word_entered[$i] . "' OR ";
          }
          $consulta_2 .= "k.name = '')";

          $product = $em->createQuery(
          $consulta_2
          );

          return $this->render('BeitechBundle:Default:reloadListSearchProduct.html.twig', array(
          'product' => $product->getResult()
          ));

         */
    }

}
