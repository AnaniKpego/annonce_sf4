<?php

namespace App\Form;

use App\Entity\Montre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MontreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('reference')
            ->add('prix')
            ->add('disponibilite')
            ->add('resume')
            ->add('description')
            ->add('genre')
            ->add('age')
            ->add('boitier')
            ->add('couleurducadran')
            ->add('couleurboitier')
            ->add('taille')
            ->add('epaisseur')
            ->add('verre')
            ->add('affichage')
            ->add('mouvement')
            ->add('bracelet')
            ->add('couleurdubracelet')
            ->add('entrecorne')
            ->add('fermoir')
            ->add('etancheite')
            ->add('garantie')
            ->add('image')
            ->add('users')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Montre::class,
        ]);
    }
}
