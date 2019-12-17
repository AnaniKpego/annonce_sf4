<?php
/**
 * Created by PhpStorm.
 * User: PKDTECHNOLOGIESINC-K
 * Date: 06/11/2019
 * Time: 16:45
 */

namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{

    private function setCURL($url, $jsonType = "json"){
        $headers = array(
            'accept: application/'.$jsonType,
            'X-AUTH-TOKEN: test_api_key',
        );
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 3);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        $result = curl_exec($curl);
        $contentType = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);
        $httpcode = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
        $errorMessage = curl_error($curl);
        curl_close($curl);
        return [
            "httpcode"=>$httpcode,
            "errorMessage"=>$errorMessage,
            "contentType"=>$contentType,
            "result"=>$result,
        ];
    }
    /**
     * @Route("/application", name="application")
     */
    public function index()
    {
        return $this->render('cookies/index.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    /**
     * @Route("/page/{pageId}", name="get_cookies")
     */
    public function cookieBySite($pageId){
        $url = "http://127.0.0.1:8000/api/pages/".$pageId;
        $query = $this->setCURL($url, "ld+json");
        $page = null;
        if($query["httpcode"] === 200){
            $page = json_decode($query["result"]);
        }
//        dd($page);
        return $this->render('cookies/cookie.html.twig',[
            "page"=>$page
        ]);
    }

}