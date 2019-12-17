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
 * @ORM\Entity(repositoryClass="App\Repository\MontreRepository")
 * @UniqueEntity("idDeVente", message="Le numéro de vent exite déja")
 * @ApiFilter(SearchFilter::class, properties={"titre":"partial", "reference":"partial",
 *     "prix":"partial", "disponibilite":"partial", "resume":"partial", "description":"partial",
 *     "genre":"partial", "age":"partial", "boitier":"partial",
 *     "couleurducadran":"partial", "couleurboitier":"partial",
 *     "verre":"partial", "affichage":"partial",
 *     "mouvement":"partial", "bracelet":"partial","couleurdubracelet":"partial",
 *     "fermoir":"partial", "etancheite":"partial","garantie":"partial",
 *     "image":"partial", "epaisseur":"partial","entrecorne":"partial",
 *     "taille":"partial"
 *     })
 * @ApiResource(
 *     attributes={
 *          "pagination_enabled"=true,
 *          "pagination_items_per_page"=1000
 *
 *
 *     },
 *     normalizationContext={
 *          "groups"={"montres_read"}
 *     },
 *     collectionOperations={"GET","POST"},
 *     itemOperations={"GET","PUT","DELETE"},
 *     subresourceOperations={
 *          "api_users_montres_get_subresource"={"groups"={"montres_subresource"}}
 *     }
 *
 *
 *
 *
 * )
 */
class Montre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $reference;

    /**
     * @ORM\Column(type="float")
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $disponibilite;

    /**
     * @ORM\Column(type="text")
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $resume;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $genre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $age;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $boitier;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $couleurducadran;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $couleurboitier;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $taille;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $epaisseur;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $verre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $affichage;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $mouvement;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $bracelet;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $couleurdubracelet;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $entrecorne;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $fermoir;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $etancheite;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $garantie;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"montres_read","montres_subresource","users_reads"})
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="montres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDisponibilite(): ?string
    {
        return $this->disponibilite;
    }

    public function setDisponibilite(string $disponibilite): self
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

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

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getAge(): ?string
    {
        return $this->age;
    }

    public function setAge(string $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getBoitier(): ?string
    {
        return $this->boitier;
    }

    public function setBoitier(string $boitier): self
    {
        $this->boitier = $boitier;

        return $this;
    }

    public function getCouleurducadran(): ?string
    {
        return $this->couleurducadran;
    }

    public function setCouleurducadran(string $couleurducadran): self
    {
        $this->couleurducadran = $couleurducadran;

        return $this;
    }

    public function getCouleurboitier(): ?string
    {
        return $this->couleurboitier;
    }

    public function setCouleurboitier(string $couleurboitier): self
    {
        $this->couleurboitier = $couleurboitier;

        return $this;
    }

    public function getTaille(): ?int
    {
        return $this->taille;
    }

    public function setTaille(int $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getEpaisseur(): ?int
    {
        return $this->epaisseur;
    }

    public function setEpaisseur(int $epaisseur): self
    {
        $this->epaisseur = $epaisseur;

        return $this;
    }

    public function getVerre(): ?string
    {
        return $this->verre;
    }

    public function setVerre(string $verre): self
    {
        $this->verre = $verre;

        return $this;
    }

    public function getAffichage(): ?string
    {
        return $this->affichage;
    }

    public function setAffichage(string $affichage): self
    {
        $this->affichage = $affichage;

        return $this;
    }

    public function getMouvement(): ?string
    {
        return $this->mouvement;
    }

    public function setMouvement(string $mouvement): self
    {
        $this->mouvement = $mouvement;

        return $this;
    }

    public function getBracelet(): ?string
    {
        return $this->bracelet;
    }

    public function setBracelet(string $bracelet): self
    {
        $this->bracelet = $bracelet;

        return $this;
    }

    public function getCouleurdubracelet(): ?string
    {
        return $this->couleurdubracelet;
    }

    public function setCouleurdubracelet(string $couleurdubracelet): self
    {
        $this->couleurdubracelet = $couleurdubracelet;

        return $this;
    }

    public function getEntrecorne(): ?int
    {
        return $this->entrecorne;
    }

    public function setEntrecorne(int $entrecorne): self
    {
        $this->entrecorne = $entrecorne;

        return $this;
    }

    public function getFermoir(): ?string
    {
        return $this->fermoir;
    }

    public function setFermoir(string $fermoir): self
    {
        $this->fermoir = $fermoir;

        return $this;
    }

    public function getEtancheite(): ?string
    {
        return $this->etancheite;
    }

    public function setEtancheite(string $etancheite): self
    {
        $this->etancheite = $etancheite;

        return $this;
    }

    public function getGarantie(): ?string
    {
        return $this->garantie;
    }

    public function setGarantie(string $garantie): self
    {
        $this->garantie = $garantie;

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
