<?php


namespace App\Controller;


use App\Entity\Counting;
use App\Form\SubmitNumberType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class VismaController extends AbstractController
{
    /**
     * @Route("/", name="count-numbers")
     */
    public function countNumbers(Request $request){

        $number = new Counting();
        $form = $this->createForm(SubmitNumberType::class, $number);
        $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()){
                if($form->getData()->getNumber() === 0){
                    $numbers = $this->getDoctrine()->getRepository(Counting::class)->findAll();
                    $sum = 0;
                    foreach ($numbers as $number) {
                        $sum += $number->getNumber();
                    }
                    $finalNumber = number_format($sum / date("N"), 2, ',', ' ');
                    return $this->render('visma/result.html.twig', [
                        'finalNumber' => $finalNumber
                    ]);
                } else {
                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($number);
                    $entityManager->flush();
                    return $this->redirectToRoute('count-numbers');
                }
            }

        $numbers = $this->getDoctrine()->getRepository(Counting::class)->findAll();
        $arrayOfNumbers = count ( $numbers );

        return $this->render("visma/count.html.twig", [
            'form' => $form->createView(),
            'numbers' => $numbers,
            'arrayOfNumbers' => $arrayOfNumbers
        ]);
    }
}