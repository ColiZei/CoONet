<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserDataRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"userdata:read"}},
 *     denormalizationContext={"groups"={"userdata:write"}}
 * )
 * @ORM\Entity(repositoryClass=UserDataRepository::class)
 */
class UserData
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"userdata:read", "userdata:write"})
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"userdata:read", "userdata:write"})
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"userdata:read", "userdata:write"})
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, columnDefinition="enum('male', 'female', 'diverse')")
     * @Groups({"userdata:read", "userdata:write"})
     */
    private $gender;

    /**
     * @ORM\Column(type="date")
     * @Groups({"userdata:read", "userdata:write"})
     */
    private $dayOfBirth;

    /**
     * @ORM\Column(type="datetime")
     */
    private $registered;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"userdata:read", "userdata:write"})
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"userdata:read", "userdata:write"})
     */
    private $country;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="userData", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"userdata:read", "userdata:write"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

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

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getDayOfBirth(): ?\DateTimeInterface
    {
        return $this->dayOfBirth;
    }

    public function setDayOfBirth(\DateTimeInterface $dayOfBirth): self
    {
        $this->dayOfBirth = $dayOfBirth;

        return $this;
    }

    public function getRegistered(): ?\DateTimeInterface
    {
        return $this->registered;
    }

    public function setRegistered(\DateTimeInterface $registered): self
    {
        $this->registered = $registered;

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

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }


    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
