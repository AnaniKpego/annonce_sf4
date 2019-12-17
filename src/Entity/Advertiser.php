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

//"pagination_items_per_page"=500

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdvertiserRepository")
 * @UniqueEntity("email", message="Cette adresse email exite déja")
 * @ApiFilter(SearchFilter::class, properties={"firstname":"partial", "lastname":"partial"})
 * @ApiResource(
 *     attributes={
 *          "pagination_enabled"=true,
 *          "pagination_items_per_page"=1000
 *    
 *          
 *     },
 *     normalizationContext={
 *          "groups"={"advertisers_read"}
 *     },
 *     collectionOperations={"GET","POST"},
 *     itemOperations={"GET","PUT","DELETE"},
 *     subresourceOperations={
 *          "ads_get_subresource"={"path"="/advertisers/{id}/ads"},
 *          "api_users_advertisers_get_subresource"={"groups"={"advertisers_subresource"}}
 *     }
 *
 *
 *
 *
 * )
 */
class Advertiser implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"advertisers_read","ads_read","advertisers_subresource","users_reads"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"advertisers_read","ads_read","advertisers_subresource","users_reads"})
     * @Assert\NotBlank(message="Veuillez renseigner votre adresse email")
     * @Assert\Email(message="Votre adresse mail n'est pas valide")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="renseignez votre mot de passe")
     * @Assert\Length(min=8, minMessage="Le mot de passe doit contenir au moin 8 caractères",
     * max=255, maxMessage="Le mot de passe doit contenir au moin 8 caractères")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"advertisers_read","ads_read","advertisers_subresource","users_reads"})
     * @Assert\NotBlank(message="Le nom de l'annonceur est obligatoire")
     * @Assert\Length(min=2, minMessage="le nom doit être compris entre 2 et 255 caractères",
     * max=255, maxMessage="le nom doit être compris entre 2 et 255 caractères")
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"advertisers_read","ads_read","advertisers_subresource","users_reads"})
     * @Assert\NotBlank(message="Le prenom de l'annonceur est obligatoire")
     * @Assert\Length(min=2, minMessage="le prenom doit être compris entre 2 et 255 caractères",
     * max=255, maxMessage="le prenom doit être compris entre 2 et 255 caractères")
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"advertisers_read","ads_read","advertisers_subresource","users_reads"})
     * @Assert\NotBlank(message="Le nom du pays est obligatoire")
     * @Assert\Length(min=2, minMessage="le nom du pays être compris entre 2 et 255 caractères",
     * max=255, maxMessage="le nom du pays doit être compris entre 2 et 255 caractères")
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"advertisers_read","ads_read","advertisers_subresource","users_reads"})
     * @Assert\NotBlank(message="Veuillez renseigner le nom de la ville")
     * @Assert\Length(min=2, minMessage="le nom de la ville être compris entre 2 et 255 caractères",
     * max=255, maxMessage="le nom de la ville doit être compris entre 2 et 255 caractères")
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Category", mappedBy="advertisers")
     * @Groups({"advertisers_read"})
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ad", mappedBy="advertisers")
     * @Groups({"advertisers_read"})
     * @ApiSubresource
     */
    private $ads;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\DateTime(message="La date doit être au format  YYYY-MM-DD")
     */
    private $created_at;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"advertisers_read","ads_read","advertisers_subresource","users_reads"})
     * @Assert\NotBlank(message="Veuillez renseigner votre numero de téléphone")
     */
    private $phone;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="adevrtisers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->ads = new ArrayCollection();
        $this->created_at = new \DateTime('now');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

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

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setAdvertisers($this);
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
            // set the owning side to null (unless already changed)
            if ($category->getAdvertisers() === $this) {
                $category->setAdvertisers(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Ad[]
     */
    public function getAds(): Collection
    {
        return $this->ads;
    }

    public function addAd(Ad $ad): self
    {
        if (!$this->ads->contains($ad)) {
            $this->ads[] = $ad;
            $ad->setAdvertisers($this);
        }

        return $this;
    }

    public function removeAd(Ad $ad): self
    {
        if ($this->ads->contains($ad)) {
            $this->ads->removeElement($ad);
            // set the owning side to null (unless already changed)
            if ($ad->getAdvertisers() === $this) {
                $ad->setAdvertisers(null);
            }
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at): self
    {
        $this->created_at = $created_at;

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

    /**
     * Returns the roles granted to the user.
     *
     *     public function getRoles()
     *     {
     *         return ['ROLE_USER'];
     *     }
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return array('ROLE_USER');
    }


    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
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
