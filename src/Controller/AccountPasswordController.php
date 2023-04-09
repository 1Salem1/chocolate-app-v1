<?php

namespace App\Controller;

use App\Form\ChangePasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Summary of AccountPasswordController
 */
class AccountPasswordController extends AbstractController
{

    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }



    #[Route('/compte/mot-de-passe', name: 'app_account_password')]
   /**
    * Summary of index
    * @param Request $request
    * @return Response
    */
   public function index(Request $request , UserPasswordHasherInterface $encoder)

  
    {
      


      $notification = null ;


        $user = $this->getUser();
        $form = $this->createForm(ChangePasswordType::class ,$user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $old_password = $form->get('new_password')->getData() ;

            if($encoder->isPasswordValid($user, $old_password)){
             
                $password = $encoder->hashPassword($user, $old_password);
                 $user->setPassword($password);
                $this->entityManager->persist($user);
                $this->entityManager->flush();
                $notification = "Votre mot de passe a été mis à jour" ;
            }
            else {
                $notification = "Votre mot de passe n'est pas valide" ;
            }
        }


        return $this->render('account/password.html.twig', [
            'form' => $form->createView(),
            'notification' => $notification
        ]);
    }
}
