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
 * @ORM\Entity(repositoryClass="App\Repository\BandeDessineeRepository")
 * @UniqueEntity("idDeVente", message="Le numéro de vent exite déja")
 * @ApiFilter(SearchFilter::class, properties={"titre":"partial", "dateLimiteDeLalbum":"partial",
 *     "editeur":"partial", "vendeur":"partial", "editionOriginale":"partial", "nbDeVente":"partial",
 *     "etatGeneral":"partial", "prixDeVente":"partial", "idDeVente":"partial",
 *     "dateLimiteDeVente":"partial", "commentaire":"partial"
 *     })
 * @ApiResource(
 *     attributes={
 *          "pagination_enabled"=true,
 *          "pagination_items_per_page"=1000
 *
 *
 *     },
 *     normalizationContext={
 *          "groups"={"bandeDessinees_read"}
 *     },
 *     collectionOperations={"GET","POST"},
 *     itemOperations={"GET","PUT","DELETE"},
 *     subresourceOperations={
 *          "ads_get_subresource"={"path"="/users/{id}/bandeDessinees"},
 *          "api_users_bandeDessinees_get_subresource"={"groups"={"bandeDessinees_subresource"}}
 *     }
 *
 *
 *
 *
 * )
 */
class BandeDessinee
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"bandeDessinees_read","bandeDessinees_subresource","users_reads"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"bandeDessinees_read","bandeDessinees_subresource","users_reads"})
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"bandeDessinees_read","bandeDessinees_subresource","users_reads"})
     */
    private $dateLimiteDeLalbum;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"bandeDessinees_read","bandeDessinees_subresource","users_reads"})
     */
    private $editeur;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"bandeDessinees_read","bandeDessinees_subresource","users_reads"})
     */
    private $editionOriginale;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"bandeDessinees_read","bandeDessinees_subresource","users_reads"})
     */
    private $vendeur;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"bandeDessinees_read","bandeDessinees_subresource","users_reads"})
     */
    private $nbDeVente;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"bandeDessinees_read","bandeDessinees_subresource","users_reads"})
     */
    private $etatGeneral;

    /**
     * @ORM\Column(type="float")
     * @Groups({"bandeDessinees_read","bandeDessinees_subresource","users_reads"})
     */
    private $prixDeVente;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"bandeDessinees_read","bandeDessinees_subresource","users_reads"})
     */
    private $lieuDeVente;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"bandeDessinees_read","bandeDessinees_subresource","users_reads"})
     */
    private $idDeVente;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"bandeDessinees_read","bandeDessinees_subresource","users_reads"})
     */
    private $dateLimiteDeVente;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"bandeDessinees_read","bandeDessinees_subresource","users_reads"})
     */
    private $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="bandeDessinees")
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"bandeDessinees_read","bandeDessinees_subresource","users_reads"})
     */
    private $image;

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

    public function getDateLimiteDeLalbum(): ?string
    {
        return $this->dateLimiteDeLalbum;
    }

    public function setDateLimiteDeLalbum(?string $dateLimiteDeLalbum): self
    {
        $this->dateLimiteDeLalbum = $dateLimiteDeLalbum;

        return $this;
    }

    public function getEditeur(): ?string
    {
        return $this->editeur;
    }

    public function setEditeur(string $editeur): self
    {
        $this->editeur = $editeur;

        return $this;
    }

    public function getEditionOriginale(): ?bool
    {
        return $this->editionOriginale;
    }

    public function setEditionOriginale(bool $editionOriginale): self
    {
        $this->editionOriginale = $editionOriginale;

        return $this;
    }

    public function getVendeur(): ?string
    {
        return $this->vendeur;
    }

    public function setVendeur(string $vendeur): self
    {
        $this->vendeur = $vendeur;

        return $this;
    }

    public function getNbDeVente(): ?int
    {
        return $this->nbDeVente;
    }

    public function setNbDeVente(int $nbDeVente): self
    {
        $this->nbDeVente = $nbDeVente;

        return $this;
    }

    public function getEtatGeneral(): ?string
    {
        return $this->etatGeneral;
    }

    public function setEtatGeneral(string $etatGeneral): self
    {
        $this->etatGeneral = $etatGeneral;

        return $this;
    }

    public function getPrixDeVente(): ?float
    {
        return $this->prixDeVente;
    }

    public function setPrixDeVente(float $prixDeVente): self
    {
        $this->prixDeVente = $prixDeVente;

        return $this;
    }

    public function getLieuDeVente(): ?string
    {
        return $this->lieuDeVente;
    }

    public function setLieuDeVente(string $lieuDeVente): self
    {
        $this->lieuDeVente = $lieuDeVente;

        return $this;
    }

    public function getIdDeVente(): ?int
    {
        return $this->idDeVente;
    }

    public function setIdDeVente(int $idDeVente): self
    {
        $this->idDeVente = $idDeVente;

        return $this;
    }

    public function getDateLimiteDeVente(): ?string
    {
        return $this->dateLimiteDeVente;
    }

    public function setDateLimiteDeVente(?string $dateLimiteDeVente): self
    {
        $this->dateLimiteDeVente = $dateLimiteDeVente;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): self
    {
        $this->commentaire = $commentaire;

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
