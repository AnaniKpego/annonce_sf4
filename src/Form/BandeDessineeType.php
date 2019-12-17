<?php

namespace App\Form;

use App\Entity\BandeDessinee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BandeDessineeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('dateLimiteDeLalbum')
            ->add('editeur')
            ->add('editionOriginale')
            ->add('vendeur')
            ->add('nbDeVente')
            ->add('etatGeneral')
            ->add('prixDeVente')
            ->add('lieuDeVente')
            ->add('idDeVente')
            ->add('dateLimiteDeVente')
            ->add('commentaire')
            ->add('image')
            ->add('users')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BandeDessinee::class,
        ]);
    }
}
