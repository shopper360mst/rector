<?php

namespace App\Entity;

use App\Repository\ClientsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientsRepository::class)]
class Clients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 1024, unique: true)]
    private $clt_name;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $clt_email;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $clt_telno;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $clt_registration_no;

    #[ORM\Column(type: 'string', length: 2048, nullable: true)]
    private $clt_addr;

    #[ORM\Column(type: 'string', length: 64)]
    private $clt_org;

    #[ORM\Column(type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private $clt_created_date;

    #[ORM\Column(type: 'integer')]
    private $clt_created_by;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $clt_updated_date;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $clt_updated_by;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCltName(): ?string
    {
        return $this->clt_name;
    }

    public function setCltName(string $clt_name): self
    {
        $this->clt_name = $clt_name;

        return $this;
    }

    public function getCltEmail(): ?string
    {
        return $this->clt_email;
    }

    public function setCltEmail(?string $clt_email): self
    {
        $this->clt_email = $clt_email;

        return $this;
    }

    public function getCltTelno(): ?string
    {
        return $this->clt_telno;
    }

    public function setCltTelno(?string $clt_telno): self
    {
        $this->clt_telno = $clt_telno;

        return $this;
    }

    public function getCltRegistrationNo(): ?string
    {
        return $this->clt_registration_no;
    }

    public function setCltRegistrationNo(?string $clt_registration_no): self
    {
        $this->clt_registration_no = $clt_registration_no;

        return $this;
    }

    public function getCltAddr(): ?string
    {
        return $this->clt_addr;
    }

    public function setCltAddr(?string $clt_addr): self
    {
        $this->clt_addr = $clt_addr;

        return $this;
    }

    public function getCltOrg(): ?string
    {
        return $this->clt_org;
    }

    public function setCltOrg(string $clt_org): self
    {
        $this->clt_org = $clt_org;

        return $this;
    }

    public function getCltCreatedDate(): ?\DateTimeInterface
    {
        return $this->clt_created_date;
    }

    public function setCltCreatedDate(\DateTimeInterface $clt_created_date): self
    {
        $this->clt_created_date = $clt_created_date;

        return $this;
    }

    public function getCltCreatedBy(): ?int
    {
        return $this->clt_created_by;
    }

    public function setCltCreatedBy(int $clt_created_by): self
    {
        $this->clt_created_by = $clt_created_by;

        return $this;
    }

    public function getCltUpdatedDate(): ?\DateTimeInterface
    {
        return $this->clt_updated_date;
    }

    public function setCltUpdatedDate(?\DateTimeInterface $clt_updated_date): self
    {
        $this->clt_updated_date = $clt_updated_date;

        return $this;
    }

    public function getCltUpdatedBy(): ?int
    {
        return $this->clt_updated_by;
    }

    public function setCltUpdatedBy(?int $clt_updated_by): self
    {
        $this->clt_updated_by = $clt_updated_by;

        return $this;
    }
}
