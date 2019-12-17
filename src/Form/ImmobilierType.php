<?php

namespace App\Form;

use App\Entity\Immobilier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImmobilierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeDemande')
            ->add('localite')
            ->add('prixMin')
            ->add('prixMax')
            ->add('piecesMin')
            ->add('surfaceHabitableMin')
            ->add('surfaceHabitableMax')
            ->add('typeDobjet')
            ->add('caracteristiques')
            ->add('etage')
            ->add('created_at')
            ->add('disponibiliteMin')
            ->add('disponibiliteMax')
            ->add('image')
            ->add('pieceMax')
            ->add('users')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Immobilier::class,
        ]);
    }
}
