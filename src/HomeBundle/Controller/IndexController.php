<?php

namespace HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use HomeBundle\Entity\Video;
use HomeBundle\Form\VideoType;

class IndexController extends Controller
{
    
    public function pruebitaAction()
    {
//        $ejemplito = "234";
        
        return $this->render('HomeBundle:Default:pruebita.html.twig');
    }
    
    public function inicioAction()
    {   
        return $this->render('HomeBundle:Default:inicio.html.twig');
    }
    
    public function indexVideoAction()
    {
//        $carpeta = "files/";
//        opendir($carpeta);
//        $destino = $carpeta.$_FILES['foto']['name'];
//        copy($_FILES['foto']['tmp_name'],$destino);
//        echo "Archivo subido exitosamente";
//        $nombre=$_FILES['foto']['name'];
//        echo "<img src=\"/files/$nombre\">";
//        echo $_FILES['foto']['name']."<br>";
//        echo $_FILES['foto']['size']."Bytes<br>";
//        echo $_FILES['foto']['type'];
        
        $carpeta = "files/";
        opendir($carpeta);
        $origen = $_FILES['video']['tmp_name'];
        $destino = $carpeta.$_FILES['video']['name'];
        $tipoVideo = $_FILES['video']['type']; // mp4 webm ogg
        $tamanioVideo = $_FILES['video']['size'];
//        copy($origen,$destino);
        
//        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'files/';
        
//22        if ($tipoVideo == "audio/mp3")
//22        {
//22            move_uploaded_file($origen,$destino);
            
//            Archivo_objetivo = fopen(ruta,permiso)
//            Contenido_bytes_archivo = fread(Archivo_objetivo,tama���o)
            
            $em = $this->getDoctrine()->getManager();            
//            $id_user = $_POST["id_user"];
            $id_user = 1;
            $user = $em->getRepository('HomeBundle:User')->findOneById($id_user);
            
            
            $target_video = fopen($origen, "r");
            $content = fread($target_video, $tamanioVideo);
            fclose($target_video);
            

//            if ($request->isXMLHttpRequest()) {
                $video = new Video();
                $video->setContent($content);
                $video->setUser($user);
                $em->persist($video);
                $em->flush();
//                $response = array();
//                $response[] = array(
//                    'video_id' => $video->getId(),
//                    'video_content' => $video->getContent(),
//                    'video_user' => $video->getUser()
//                );
//                return new Response(json_encode($response), 200, array('Content-Type' => 'application/json'));
//            }
//22        }
//22        else
//22        {
//22            echo "Solo se admiten archivos .mp3";
//22        }
        return $this->render('HomeBundle:Index:index_video.html.twig');
    }
}