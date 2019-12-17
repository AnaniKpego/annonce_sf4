<?php

namespace App\Form;

use App\Entity\Vehicule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('marque')
            ->add('modele')
            ->add('version')
            ->add('prixMin')
            ->add('prixMax')
            ->add('boiteDeVitesse')
            ->add('rouesMotrices')
            ->add('kilometrageMin')
            ->add('kilometrageMax')
            ->add('carburant')
            ->add('categorieVehicule')
            ->add('anneeMin')
            ->add('anneeMax')
            ->add('categorieLicence')
            ->add('kwMin')
            ->add('kwMax')
            ->add('cylindreMin')
            ->add('cylindreMax')
            ->add('qualites')
            ->add('categorie')
            ->add('couleur')
            ->add('placesMin')
            ->add('placesMax')
            ->add('equipement')
            ->add('equipementSuplementaire')
            ->add('qualiteEquipement')
            ->add('consommation')
            ->add('co2EmissionBis')
            ->add('normesEmission')
            ->add('npaLieu')
            ->add('rayon')
            ->add('ageDelAnnonce')
            ->add('tri')
            ->add('sigleQualite')
            ->add('chMin')
            ->add('chMax')
            ->add('poidsRemarquableMin')
            ->add('poidsRemarquableMax')
            ->add('typeCarrosserie')
            ->add('nbrePorteMin')
            ->add('nbrePorteMax')
            ->add('image')
            ->add('users')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
