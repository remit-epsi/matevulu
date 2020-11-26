<?php

namespace App\Form;


use App\Entity\ReservationPlongee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ReservationPlongeeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateDebut', DateTimeType::class,[
                'widget' => 'single_text'
            ])
            ->add('dateFin',DateTimeType::class,[
                'widget' => 'single_text'
            ])
            ->add('nbPersonnes', IntegerType::class,[
                'label'=>'Nombre de personnes :',
                'attr'=>[
                    'min' =>1,
                    'max' =>4
                ]
            ])
            ->add('prix')


        ;
    }

    public function onPreSetData(FormEvent $event)
    {

        if ($nbPErsonnes = 1)
        {

        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ReservationPlongee::class
        ]);
    }
}
