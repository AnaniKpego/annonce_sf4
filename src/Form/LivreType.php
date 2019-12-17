<?php

namespace App\Form;

use App\Entity\Livre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LivreType extends AbstractType
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
            ->add('langue')
            ->add('traducteur')
            ->add('format')
            ->add('collection')
            ->add('dateparution')
            ->add('nbrepage')
            ->add('ean')
            ->add('isbn')
            ->add('disponibilite')
            ->add('users')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Livre::class,
        ]);
    }
}
