<?php

namespace AppBundle\Form\EventListener;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;

class AddProvinciaFieldSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT     => 'preSubmit'
        );
    }

    private function addRolesField($form)
    {
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
        ));
    }

    private function addProvinciaField($form)
    {
        $form->add('provincia', EntityType::class, array(
            'attr' => array(
                'class'=> 'form-control m-input',
            ),
            'class'         => 'AppBundle:Provincias',
            'mapped' => false,
            'query_builder' => function (EntityRepository $repository) {
                                    $qb = $repository->createQueryBuilder('provincia');
                                    return $qb;
                                }
        ));
    }

    private function addPoblacionField($form, $provincia)
    {
        if(!is_null($provincia)){
            $form->add('municipio', EntityType::class, array(
                'attr' => array(
                    'class' => 'form-control m-input',
                ),
                'class'         => 'AppBundle:Municipios',
                'mapped'        => true,
                'query_builder' => function (EntityRepository $repository) use ($provincia) {
                    $qb = $repository->createQueryBuilder('municipio')
                        ->where('municipio.provincia = :provincia')
                        ->setParameter('provincia', $provincia);
                    return $qb;
                }
            ));
        }else{
            $form->add('municipio', EntityType::class, array(
                'attr' => array(
                    'class' => 'form-control m-input',
                    'disabled' => 'disabled',
                ),
                'class'         => 'AppBundle:Municipios',
                'mapped'        => true,
                'query_builder' => function (EntityRepository $repository) use ($provincia) {
                    $qb = $repository->createQueryBuilder('municipio')
                        ->where('municipio.provincia = :provincia')
                        ->setParameter('provincia', $provincia);
                    return $qb;
                }
            ));
        }


    }

    public function preSubmit(FormEvent $event)
    {
        $data = $event->getData();

        if (null === $data) {
            return;
        }

        $provincia = array_key_exists('provincia', $data) ? $data['provincia'] : null;

        $this->addRolesField($event->getForm());
        $this->addProvinciaField($event->getForm());
        $this->addPoblacionField($event->getForm(), $provincia);
    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();

        if (null === $data) {
            return;
        }

        $provincia = ($data->getMunicipio() != null) ? $data->getMunicipio()->getProvincia() : null ;

        $this->addRolesField($event->getForm());
        $this->addProvinciaField($event->getForm());
        $this->addPoblacionField($event->getForm(), $provincia);
    }
}