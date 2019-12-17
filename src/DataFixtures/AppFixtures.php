<?php

namespace App\DataFixtures;

use App\Entity\Ad;
use App\Entity\Advertiser;
use App\Entity\BandeDessinee;
use App\Entity\CampingCar;
use App\Entity\Category;
use App\Entity\Immobilier;
use App\Entity\Livre;
use App\Entity\Moto;
use App\Entity\User;
use App\Entity\Vehicule;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Yaml\Tests\B;

class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $facker = Factory::create('fr_FR');

        for ($users = 0; $users < 50; $users++){

            $user = new User();
            $hashPassword = $this->encoder->encodePassword($user,"Password");
            $user->setFirstname($facker->firstName())
                ->setLastname($facker->lastName)
                ->setCountry($facker->country)
                ->setCity($facker->city)
                ->setCreatedAt($facker->dateTime)
                ->setUsername($facker->companyEmail)
                ->setPassword($hashPassword);

            $manager->persist($user);

            //On cree les annonces de voitures


            for ($vehi = 0; $vehi <mt_rand(0,100); $vehi++ ){
                $vehicule = new Vehicule();
                $vehicule->setAgeDelAnnonce($facker->randomFloat(0, 2, 10))
                    ->setAnneeMin($facker->randomElement(['2016','2017','2018']))
                    ->setAnneeMax($facker->randomElement(['2018','2019']))
                    ->setBoiteDeVitesse($facker->randomElement(['Mannuelle','Automatique']))
                    ->setCarburant($facker->randomElement(['Essence','Gazoil','Super','Diesel','Electrique','Tous','Hybride essence/électrique','Melange 2-temps']))
                    ->setCategorie($facker->randomElement(['Occasion','Démonstration','Oldtimer','Véhicule neuf']))
                    ->setCategorieLicence($facker->randomElement(['Nationale','Internationale']))
                    ->setChMin($facker->randomFloat(2,1,5))
                    ->setChMax($facker->randomFloat(2,1,5))
                    ->setCo2EmissionBis($facker->randomFloat(0,50,560))
                    ->setConsommation($facker->randomFloat(1,2,25))
                    ->setCouleur($facker->colorName)
                    ->setCylindreMin($facker->randomFloat(0,600,6500))
                    ->setCylindreMax($vehicule->getCylindreMin()+1)
                    ->setEquipement($facker->randomElement(['Aide au parcage','Apple CarPlay','Assistant de frainage actif']))
                    ->setEquipementSuplementaire($facker->randomElement(['Camion meubles','Transport frigorifrique','Pilote Auto']))
                    ->setImage($facker->imageUrl(320,480))
                    ->setKilometrageMin($facker->randomFloat(0,1,200))
                    ->setKilometrageMax($facker->randomFloat(0,200,200))
                    ->setMarque($facker->randomElement(['Abarth','Alfa Romeo','Aston Martin','Audi','Bentley','BMW','Dacia','Ferrari','Honda','Mercedes-Benz',]))
                    ->setModele($facker->randomElement(['4x4','Sport','Lux']))
                    ->setNbrePorteMin($facker->randomFloat(0,2,4))
                    ->setNbrePorteMax($facker->randomFloat(0,4,8))
                    ->setKwMin($facker->randomFloat(0,1,5))
                    ->setKwMax($facker->randomFloat(0,5,10))
                    ->setPlacesMin($facker->randomFloat(0,2,5))
                    ->setplacesMax($facker->randomFloat(0,5,12))
                    ->setNormesEmission($facker->randomFloat(0,1,10))
                    ->setNpaLieu($facker->company)
                    ->setPoidsRemarquableMin($facker->randomFloat(2, 50,1000))
                    ->setPoidsRemarquableMax($facker->randomFloat(2,1000,1100))
                    ->setPrixMin($facker->randomFloat(2,5000,10000))
                    ->setPrixMax($facker->randomFloat(2,10000,20000))
                    ->setQualiteEquipement($facker->randomElement(['Pour handicapés','deux jeux de pneux/roues','Tuning','Voiture de course sans homologation routière','Véhicule accidenté']))
                    ->setRayon($facker->randomElement(['Classe A','Classe B']))
                    ->setRouesMotrices($facker->randomElement(['Allemand','Suisse','France','Chine']))
                    ->setTri($facker->randomElement(['Prix: élevé', 'Prix: bas','kilometrage: élevé','kilometrage: bas']))
                    ->setTypeCarrosserie($facker->randomElement(['Break','Bus','Coupé','Limosine','Petite voiture','MPV/minibus']))
                    ->setCategorieVehicule($facker->randomElement(['Neuf','Ancien','Ocasion']))
                    ->setQualites($facker->randomElement(['Superieur','Moyen','Bas']))
                    ->setSigleQualite($facker->city)
                    ->setVersion($facker->year)
                    ->setUsers($user);

                $manager->persist($vehicule);



            }


            for ($moto = 0; $moto <mt_rand(0,100); $moto++ ){
                $motos = new Moto();
                $motos->setAgeDelAnnonce($facker->randomFloat(0, 2, 10))
                    ->setAnneeMin($facker->randomElement(['2016','2017','2018']))
                    ->setAnneeMax($facker->randomElement(['2018','2019']))
                    ->setBoiteDeVitesse($facker->randomElement(['Mannuelle','Automatique']))
                    ->setCarburant($facker->randomElement(['Essence','Gazoil','Super','Diesel','Electrique','Tous','Hybride essence/électrique','Melange 2-temps']))
                    ->setCategorie($facker->randomElement(['Occasion','Démonstration','Oldtimer','Véhicule neuf']))
                    ->setCategorieLicence($facker->randomElement(['Nationale','Internationale']))
                    ->setChMin($facker->randomFloat(2,1,5))
                    ->setChMax($facker->randomFloat(2,1,5))
                    ->setCo2EmissionBis($facker->randomFloat(0,50,560))
                    ->setConsommation($facker->randomFloat(1,2,25))
                    ->setCouleur($facker->colorName)
                    ->setCylindreMin($facker->randomFloat(0,600,6500))
                    ->setCylindreMax($motos->getCylindreMin()+1)
                    ->setEquipement($facker->randomElement(['Aide au parcage','Apple CarPlay','Assistant de frainage actif']))
                    ->setEquipementSuplementaire($facker->randomElement(['Camion meubles','Transport frigorifrique','Pilote Auto']))
                    ->setImage($facker->imageUrl(320,480))
                    ->setKilometrageMin($facker->randomFloat(0,1,200))
                    ->setKilometrageMax($facker->randomFloat(0,200,200))
                    ->setMarque($facker->randomElement(['Abarth','Alfa Romeo','Aston Martin','Audi','Bentley','BMW','Dacia','Ferrari','Honda','Mercedes-Benz',]))
                    ->setModele($facker->randomElement(['Routière','Roadsters','KTM','Trails','Supermotards','Customs']))
                    ->setKwMin($facker->randomFloat(0,1,5))
                    ->setKwMax($facker->randomFloat(0,5,10))
                    ->setPlacesMin($facker->randomFloat(0,2,5))
                    ->setPlacesMax($facker->randomFloat(0,5,12))
                    ->setNormesEmission($facker->randomFloat(0,1,10))
                    ->setNpaLieu($facker->company)
                    ->setPoidsRemarquableMin($facker->randomFloat(2, 50,1000))
                    ->setPoidsRemarquableMax($facker->randomFloat(2,1000,1100))
                    ->setPrixMin($facker->randomFloat(2,5000,10000))
                    ->setPrixMax($facker->randomFloat(2,10000,20000))
                    ->setQualiteEquipement($facker->randomElement(['Pour handicapés','deux jeux de pneux/roues','Tuning','Voiture de course sans homologation routière','Véhicule accidenté']))
                    ->setRayon($facker->randomElement(['Classe A','Classe B']))
                    ->setRouesMotrices($facker->randomElement(['Allemand','Suisse','France','Chine']))
                    ->setTri($facker->randomElement(['Prix: élevé', 'Prix: bas','kilometrage: élevé','kilometrage: bas']))
                    ->setCategorieMoto($facker->randomElement(['Neuf','Ancien','Ocasion']))
                    ->setQualites($facker->randomElement(['Superieur','Moyen','Bas']))
                    ->setSigleQualite($facker->city)
                    ->setVersion($facker->year)
                    ->setUsers($user);

                $manager->persist($motos);



            }


            for ($immobi = 0; $immobi <mt_rand(0,100); $immobi++ ){
                $immobilier = new Immobilier();
                $immobilier->setImage($facker->imageUrl(320,480))
                    ->setPrixMin($facker->randomFloat(2,5000,10000))
                    ->setPrixMax($facker->randomFloat(2,10000,10000)+$immobilier->getPrixMin())
                    ->setCreatedAt($facker->dateTimeBetween('-4 years','now'))
                    ->setTypeDemande($facker->randomElement(['Vente','Location']))
                    ->setEtage($facker->randomElement(['Seulement au rez-de-chaussé','Rze-de-chaussé exclu','Même sans indication']))
                    ->setLocalite($facker->city)
                    ->setPiecesMin($facker->randomFloat(0,1,10))
                    ->setPieceMax($facker->randomFloat(0,1,3)+$immobilier->getPiecesMin())
                    ->setSurfaceHabitableMin($facker->randomFloat(0,1, 500))
                    ->setSurfaceHabitableMax($immobilier->getSurfaceHabitableMin()+$facker->randomFloat(2,1,5))
                    ->setTypeDobjet($facker->randomElement(['Appartement','Maison contiguë','Rustico','Appartement indépendant','Maison individuelle','Maison jumélée']))
                    ->setCaracteristiques($facker->randomElement(['Ascenseur','Garage','En colocation','Place de parc','Construction ancienne','Balcon/Terrasse/Jardinet','Animaux domestiques acceptés']))
                    ->setDisponibiliteMin($facker->date('m-Y','+2 months'))
                    ->setDisponibiliteMax($facker->date('m-Y','+2 years'))

                    ->setUsers($user);

                $manager->persist($immobilier);



            }

            //On cree les Annonceurs
            for ($adv = 0; $adv < mt_rand(3,10); $adv++){
                $advertiser = new Advertiser();
                $chrono = 1;

                $hash = $this->encoder->encodePassword($advertiser,"Password");

                $advertiser->setFirstname($facker->firstName())
                    ->setLastname($facker->lastName)
                    ->setCreatedAt($facker->dateTimeBetween('-6 months'))
                    ->setCountry($facker->country)
                    ->setCity($facker->city)
                    ->setEmail($facker->email)
                    ->setPhone($facker->phoneNumber)
                    ->setUsers($user)
                    ->setPassword($hash);

                $manager->persist($advertiser);

                //On cree les Categories pour chaques Annonceurs.
                for ($cat = 0; $cat < mt_rand(1, 5); $cat++){
                    $category = new Category();
                    $category->setName($facker->jobTitle)
                        ->setCreatedAt($facker->dateTimeBetween('-4 months'))
                        ->setAdvertisers($advertiser);
                    $manager->persist($category);

                    //On cree les Annonces en fonction des categories d'annonces.
                    for ($ann = 0; $ann < mt_rand(5, 10); $ann++){
                        $ad =  new Ad();
                        $ad->setTitle($facker->title)
                            ->setAdvertisers($advertiser)
                            ->setCreatedAt($facker->dateTimeBetween('-3 months'))
                            ->setPhone($facker->phoneNumber)
                            ->setCountry($facker->country)
                            ->setCity($facker->city)
                            ->setCategories($category)
                            ->setContent($facker->text(300))
                            ->setDailyprice($facker->randomFloat(2, 50, 100))
                            ->setMonthlyprice($facker->randomFloat(2, 300, 500))
                            ->setAnnualprice($facker->randomFloat(2, 5000, 100000))
                            ->setOpenedAt($facker->dateTimeBetween('-2 months'))
                            ->setClosedAt($facker->dateTimeBetween('-1 week', '+2 months'))
                            ->setStatu($facker->randomElement(['Sale','Leasing']))
                            ->setChrono($chrono)
                            ->setSellingprice($facker->randomFloat(2, 50000, 250000));
                        $chrono++;
                        $manager->persist($ad);

                    }
                }
            }


          for ($camp = 0; $camp < mt_rand(0,100); $camp++){

              $campingCar = new CampingCar();
              $campingCar ->setBoiteDeVitesse($facker->randomElement(['Mannuelle','Automatique']))
                  ->setCarburant($facker->randomElement(['Essence','Gazoil','Super','Diesel','Electrique','Tous','Hybride essence/électrique','Melange 2-temps']))
                  ->setConsommation($facker->randomElement(['10L/100kms','8L/100kms','10L/110kms']))
                  ->setImage($facker->imageUrl(320,480))
                  ->setMarque($facker->randomElement(['Abarth','Alfa Romeo','Aston Martin','Audi','Bentley','BMW','Dacia','Ferrari','Honda','Mercedes-Benz',]))
                  ->setLocalite($facker->city)
                  ->setCreatedAt($facker->dateTimeBetween('-6 months','now'))
                  ->setConditionsDeLocation($facker->realText(200,2))
                  ->setDescription($facker->realText(200,2))
                  ->setEquipements($facker->randomElement(['Store latéral, Plaques de cuisson, Entrée audio/iPod, Pile à combustible,Pile à combustible, WC, Réfrigérateur','Prise USB, Lecteur CD, WC,Porte vélo, Douche, Réfrigérateur']))
                  ->setExtras('Non fumeur, Pas d\'animaux, Convient aux enfants')
                  ->setHauteur($facker->randomFloat(2,2.50, 3.50))
                  ->setHeureDeDepart($facker->time('H:i', '18:30'))
                  ->setHeureDeRetour($facker->time('H:i', '18:30'))
                  ->setKillomertage($facker->randomFloat(0,0, 10000))
                  ->setNbreCouchage($facker->randomFloat(0, 2, 10))
                  ->setNbreDePlace($facker->randomFloat(0,6,32))
                  ->setLongueur($facker->randomFloat(2,4,12))
                  ->setOptions($facker->randomElement(['Direction assistée, Direction assistée, Aide au stationnement, GPS, Climatisation cabine, Climatisation cellule,  Dispositif anti-démarrage, Prise 220 volts, Caméra de recul','Direction assistée, Aide au stationnement, GPS, Climatisation cabine, Sans climatisation,  Dispositif anti-démarrage, Prise 110 volts, Caméra de recul']))
                  ->setTarifAssurance($facker->randomFloat(2,20, 50))
                  ->setTarifDeLocation($facker->randomFloat(2,80,250))
                  ->setTitre($facker->title)
                  ->setTypeDeCouchage(' lit capucine (2 places)
                                                    - lits superposés (2 places)
                                                    - lit dînette (2 places)')
                  ->setTypeAssurance($facker->randomElement(['Allianz','SUNU','AXA']))
                  ->setUsers($user);

              $manager->persist($campingCar);

          }

          for ($bd = 0; $bd < mt_rand(2,10); $bd++){

              $bdessinees = new BandeDessinee();
              $bdessinees->setTitre($facker->title)
                  ->setImage($facker->imageUrl(220,110))
                  ->setCommentaire($facker->text(200))
                  ->setUsers($user)
                  ->setDateLimiteDeLalbum($facker->date('d-m-Y','+6 months'))
                  ->setDateLimiteDeVente($facker->date('d-m-Y','+3 years'))
                  ->setEditeur($facker->colorName)
                  ->setEditionOriginale($facker->company)
                  ->setEtatGeneral($facker->randomElement(['neuf','Ancien']))
                  ->setIdDeVente($facker->randomDigit)
                  ->setLieuDeVente($facker->city)
                  ->setNbDeVente($facker->randomFloat(0,1,5000))
                  ->setVendeur($facker->company)
                  ->setPrixDeVente($facker->randomFloat(2,100,500));

              $manager->persist($bdessinees);



          }

            for ($book = 0; $book < mt_rand(2,10); $book++){

                $livres = new Livre();
                $livres->setTitre($facker->title)
                    ->setImage($facker->imageUrl(220,110))
                    ->setCommentaire($facker->text(200))
                    ->setUsers($user)
                    ->setDateLimiteDeLalbum($facker->date('d-m-Y','+6 months'))
                    ->setDateLimiteDeVente($facker->date('d-m-Y','+3 years'))
                    ->setEditeur($facker->colorName)
                    ->setEditionOriginale($facker->company)
                    ->setEtatGeneral($facker->randomElement(['neuf','Ancien']))
                    ->setIdDeVente($facker->randomDigit)
                    ->setLieuDeVente($facker->city)
                    ->setNbDeVente($facker->randomFloat(0,1,5000))
                    ->setVendeur($facker->company)
                    ->setPrixDeVente($facker->randomFloat(2,100,500))
                    ->setLangue($facker->languageCode)
                    ->setCollection($facker->firstName)
                    ->setDateparution($facker->date('Y','now'))
                    ->setDisponibilite($facker->randomElement(['Disponible','Sur commande','En rupture','Stock limité']))
                    ->setTraducteur($facker->lastName)
                    ->setNbrepage($facker->randomFloat(0,50,2000))
                    ->setIsbn($facker->creditCardNumber)
                    ->setFormat($facker->randomElement(['Poche','Table']))
                    ->setEan($facker->creditCardNumber);


                $manager->persist($livres);



            }


        }





        $manager->flush();
    }
}
