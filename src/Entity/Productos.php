<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Productos
 *
 * @ORM\Table(name="productos", indexes={@ORM\Index(name="IDX_767490E63397707A", columns={"categoria_id"})})
 * @ORM\Entity
 */
class Productos
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=50, nullable=false)
     */
    private $img;

    /**
     * @var string|null
     *
     * @ORM\Column(name="mensaje", type="string", length=50, nullable=true)
     */
    private $mensaje;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=150, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="title2", type="string", length=50, nullable=false)
     */
    private $title2;

    /**
     * 
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=50, nullable=false)
     */
    private $comments;

    /**
     * @var string
     *
     * @ORM\Column(name="createby", type="string", length=50, nullable=false)
     */
    private $createby;

    /**
     * @ORM\ManyToOne(targetEntity=Categoria::class, inversedBy="productos")
     */
    private $categoria;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getMensaje(): ?string
    {
        return $this->mensaje;
    }

    public function setMensaje(?string $mensaje): self
    {
        $this->mensaje = $mensaje;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTitle2(): ?string
    {
        return $this->title2;
    }

    public function setTitle2(string $title2): self
    {
        $this->title2 = $title2;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }

    public function getCreateby(): ?string
    {
        return $this->createby;
    }

    public function setCreateby(string $createby): self
    {
        $this->createby = $createby;

        return $this;
    }

    public function getCategoria(): ?categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?categoria $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }



}
