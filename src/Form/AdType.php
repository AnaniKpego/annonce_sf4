<?php

namespace App\Form;

use App\Entity\Ad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('content')
            ->add('created_at')
            ->add('opened_at')
            ->add('closed_at')
            ->add('monthlyprice')
            ->add('dailyprice')
            ->add('annualprice')
            ->add('sellingprice')
            ->add('country')
            ->add('city')
            ->add('phone')
            ->add('chrono')
            ->add('statu')
            ->add('categories')
            ->add('advertisers')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}
