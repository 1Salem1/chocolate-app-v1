<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RegisterType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasher;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegisterController extends AbstractController
{
 

    // injecter doctrine pour interagir avec la base de donnes pour insérer la information 
    public function __construct(private ManagerRegistry $doctrine ) {}


    
    #[Route('/inscription', name: 'app_register')]
    public function index(Request $request, UserPasswordHasherInterface $encoder): Response
    {
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);
    
        $form = $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) { 
            $email = $form->get('email')->getData();
            $doctrine = $this->doctrine->getManager();
            $userRepository = $doctrine->getRepository(User::class);
            $existingUser = $userRepository->findOneBy(['email' => $email]);
            
            if ($existingUser) {
                $form->get('email')->addError(new FormError('Cet e-mail est déjà enregistré.'));
            } else {
                $user = $form->getData();
                $password = $encoder->hashPassword($user, $user->getPassword());
                $user->setPassword($password);
                $doctrine->persist($user);
                $doctrine->flush();
            }
        }
    
        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
