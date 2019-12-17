<?php

namespace App\Form;

use App\Entity\CampingCar;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CampingCarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('created_at')
            ->add('titre')
            ->add('nbreDePlace')
            ->add('nbreCouchage')
            ->add('carburant')
            ->add('killomertage')
            ->add('marque')
            ->add('longueur')
            ->add('hauteur')
            ->add('boiteDeVitesse')
            ->add('typeDeCouchage')
            ->add('consommation')
            ->add('equipements')
            ->add('options')
            ->add('extras')
            ->add('description')
            ->add('conditionsDeLocation')
            ->add('typeAssurance')
            ->add('heureDeDepart')
            ->add('heureDeRetour')
            ->add('localite')
            ->add('image')
            ->add('tarifDeLocation')
            ->add('tarifAssurance')
            ->add('users')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CampingCar::class,
        ]);
    }
}
