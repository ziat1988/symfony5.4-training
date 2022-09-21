<?php

namespace App\Entity;

use App\Repository\CityRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Index;

/**
 * @ORM\Entity(repositoryClass=CityRepository::class)
 * @Table(indexes={@Index(name="search_city_by_insee", columns={"insee_code"})})
 */
class City
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="insee_code", type="string", length=255)
     */
    private $inseeCode;

    /**
     * @ORM\Column(type="text")
     */
    private $cityCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $zipCode;

    /**
     * @ORM\Column(type="text")
     */
    private $label;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $latitude;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $longitude;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $departmentName;

    /**
     * @ORM\Column(type="text")
     */
    private $regionName;

    /**
     * @ORM\Column(type="text")
     */
    private $regionGeoJsonName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $departmentNumber;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInseeCode(): ?string
    {
        return $this->inseeCode;
    }

    public function setInseeCode(string $inseeCode): self
    {
        $this->inseeCode = $inseeCode;

        return $this;
    }

    public function getCityCode(): ?string
    {
        return $this->cityCode;
    }

    public function setCityCode(string $cityCode): self
    {
        $this->cityCode = $cityCode;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getDepartmentName(): ?string
    {
        return $this->departmentName;
    }

    public function setDepartmentName(string $departmentName): self
    {
        $this->departmentName = $departmentName;

        return $this;
    }

    public function getRegionName(): ?string
    {
        return $this->regionName;
    }

    public function setRegionName(string $regionName): self
    {
        $this->regionName = $regionName;

        return $this;
    }

    public function getRegionGeoJsonName(): ?string
    {
        return $this->regionGeoJsonName;
    }

    public function setRegionGeoJsonName(string $regionGeoJsonName): self
    {
        $this->regionGeoJsonName = $regionGeoJsonName;

        return $this;
    }

    public function getDepartmentNumber(): ?string
    {
        return $this->departmentNumber;
    }

    public function setDepartmentNumber(string $departmentNumber): self
    {
        $this->departmentNumber = $departmentNumber;

        return $this;
    }
}
