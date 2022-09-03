<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('pseudo', TextType::class, [
                'attr' => [
                    'placeholder' => 'Entrer votre nom d\'utilisateur'
                ],
                'constraints' => [

                    new Length([
                        'min' => 2,
                        'minMessage' => 'Votre nom d\'utilisateur doit contenir au minimum 2 caractères'
                    ]),
                ],
            ])



            ->add('email', EmailType::class, [
                'attr' => [
                    'placeholder' => ' Votre email '
                ],
            ])


            ->add('password', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => [
                    'placeholder' => ' Votre mot de passe '
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veiullez saisir un mot de passe valide',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir au moins{{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}