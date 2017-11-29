<?php

namespace AppBundle\Form\Type;

use AppBundle\Form\EventListener\AddProvinciaFieldSubscriber;
//use FOS\UserBundle\Event\FormEvent;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UsuarioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('telefono', TextType::class, array ('label' => 'Teléfono',"required"=>true,'attr'=> array('class'=>'form-control m-input', 'placeholder'=>'Introduzca un numero de teléfono')))
            ->add('telefonoUrgencia', TextType::class, array ('label' => 'Teléfono de emergencia',"required"=>true,'attr'=> array('class'=>'form-control m-input', 'placeholder'=>'Introduzca un numero de emergencia')))
            ->add('nombreContacto', TextType::class, array ('label' => 'Nombre del contacto de emergencia',"required"=>true,'attr'=> array('class'=>'form-control m-input', 'placeholder'=>'Introduzca el nombre del contacto de emergencia')))
            ->add('codigoPostal', TextType::class, array ('label' => 'Código Postal',"required"=>true,'attr'=> array('class'=>'form-control m-input', 'placeholder'=>'Introduzca el código postal')))
            ->add('email', TextType::class, array ('label' => 'Email',"required"=>true,'attr'=> array('class'=>'form-control m-input', 'placeholder'=>'Introduzca un  email')))
            ->add('username', TextType::class, array ('label' => 'Nombre de usuario',"required"=>true,'attr'=> array('class'=>'form-control m-input', 'placeholder'=>'Introduzca un nombre de usuario')))
            ->add('nombre', TextType::class, array ('label' => 'Nombre',"required"=>true,'attr'=> array('class'=>'form-control m-input', 'placeholder'=>'Introduzca su nombre')))
            ->add('apellidos', TextType::class, array ('label' => 'Apellidos',"required"=>true,'attr'=> array('class'=>'form-control m-input', 'placeholder'=>'Introduzca sus apellidos')))
            ->add('plainPassword', RepeatedType::class, array ('type' => PasswordType::class,
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password', "required"=>true, 'attr'=> array('class'=>'form-control m-input', 'placeholder'=>'Introduzca su contraseña')),
                'second_options' => array('label' => 'form.password_confirmation', "required"=>true, 'attr'=> array('class'=>'form-control m-input', 'placeholder'=>'Introduzca su contraseña')),
                'invalid_message' => 'fos_user.password.mismatch'))
            ->add('camion', EntityType::class, array(
                'attr' => array(
                    'class' => 'form-control m-input',
                ),
                'class'         => 'AppBundle:Camion',
                'choice_label' => 'matricula',
                'placeholder' => 'Seleccione un camión',
                'required'=>false,
                'empty_data' => 'No existen camiones libres',
                'query_builder' => function (EntityRepository $repository) {
                    $qb = $repository->createQueryBuilder('c')
                        ->leftJoin('c.usuario', 'u')
                        ->where('u.camion IS NULL');

                    return $qb;
                }
            ));

        $builder->addEventSubscriber(new AddProvinciaFieldSubscriber());

        // PARA QUE NOS SE PIERDA EL VALOR DE LA PROVINCIA Y EL CARGO AL EDITAR YA QUE NO ESTÁ MAPEADO
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event){
            $data = $event->getData();
            $form = $event->getForm();

            if(!is_null($data->getMunicipio())){
                $c = $data->getMunicipio()->getProvincia();
            }else{
                $c = null;
            }

            $form->add('provincia', EntityType::class, array(
                'attr' => array(
                    'class' => 'form-control m-input'
                ),
                'placeholder' => 'Seleccione una provincia',
                'class' => 'AppBundle\Entity\Provincias',
                'mapped' => false, // importante indicar que el campo no está mapeado
                'data' => $c, //establecemos el valor inicial del campo.
            ));

            if(!is_null($data->getRoles())){
                $rol=$data->getRoles()[0];

                if($rol=='ROLE_LOGISTICA'){

                    $form->add('roles', ChoiceType::class, array(
                        'choices'=> [
                            'Logística' => '1',
                            'Chofer' => '2'
                        ],
                        'placeholder' => 'Seleccione un cargo',
                        'label' => 'Cargo',
                        "required"=>true,
                        'attr' => array(
                            'class'=> 'form-control m-input',
                        ),
                        'mapped' => false,
                        'data' => '1'
                    ));

                }elseif ($rol=='ROLE_CHOFER'){

                    $form->add('roles', ChoiceType::class, array(
                        'choices'=> [
                            'Logística' => '1',
                            'Chofer' => '2'
                        ],
                        'data' => '2',
                        'label' => 'Cargo',
                        "required"=>true,
                        'attr' => array(
                            'class'=> 'form-control m-input',
                        ),
                        'mapped' => false
                    ));

                }
            }

        });
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
