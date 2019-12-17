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
 * @ORM\Entity(repositoryClass="App\Repository\ImmobilierRepository")
 * @ApiFilter(
 *     SearchFilter::class,
 *     properties={
 *      "typeDemande":"partial", "localite":"partial",
 *      "prixMin":"partial", "prixMax":"partial",
 *      "piecesMin":"partial", "piecesMax":"partial", "surfaceHabitableMin":"partial",
 *      "surfaceHabitableMax":"partial", "typeDobjet":"partial","caracteristiques":"partial",
 *      "etage":"partial","created_at":"partial",
 *     "disponibiliteMin":"partial", "disponibiliteMax":"partial"
 * })
 * @ApiResource(
 *     attributes={
 *          "pagination_enabled"=true,
 *          "pagination_items_per_page"=1000
 *
 *
 *     },
 *     normalizationContext={
 *          "groups"={"immobiliers_read"}
 *     },
 *     collectionOperations={"GET","POST"},
 *     itemOperations={"GET","PUT","DELETE"},
 *     subresourceOperations={
 *          "ads_get_subresource"={"path"="/users/{id}/immobiliers"},
 *          "api_users_immobiliers_get_subresource"={"groups"={"immobiliers_subresource"}}
 *     }
 *
 *
 *
 *
 * )
 */
class Immobilier
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"immobiliers_read","immobiliers_subresource","users_reads"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"immobiliers_read","immobiliers_subresource","users_reads"})
     */
    private $typeDemande;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"immobiliers_read","immobiliers_subresource","users_reads"})
     */
    private $localite;

    /**
     * @ORM\Column(type="float")
     * @Groups({"immobiliers_read","immobiliers_subresource","users_reads"})
     */
    private $prixMin;

    /**
     * @ORM\Column(type="float")
     * @Groups({"immobiliers_read","immobiliers_subresource","users_reads"})
     */
    private $prixMax;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"immobiliers_read","immobiliers_subresource","users_reads"})
     */
    private $piecesMin;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"immobiliers_read","immobiliers_subresource","users_reads"})
     */
    private $surfaceHabitableMin;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"immobiliers_read","immobiliers_subresource","users_reads"})
     */
    private $surfaceHabitableMax;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"immobiliers_read","immobiliers_subresource","users_reads"})
     */
    private $typeDobjet;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"immobiliers_read","immobiliers_subresource","users_reads"})
     */
    private $caracteristiques;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"immobiliers_read","immobiliers_subresource","users_reads"})
     */
    private $etage;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"immobiliers_read","immobiliers_subresource","users_reads"})
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"immobiliers_read","immobiliers_subresource","users_reads"})
     */
    private $disponibiliteMin;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"immobiliers_read","immobiliers_subresource","users_reads"})
     */
    private $disponibiliteMax;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="immobiliers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"immobiliers_read","immobiliers_subresource","users_reads"})
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"immobiliers_read","immobiliers_subresource","users_reads"})
     */
    private $pieceMax;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeDemande(): ?string
    {
        return $this->typeDemande;
    }

    public function setTypeDemande(string $typeDemande): self
    {
        $this->typeDemande = $typeDemande;

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

    public function getPiecesMin(): ?string
    {
        return $this->piecesMin;
    }

    public function setPiecesMin(string $piecesMin): self
    {
        $this->piecesMin = $piecesMin;

        return $this;
    }

    public function getSurfaceHabitableMin(): ?string
    {
        return $this->surfaceHabitableMin;
    }

    public function setSurfaceHabitableMin(string $surfaceHabitableMin): self
    {
        $this->surfaceHabitableMin = $surfaceHabitableMin;

        return $this;
    }

    public function getSurfaceHabitableMax(): ?string
    {
        return $this->surfaceHabitableMax;
    }

    public function setSurfaceHabitableMax(string $surfaceHabitableMax): self
    {
        $this->surfaceHabitableMax = $surfaceHabitableMax;

        return $this;
    }

    public function getTypeDobjet(): ?string
    {
        return $this->typeDobjet;
    }

    public function setTypeDobjet(string $typeDobjet): self
    {
        $this->typeDobjet = $typeDobjet;

        return $this;
    }

    public function getCaracteristiques(): ?string
    {
        return $this->caracteristiques;
    }

    public function setCaracteristiques(string $caracteristiques): self
    {
        $this->caracteristiques = $caracteristiques;

        return $this;
    }

    public function getEtage(): ?string
    {
        return $this->etage;
    }

    public function setEtage(?string $etage): self
    {
        $this->etage = $etage;

        return $this;
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

    public function getDisponibiliteMin(): ?string
    {
        return $this->disponibiliteMin;
    }

    public function setDisponibiliteMin(string $disponibiliteMin): self
    {
        $this->disponibiliteMin = $disponibiliteMin;

        return $this;
    }

    public function getDisponibiliteMax(): ?string
    {
        return $this->disponibiliteMax;
    }

    public function setDisponibiliteMax(string $disponibiliteMax): self
    {
        $this->disponibiliteMax = $disponibiliteMax;

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

    public function getPieceMax(): ?string
    {
        return $this->pieceMax;
    }

    public function setPieceMax(string $pieceMax): self
    {
        $this->pieceMax = $pieceMax;

        return $this;
    }
}
