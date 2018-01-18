<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

use AppBundle\Entity\ContactForm;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function createAction(Request $request)
    {
        $contactForm = new ContactForm;

        # dodawanie pol formularza

        $form = $this->createFormBuilder($contactForm)
            ->add('name', TextType::class, array('label'=>'Imie', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('surname', TextType::class, array('label'=>'Nazwisko', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('phone', TextType::class, array('label'=>'Telefon', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('email', TextType::class, array('label'=> 'e-mail', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('message', TextareaType::class, array('label'=>'Wiadomosc', 'attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
            ->add('Send', SubmitType::class, array('label'=>'Wyslij', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-top:15px')))
            ->getForm();

        # obslugiwanie formularza

        $form->handleRequest($request);

        # weryfikacja, czy formularz zostal wyslany (poprawnie)

        if ($form->isSubmitted() && $form->isValid()) {
            $name = $form['name']->getData();
            $surname = $form['surname']->getData();
            $phone = $form['phone']->getData();
            $email = $form['email']->getData();
            $message = $form['message']->getData();
            $postDate = new \DateTime();
            $userIP = $this->container->get('request')->getClientIp();


            # ustawienie danych formularzu

            $contactForm->setName($name);
            $contactForm->setSurname($surname);
            $contactForm->setPhone($phone);
            $contactForm->setEmail($email);
            $contactForm->setMessage($message);
            $contactForm->setPostDate($postDate);
            $contactForm->setUserIP($userIP);

            # zapisanie danych do DB

            $add = $this->getDoctrine()->getManager();
            $add->persist($contactForm);
            $add->flush();

//            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
//                ->setUsername('r.siekanski@gmail.com')
//                ->setPassword('password')
//            ;
//
//            $mailer = new Swift_Mailer($transport);
//
//            $message = (new Swift_Message('Potwierdzenie wyslania formularza'))
//                ->setFrom(['r.siekanski@gmail.com' => 'Rafal Siekanski'])
//                ->setTo($email)
//                ->setBody($this->renderView('default/mailer.html.twig', array('name' => $name)), 'text/html');
//
//            $result = $mailer->send($message);
//
//
//
////            $message = \Swift_Mailer::newInstance()
////
////                ->setSubject('Potwierdzenie')
////                ->setFrom('r.siekanski@gmail.com')
////                ->setTo($email)
////                ->setBody($this->renderView('default/mailer.html.twig', array('name' => $name)), 'text/html');
////
////            $this->get('mailer')->send($message);

   //         return $this->redirect('../default/thanks.html.');
            return new Response('<p>Gratulacje</p><br><a href="http://localhost/discipline_test/web/">wracaj do form</a>');
        }

        return $this->render('default/form.html.twig', array(
            'form' => $form->createView()
        ));
    }

}
