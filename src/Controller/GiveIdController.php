<?php

namespace App\Controller;


use App\Entity\Visiteur;
use App\Entity\GiveId;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Response\QrCodeResponse;

/**
 * @Route("/giveid" )
 */
class GiveIdController extends AbstractController
{
    /**
     * @Route("/{id}", name="giveid", methods="GET")
     */
    public function index(Visiteur $visiteur): Response
    {   

        $nom = $visiteur->getIdUnique();
        
        $qrCode = new QrCode($nom);
        $qrCode->setSize(300);

        // Set advanced options
    $qrCode->setWriterByName('png');
    $qrCode->setMargin(10);
    $qrCode->setEncoding('UTF-8');
    $qrCode->setErrorCorrectionLevel(new ErrorCorrectionLevel(ErrorCorrectionLevel::HIGH));
    $qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
    $qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
    // $qrCode->setLabelFontPath( __DIR__.'build/signatures/noto_sans.otf');
    // $qrCode->setLabel('Scan the code', 16, Null, LabelAlignment::CENTER);
    // $qrCode->setLogoPath(__DIR__.'/build/signatures/img_5c10d4f8deaad.png');
    $qrCode->setLogoSize(150, 200);
    $qrCode->setRoundBlockSize(true);
    $qrCode->setValidateResult(false);
    $qrCode->setWriterOptions(['exclude_xml_declaration' => true]);

    // Directly output the QR code
    header('Content-Type: '.$qrCode->getContentType());
    echo $qrCode->writeString();

    // Save it to a file
    $qrCode->writeFile(__DIR__.'/../../public/signatures/'.$visiteur->getIdUnique().'.png');

    // Create a response object
    $response = new QrCodeResponse($qrCode);

    var_dump($qrCode);


        return $this->render('admin/test.html.twig');
    }


        
    
}