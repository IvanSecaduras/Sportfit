<?php

namespace AppBundle\Form\Type;


use AppBundle\Form\EventListener\RegistrationConfirmListener;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsuarioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', TextType::class, array("label" => false, "required" => true, 'attr' => array('class' => 'form-control m-input', 'placeholder' => 'Email')))
            ->add('username', TextType::class, array("label" => false, "required" => true, 'attr' => array('class' => 'form-control m-input', 'placeholder' => 'Nombre de usuario')))
            ->add('plainPassword', RepeatedType::class, array('type' => PasswordType::class,
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array("label" => false, "required" => true, 'attr' => array('class' => 'form-control m-input', 'placeholder' => 'Contraseña')),
                'second_options' => array("label" => false, "required" => true, 'attr' => array('class' => 'form-control m-input', 'placeholder' => 'Repita su contraseña')),
                'invalid_message' => 'fos_user.password.mismatch'));
    }



    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getName()
    {
        return 'app_user_registration';
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Usuario'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_usuario';
    }


}
