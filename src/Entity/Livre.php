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
 * @ORM\Entity(repositoryClass="App\Repository\LivreRepository")
 * @UniqueEntity("idDeVente", message="Le numéro de vent exite déja")
 * @ApiFilter(SearchFilter::class, properties={"titre":"partial", "dateLimiteDeLalbum":"partial",
 *     "editeur":"partial", "vendeur":"partial", "editionOriginale":"partial", "nbDeVente":"partial",
 *     "etatGeneral":"partial", "prixDeVente":"partial", "idDeVente":"partial",
 *     "dateLimiteDeVente":"partial", "commentaire":"partial",
 *     "isbn":"partial", "ean":"partial","langue":"partial"
 *     })
 * @ApiResource(
 *     attributes={
 *          "pagination_enabled"=true,
 *          "pagination_items_per_page"=1000
 *
 *
 *     },
 *     normalizationContext={
 *          "groups"={"livres_read"}
 *     },
 *     collectionOperations={"GET","POST"},
 *     itemOperations={"GET","PUT","DELETE"},
 *     subresourceOperations={
 *          "api_users_livres_get_subresource"={"groups"={"livres_subresource"}}
 *     }
 *
 *
 *
 *
 * )
 */
class Livre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $dateLimiteDeLalbum;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $editeur;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $editionOriginale;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $vendeur;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $nbDeVente;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $etatGeneral;

    /**
     * @ORM\Column(type="float")
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $prixDeVente;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $lieuDeVente;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $idDeVente;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $dateLimiteDeVente;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="livres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $langue;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $traducteur;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $format;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $collection;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $dateparution;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $nbrepage;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $ean;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $isbn;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"livres_read","livres_subresource","users_reads"})
     */
    private $disponibilite;

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

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(string $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getTraducteur(): ?string
    {
        return $this->traducteur;
    }

    public function setTraducteur(string $traducteur): self
    {
        $this->traducteur = $traducteur;

        return $this;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(string $format): self
    {
        $this->format = $format;

        return $this;
    }

    public function getCollection(): ?string
    {
        return $this->collection;
    }

    public function setCollection(string $collection): self
    {
        $this->collection = $collection;

        return $this;
    }

    public function getDateparution(): ?string
    {
        return $this->dateparution;
    }

    public function setDateparution(string $dateparution): self
    {
        $this->dateparution = $dateparution;

        return $this;
    }

    public function getNbrepage(): ?int
    {
        return $this->nbrepage;
    }

    public function setNbrepage(int $nbrepage): self
    {
        $this->nbrepage = $nbrepage;

        return $this;
    }

    public function getEan(): ?string
    {
        return $this->ean;
    }

    public function setEan(string $ean): self
    {
        $this->ean = $ean;

        return $this;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): self
    {
        $this->isbn = $isbn;

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
}
