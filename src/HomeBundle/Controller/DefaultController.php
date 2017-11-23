<?php

namespace HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use HomeBundle\Entity\Video;

class DefaultController extends Controller {

    public function indexAction(Request $request) {

        $videoEntity = new Video;

        $search_video_form_ajax = $this->CreateCustomForm(
                new \HomeBundle\Form\VideoType(), $videoEntity, 'POST', 'temporal_list_operation');

        $upload_video_form_ajax = $this->CreateCustomForm(
                new \HomeBundle\Form\VideoType(), $videoEntity, 'POST', 'temporal_list_operation');
        
//                                {{ include('HomeBundle:Default:temporalList.html.twig', {
//                    form2: search_video_form_ajax,
//                    id2: 'search-video',
//                    form3: upload_video_form_ajax,
//                    id3: 'upload-video-ajax'
//                }) }}
        
        
        
        return $this->render('HomeBundle:Default:index.html.twig', array(
                    'search_video_form_ajax' => $search_video_form_ajax->createView(),
                    'upload_video_form_ajax' => $upload_video_form_ajax->createView()
        ));
    }

    public function temporalListOperationAction(Request $request) {

        $video_name = $_POST["keyword"];


        $em = $this->getDoctrine()->getManager();
        if ($request->isXMLHttpRequest()) {
            
        }
        return $this->redirectToRoute('home_homepage');
    }

    public function reloadPresentationVideoAction(Request $request){
        
        $videoId = $_POST["videoId"];
        $videoName = $_POST["videoName"];
        $videoUrl1 = $_POST["videoUrl1"];
        $videoUrl2 = $_POST["videoUrl2"];
        
        
        return $this->render('HomeBundle:Default:reloadPresentationVideo.html.twig', 
                array('videoId' => $videoId,
                    'videoName' => $videoName,
                    'videoUrl1' => $videoUrl1,
                    'videoUrl2' => $videoUrl2));
    }
    
    public function reloadListSearchVideoAction(Request $request) {
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
  
//        $query = $em->createQuery
//        (
//                'SELECT p.titulo,p.detalle,c.id, id_categoria,c.nombre categoria '
//                . 'FROM bdBundle:Noticias p '
//                . 'JOIN bdBundle:Categoria c WITH c.id = p.id'
//                
//        );
        
        
//        $consulta_2 = "SELECT k FROM HomeBundle:Keyword k WHERE ";
        
//        $consulta_2 = "SELECT v.id, v.name FROM HomeBundle:Video v ";
//        $consulta_2 .= "JOIN HomeBundle:VideoKeyword vk WITH v.id = vk.video";
        
        
        
        $consulta_2 = "SELECT v.id, v.name, v.url1, v.url2 FROM HomeBundle:Video v ";
        $consulta_2 .= "JOIN HomeBundle:VideoKeyword vk ";
        $consulta_2 .= "WITH v.id = vk.video ";
        $consulta_2 .= "JOIN HomeBundle:Keyword k ";
        $consulta_2 .= "WITH k.id = vk.keyword AND (";
        for ($i = 0; $i <= $characters_entered_amount; $i++)
        {
            $consulta_2 .= "k.name = '".$word_entered[$i]."' OR ";
        }
        $consulta_2 .= "k.name = '')";        

        
        
        
        
//        for ($i = 0; $i <= $characters_entered_amount; $i++)
//        {
//            $consulta_2 .= "k.name = '".$word_entered[$i]."' OR ";
//        }
//        $consulta_2 .= "k.name = '')";
        
        
        
//        $query = $em->createQuery('SELECT u FROM User u JOIN Blacklist b WITH u.email = b.email');

        
//        SELECT v FROM HomeBundle:Video v
//            JOIN HomeBundle:VideoKeyword vk 
//            JOIN HomeBundle:Keyword k
//            WITH (k.name = $word_entered[$i] or k.name = $word_entered[$i] ...)
//                and (v.id = vk.video_id)
//                and (k.id = vk.keyword_id)
                
        
        $consulta = "SELECT v 
                FROM HomeBundle:Video v ";
        
        $consulta .= "WHERE v.name = 'shot1'";

        $video = $em->createQuery(
            $consulta_2
        );
        
        

//        $video = $em->createQuery(
//                "SELECT v 
//                FROM HomeBundle:Video v 
//                WHERE v.name = '$word_entered[0]'"
//        );

        return $this->render('HomeBundle:Default:reloadListSearchVideo.html.twig', array(
                    'video' => $video->getResult()
        ));
    }

    public function phpInfoAction() {
        phpinfo();
    }

    private function createCustomForm($objForm, $objEntity, $method, $route) {
        $form = $this->createForm($objForm, $objEntity, array(
            'action' => $this->generateUrl($route),
            'method' => $method
        ));

        return $form;
    }

}
