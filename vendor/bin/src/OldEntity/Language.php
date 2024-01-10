<?php

namespace App\Entity;

use App\Repository\LanguageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LanguageRepository::class)]
class Language
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $lg_name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLgName(): ?string
    {
        return $this->lg_name;
    }

    public function setLgName(string $lg_name): self
    {
        $this->lg_name = $lg_name;

        return $this;
    }
}
