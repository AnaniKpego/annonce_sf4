<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
 * @ORM\Entity(repositoryClass="App\Repository\CampingCarRepository")
 * @ApiFilter(
 *     SearchFilter::class,
 *     properties={
 *      "created_at":"partial", "titre":"partial",
 *      "nbreDePlace":"partial", "nbreCouchage":"partial", "carburant":"partial",
 *      "killomertage":"partial", "marque":"partial", "longueur":"partial",
 *      "hauteur":"partial", "boiteDeVitesse":"partial","typeDeCouchage":"partial",
 *      "consommation":"partial", "equipements":"partial", "options":"partial", "cylindreMax":"partial",
 *      "description":"partial", "conditionsDeLocation":"partial", "typeAssurance":"partial", "extras":"partial",
 *      "heureDeDepart":"partial", "heureDeRetour":"partial", "localite":"partial",
 *      "tarifDeLocation":"partial", "tarifAssurance":"partial"
 * })
 * @ApiResource(
 *     attributes={
 *          "pagination_enabled"=true,
 *          "pagination_items_per_page"=1000
 *
 *
 *     },
 *     normalizationContext={
 *          "groups"={"campingCars_read"}
 *     },
 *     collectionOperations={"GET","POST"},
 *     itemOperations={"GET","PUT","DELETE"},
 *     subresourceOperations={
 *          "ads_get_subresource"={"path"="/users/{id}/campingCars"},
 *          "api_users_campingCars_get_subresource"={"groups"={"campingCars_subresource"}}
 *     }
 *
 *
 *
 *
 * )
 */
class CampingCar
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $titre;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $nbreDePlace;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $nbreCouchage;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $carburant;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $killomertage;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $marque;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $longueur;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $hauteur;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $boiteDeVitesse;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $typeDeCouchage;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $consommation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $equipements;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $options;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $extras;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $conditionsDeLocation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $typeAssurance;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $heureDeDepart;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $heureDeRetour;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $localite;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $image;

    /**
     * @ORM\Column(type="float")
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $tarifDeLocation;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"campingCars_read","campingCars_subresource","users_reads"})
     */
    private $tarifAssurance;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="campingCars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getNbreDePlace(): ?int
    {
        return $this->nbreDePlace;
    }

    public function setNbreDePlace(int $nbreDePlace): self
    {
        $this->nbreDePlace = $nbreDePlace;

        return $this;
    }

    public function getNbreCouchage(): ?int
    {
        return $this->nbreCouchage;
    }

    public function setNbreCouchage(int $nbreCouchage): self
    {
        $this->nbreCouchage = $nbreCouchage;

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

    public function getKillomertage(): ?int
    {
        return $this->killomertage;
    }

    public function setKillomertage(int $killomertage): self
    {
        $this->killomertage = $killomertage;

        return $this;
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

    public function getLongueur(): ?int
    {
        return $this->longueur;
    }

    public function setLongueur(int $longueur): self
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getHauteur(): ?int
    {
        return $this->hauteur;
    }

    public function setHauteur(int $hauteur): self
    {
        $this->hauteur = $hauteur;

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

    public function getTypeDeCouchage(): ?string
    {
        return $this->typeDeCouchage;
    }

    public function setTypeDeCouchage(string $typeDeCouchage): self
    {
        $this->typeDeCouchage = $typeDeCouchage;

        return $this;
    }

    public function getConsommation(): ?string
    {
        return $this->consommation;
    }

    public function setConsommation(string $consommation): self
    {
        $this->consommation = $consommation;

        return $this;
    }

    public function getEquipements(): ?string
    {
        return $this->equipements;
    }

    public function setEquipements(string $equipements): self
    {
        $this->equipements = $equipements;

        return $this;
    }

    public function getOptions(): ?string
    {
        return $this->options;
    }

    public function setOptions(string $options): self
    {
        $this->options = $options;

        return $this;
    }

    public function getExtras(): ?string
    {
        return $this->extras;
    }

    public function setExtras(string $extras): self
    {
        $this->extras = $extras;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getConditionsDeLocation(): ?string
    {
        return $this->conditionsDeLocation;
    }

    public function setConditionsDeLocation(?string $conditionsDeLocation): self
    {
        $this->conditionsDeLocation = $conditionsDeLocation;

        return $this;
    }

    public function getTypeAssurance(): ?string
    {
        return $this->typeAssurance;
    }

    public function setTypeAssurance(string $typeAssurance): self
    {
        $this->typeAssurance = $typeAssurance;

        return $this;
    }

    public function getHeureDeDepart(): ?string
    {
        return $this->heureDeDepart;
    }

    public function setHeureDeDepart(string $heureDeDepart): self
    {
        $this->heureDeDepart = $heureDeDepart;

        return $this;
    }

    public function getHeureDeRetour(): ?string
    {
        return $this->heureDeRetour;
    }

    public function setHeureDeRetour(string $heureDeRetour): self
    {
        $this->heureDeRetour = $heureDeRetour;

        return $this;
    }

    public function getLocalite(): ?string
    {
        return $this->localite;
    }

    public function setLocalite(string $localite): self
    {
        $this->localite = $localite;

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

    public function getTarifDeLocation(): ?float
    {
        return $this->tarifDeLocation;
    }

    public function setTarifDeLocation(float $tarifDeLocation): self
    {
        $this->tarifDeLocation = $tarifDeLocation;

        return $this;
    }

    public function getTarifAssurance(): ?float
    {
        return $this->tarifAssurance;
    }

    public function setTarifAssurance(?float $tarifAssurance): self
    {
        $this->tarifAssurance = $tarifAssurance;

        return $this;
    }

    public function getUsers(): ?User
    {
        return $this->users;
    }

    public function setUsers(?User $users): self
    {
        $this->users = $users;

        return $this;
    }
}
