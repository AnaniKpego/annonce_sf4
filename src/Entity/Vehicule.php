<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\SubresourceDataProvider;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Validator\Constraints\Unique;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass="App\Repository\VehiculeRepository")
 * @ApiFilter(SearchFilter::class, properties={"marque":"partial", "model":"partial",
 *     "version":"partial", "prixMin":"partial", "prixMax":"partial",
 *     "boiteDeVitesse":"partial", "kilometrageMin":"partial", "kilometrageMax":"partial",
 *     "carburant":"partial", "categorieVehicule":"partial","anneeMin":"partial", "anneeMax":"partial",
 *     "kwMin":"partial", "kwMax":"partial", "cylindreMin":"partial", "cylindreMax":"partial",
 *     "qualites":"partial", "categorie":"partial", "couleur":"partial", "placesMin":"partial",
 *     "placesMax":"partial", "equipement":"partial", "equipementSuplementaire":"partial",
 *     "qualiteEquipement":"partial", "consommation":"partial", "co2EmissionBis":"partial",
 *     "normesEmission":"partial", "npaLieu":"partial", "rayon":"partial", "ageDelAnnonce":"partial",
 *     "tri":"partial", "sidleQualite":"partial", "typeCarrosserie":"partial", "nbrePorteMin":"partial",
 *     "nbrePorteMax":"partial", "chMin":"partial", "chMax":"partial", "poidsRemarquableMin":"partial",
 *     "poidsRemarquableMax":"partial"
 * })
 * @ApiResource(
 *     attributes={
 *          "pagination_enabled"=true,
 *          "pagination_items_per_page"=1000
 *
 *
 *     },
 *     normalizationContext={
 *          "groups"={"vehicules_read"}
 *     },
 *     collectionOperations={"GET","POST"},
 *     itemOperations={"GET","PUT","DELETE"},
 *     subresourceOperations={
 *          "ads_get_subresource"={"path"="/users/{id}/vehicules"},
 *          "api_users_vehicules_get_subresource"={"groups"={"vehicules_subresource"}}
 *     }
 *
 *
 *
 *
 * )
 */
class Vehicule
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $marque;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $modele;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $version;

    /**
     * @ORM\Column(type="float")
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $prixMin;

    /**
     * @ORM\Column(type="float")
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $prixMax;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $boiteDeVitesse;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $rouesMotrices;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $kilometrageMin;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $kilometrageMax;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $carburant;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $categorieVehicule;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $anneeMin;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $anneeMax;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $categorieLicence;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $kwMin;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $kwMax;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $cylindreMin;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $cylindreMax;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $qualites;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $couleur;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $placesMin;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $placesMax;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $equipement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $equipementSuplementaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $qualiteEquipement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $consommation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $co2EmissionBis;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $normesEmission;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $npaLieu;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $rayon;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $ageDelAnnonce;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $tri;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $sigleQualite;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\user", inversedBy="vehicules")
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $chMin;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $chMax;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $poidsRemarquableMin;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $poidsRemarquableMax;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $typeCarrosserie;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $nbrePorteMin;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $nbrePorteMax;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"vehicules_read","vehicules_subresource","users_reads"})
     */
    private $image;


    public function getNbrePorteMax(): ?string
    {
        return $this->nbrePorteMax;
    }

    public function setNbrePorteMax(string $nbrePorteMax): self
    {
        $this->nbrePorteMax = $nbrePorteMax;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getPrixMin(): ?float
    {
        return $this->prixMin;
    }

    public function setPrixMin(float $prixMin): self
    {
        $this->prixMin = $prixMin;

        return $this;
    }

    public function getPrixMax(): ?float
    {
        return $this->prixMax;
    }

    public function setPrixMax(float $prixMax): self
    {
        $this->prixMax = $prixMax;

        return $this;
    }

    public function getBoiteDeVitesse(): ?string
    {
        return $this->boiteDeVitesse;
    }

    public function setBoiteDeVitesse(string $boiteDeVitesse): self
    {
        $this->boiteDeVitesse = $boiteDeVitesse;

        return $this;
    }

    public function getRouesMotrices(): ?string
    {
        return $this->rouesMotrices;
    }

    public function setRouesMotrices(string $rouesMotrices): self
    {
        $this->rouesMotrices = $rouesMotrices;

        return $this;
    }

    public function getKilometrageMin(): ?string
    {
        return $this->kilometrageMin;
    }

    public function setKilometrageMin(string $kilometrageMin): self
    {
        $this->kilometrageMin = $kilometrageMin;

        return $this;
    }

    public function getKilometrageMax(): ?string
    {
        return $this->kilometrageMax;
    }

    public function setKilometrageMax(string $kilometrageMax): self
    {
        $this->kilometrageMax = $kilometrageMax;

        return $this;
    }

    public function getCarburant(): ?string
    {
        return $this->carburant;
    }

    public function setCarburant(string $carburant): self
    {
        $this->carburant = $carburant;

        return $this;
    }

    public function getCategorieVehicule(): ?string
    {
        return $this->categorieVehicule;
    }

    public function setCategorieVehicule(string $categorieVehicule): self
    {
        $this->categorieVehicule = $categorieVehicule;

        return $this;
    }

    public function getAnneeMin(): ?string
    {
        return $this->anneeMin;
    }

    public function setAnneeMin(string $anneeMin): self
    {
        $this->anneeMin = $anneeMin;

        return $this;
    }

    public function getAnneeMax(): ?string
    {
        return $this->anneeMax;
    }

    public function setAnneeMax(string $anneeMax): self
    {
        $this->anneeMax = $anneeMax;

        return $this;
    }

    public function getCategorieLicence(): ?string
    {
        return $this->categorieLicence;
    }

    public function setCategorieLicence(string $categorieLicence): self
    {
        $this->categorieLicence = $categorieLicence;

        return $this;
    }

    public function getKwMin(): ?string
    {
        return $this->kwMin;
    }

    public function setKwMin(string $kwMin): self
    {
        $this->kwMin = $kwMin;

        return $this;
    }

    public function getKwMax(): ?string
    {
        return $this->kwMax;
    }

    public function setKwMax(string $kwMax): self
    {
        $this->kwMax = $kwMax;

        return $this;
    }

    public function getCylindreMin(): ?string
    {
        return $this->cylindreMin;
    }

    public function setCylindreMin(string $cylindreMin): self
    {
        $this->cylindreMin = $cylindreMin;

        return $this;
    }

    public function getCylindreMax(): ?string
    {
        return $this->cylindreMax;
    }

    public function setCylindreMax(string $cylindreMax): self
    {
        $this->cylindreMax = $cylindreMax;

        return $this;
    }

    public function getQualites(): ?string
    {
        return $this->qualites;
    }

    public function setQualites(string $qualites): self
    {
        $this->qualites = $qualites;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getPlacesMin(): ?string
    {
        return $this->placesMin;
    }

    public function setPlacesMin(string $placesMin): self
    {
        $this->placesMin = $placesMin;

        return $this;
    }

    public function getplacesMax(): ?string
    {
        return $this->placesMax;
    }

    public function setplacesMax(string $placesMax): self
    {
        $this->placesMax = $placesMax;

        return $this;
    }

    public function getEquipement(): ?string
    {
        return $this->equipement;
    }

    public function setEquipement(string $equipement): self
    {
        $this->equipement = $equipement;

        return $this;
    }

    public function getEquipementSuplementaire(): ?string
    {
        return $this->equipementSuplementaire;
    }

    public function setEquipementSuplementaire(?string $equipementSuplementaire): self
    {
        $this->equipementSuplementaire = $equipementSuplementaire;

        return $this;
    }

    public function getQualiteEquipement(): ?string
    {
        return $this->qualiteEquipement;
    }

    public function setQualiteEquipement(?string $qualiteEquipement): self
    {
        $this->qualiteEquipement = $qualiteEquipement;

        return $this;
    }

    public function getConsommation(): ?string
    {
        return $this->consommation;
    }

    public function setConsommation(?string $consommation): self
    {
        $this->consommation = $consommation;

        return $this;
    }

    public function getCo2EmissionBis(): ?string
    {
        return $this->co2EmissionBis;
    }

    public function setCo2EmissionBis(?string $co2EmissionBis): self
    {
        $this->co2EmissionBis = $co2EmissionBis;

        return $this;
    }

    public function getNormesEmission(): ?string
    {
        return $this->normesEmission;
    }

    public function setNormesEmission(?string $normesEmission): self
    {
        $this->normesEmission = $normesEmission;

        return $this;
    }

    public function getNpaLieu(): ?string
    {
        return $this->npaLieu;
    }

    public function setNpaLieu(string $npaLieu): self
    {
        $this->npaLieu = $npaLieu;

        return $this;
    }

    public function getRayon(): ?string
    {
        return $this->rayon;
    }

    public function setRayon(string $rayon): self
    {
        $this->rayon = $rayon;

        return $this;
    }

    public function getAgeDelAnnonce(): ?string
    {
        return $this->ageDelAnnonce;
    }

    public function setAgeDelAnnonce(string $ageDelAnnonce): self
    {
        $this->ageDelAnnonce = $ageDelAnnonce;

        return $this;
    }

    public function getTri(): ?string
    {
        return $this->tri;
    }

    public function setTri(string $tri): self
    {
        $this->tri = $tri;

        return $this;
    }

    public function getSigleQualite(): ?string
    {
        return $this->sigleQualite;
    }

    public function setSigleQualite(string $sigleQualite): self
    {
        $this->sigleQualite = $sigleQualite;

        return $this;
    }

    public function getUsers(): ?user
    {
        return $this->users;
    }

    public function setUsers(?user $users): self
    {
        $this->users = $users;

        return $this;
    }

    public function getChMin(): ?string
    {
        return $this->chMin;
    }

    public function setChMin(string $chMin): self
    {
        $this->chMin = $chMin;

        return $this;
    }

    public function getChMax(): ?string
    {
        return $this->chMax;
    }

    public function setChMax(string $chMax): self
    {
        $this->chMax = $chMax;

        return $this;
    }

    public function getPoidsRemarquableMin(): ?string
    {
        return $this->poidsRemarquableMin;
    }

    public function setPoidsRemarquableMin(string $poidsRemarquableMin): self
    {
        $this->poidsRemarquableMin = $poidsRemarquableMin;

        return $this;
    }

    public function getPoidsRemarquableMax(): ?string
    {
        return $this->poidsRemarquableMax;
    }

    public function setPoidsRemarquableMax(string $poidsRemarquableMax): self
    {
        $this->poidsRemarquableMax = $poidsRemarquableMax;

        return $this;
    }

    public function getTypeCarrosserie(): ?string
    {
        return $this->typeCarrosserie;
    }

    public function setTypeCarrosserie(string $typeCarrosserie): self
    {
        $this->typeCarrosserie = $typeCarrosserie;

        return $this;
    }

    public function getNbrePorteMin(): ?string
    {
        return $this->nbrePorteMin;
    }

    public function setNbrePorteMin(string $nbrePorteMin): self
    {
        $this->nbrePorteMin = $nbrePorteMin;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
