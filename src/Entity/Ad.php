<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Api;
use ApiPlatform\Core\Annotation\ApiFilter;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiSubresource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\SubresourceDataProvider;
use ApiPlatform\Core\Swagger;
/**
 * @ORM\Entity(repositoryClass="App\Repository\AdRepository")
 * @ApiFilter(
 *     SearchFilter::class,
 *        properties={
 *          "sellingprice",
 *          "opened_at"
 * })
 * @ApiFilter(
 *     SearchFilter::class,
 *        properties={
 *          "title":"partial",
 *          "content":"partial",
 *          "statu":"partial",
 *          "dailyprice",
 *          "monthlyprice",
 *          "annualprice",
 *          "country":"partial",
 *          "city":"partial",
 *          "sellingprice"
 * })
 * @ApiResource(
 *     attributes={
 *          "pagination_enabled"=false,
 *          "pagination_items_per_page"=500,
 *          "order": {"opened_at":"desc"}
 *     },
 *     normalizationContext={
 *          "groups"={"ads_read"}
 *     },
 *     denormalizationContext={
 *          "disable_type_enforcement"=true
 *     },
 *     subresourceOperations={
 *          "api_advertisers_ads_get_subresource"={"groups"={"ads_subresource"}}
 *     },
 *     itemOperations={
 *          "GET","PUT","DELETE",
 *          "increment"={
 *              "method"="post","path"="/ads/{id}/increment",
 *              "controller"="App\Controller\AdIncrementationController",
 *              "swagger_context"={
 *                  "summary"="Incrementer une annonce",
 *                  "description"="Incrementer le chrono d'une annonce donnée"
 *              }
 *          }
 *     }
 *
 * )
 *
 */
class Ad
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"ads_read","advertisers_read","ads_subresource"})
     */
    private $id;

    /**
     * @ORM\Column(type="text", length=255)
     * @Groups({"ads_read","advertisers_read","ads_subresource"})
     * @Assert\NotBlank(message="Le titre est obligatoire")
     * @Assert\Length(min=8, minMessage="le titre doit être compris entre 8 et 255 caractères",
     * max=255, maxMessage="le titre doit être compris entre 8 et 255 caractères")
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     * @Groups({"ads_read","advertisers_read","ads_subresource"})
     * @Assert\NotBlank(message="Le titre est obligatoire")
     * @Assert\Length(min=20, minMessage="le titre doit être compris entre 8 et 1000 caractères",
     * max=1000, maxMessage="le titre doit être compris entre 8 et 1000 caractères")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="ads")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categories;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"ads_read","advertisers_read","ads_subresource"})
     * @Assert\DateTime(message="La date doit être au format  YYYY-MM-DD")
     */
    private $opened_at;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"ads_read","advertisers_read","ads_subresource"})
     * @Assert\DateTime(message="La date doit être au format  YYYY-MM-DD")
     */
    private $closed_at;

    /**
     * @ORM\Column(type="float")
     * @Groups({"ads_read","advertisers_read","ads_subresource"})
     * @Assert\Type(type="numeric", message="Le montant doit être numéric")
     */
    private $monthlyprice;

    /**
     * @ORM\Column(type="float")
     * @Groups({"ads_read","advertisers_read","ads_subresource"})
     * @Assert\Type(type="numeric", message="Le montant doit être numéric")
     */
    private $dailyprice;

    /**
     * @ORM\Column(type="float")
     * @Groups({"ads_read","advertisers_read","ads_subresource"})
     * @Assert\Type(type="numeric", message="Le montant doit être numéric")
     */
    private $annualprice;

    /**
     * @ORM\Column(type="float")
     * @Groups({"ads_read","advertisers_read","ads_subresource"})
     * @Assert\Type(type="numeric", message="Le montant doit être numéric")
     */
    private $sellingprice;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"ads_read","advertisers_read","ads_subresource"})
     * @Assert\NotBlank(message="Le pays doit être renseigné")
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"ads_read","advertisers_read","ads_subresource"})
     * @Assert\NotBlank(message="La ville doit être renseigné")
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"ads_read","advertisers_read","ads_subresource"})
     * @Assert\NotBlank(message="Le téléphone doit être renseigné")
     */
    private $phone;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Advertiser", inversedBy="ads")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"ads_read"})
     */
    private $advertisers;

    /**
     * @ORM\Column(type="integer")
     */
    private $chrono;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"ads_read","advertisers_read","ads_subresource"})
     * @Assert\NotBlank(message="Renseignez la nature de votre annonce: Vente, Location ou Payer")
     * @Assert\Choice(choices={"VENTE","LOCATION","BESOIN","PAYER"})
     */
    private $statu;

    /**
     * Ad constructor.
     */
//    public function __construct()
//    {
//
//        $this->created_at = new \DateTime();
//        $this->opened_at = new \DateTime();
//        $this->closed_at = new \DateTime();
//    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

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

    public function getCategories(): ?Category
    {
        return $this->categories;
    }

    public function setCategories(?Category $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    public function getOpenedAt(): ?\DateTimeInterface
    {
        return $this->opened_at;
    }

    public function setOpenedAt(\DateTimeInterface $opened_at): self
    {
        $this->opened_at = $opened_at;

        return $this;
    }

    public function getClosedAt(): ?\DateTimeInterface
    {
        return $this->closed_at;
    }

    public function setClosedAt(\DateTimeInterface $closed_at): self
    {
        $this->closed_at = $closed_at;

        return $this;
    }

    public function getMonthlyprice(): ?float
    {
        return $this->monthlyprice;
    }

    public function setMonthlyprice(float $monthlyprice): self
    {
        $this->monthlyprice = $monthlyprice;

        return $this;
    }

    public function getDailyprice(): ?float
    {
        return $this->dailyprice;
    }

    public function setDailyprice(float $dailyprice): self
    {
        $this->dailyprice = $dailyprice;

        return $this;
    }

    public function getAnnualprice(): ?float
    {
        return $this->annualprice;
    }

    public function setAnnualprice(float $annualprice): self
    {
        $this->annualprice = $annualprice;

        return $this;
    }

    public function getSellingprice(): ?float
    {
        return $this->sellingprice;
    }

    public function setSellingprice(float $sellingprice): self
    {
        $this->sellingprice = $sellingprice;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getAdvertisers(): ?Advertiser
    {
        return $this->advertisers;
    }

    public function setAdvertisers(?Advertiser $advertisers): self
    {
        $this->advertisers = $advertisers;

        return $this;
    }

    public function getChrono(): ?int
    {
        return $this->chrono;
    }

    public function setChrono(int $chrono): self
    {
        $this->chrono = $chrono;

        return $this;
    }

    public function getStatu(): ?string
    {
        return $this->statu;
    }

    public function setStatu(string $statu): self
    {
        $this->statu = $statu;

        return $this;
    }
}
