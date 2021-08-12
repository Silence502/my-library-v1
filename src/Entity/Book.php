<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $originalTitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $frenchTitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $romajiTitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $kanaTitle;

    /**
     * @ORM\ManyToOne(targetEntity=Author::class, inversedBy="books")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @ORM\ManyToMany(targetEntity=Illustrator::class, inversedBy="books")
     */
    private $illustrator;

    /**
     * @ORM\ManyToOne(targetEntity=Publisher::class, inversedBy="books")
     * @ORM\JoinColumn(nullable=false)
     */
    private $publisher;

    /**
     * @ORM\ManyToOne(targetEntity=Serie::class, inversedBy="books")
     */
    private $serie;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tome;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPages;

    /**
     * @ORM\ManyToMany(targetEntity=Genre::class, inversedBy="books")
     */
    private $genre;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="books")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $isbn;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="integer", length=4)
     */
    private $releaseDate;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $country;

    /**
     * @ORM\Column(type="text")
     */
    private $summary;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPublished;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="book")
     */
    private $comment;

    /**
     * @ORM\OneToMany(targetEntity=BookWished::class, mappedBy="book")
     */
    private $wishedBy;

    /**
     * @ORM\OneToMany(targetEntity=BookReading::class, mappedBy="book")
     */
    private $readingBy;

    /**
     * @ORM\OneToMany(targetEntity=BookReaded::class, mappedBy="book")
     */
    private $readedBy;

    public function __construct()
    {
        $this->illustrator = new ArrayCollection();
        $this->genre = new ArrayCollection();
        $this->comment = new ArrayCollection();
        $this->wishedBy = new ArrayCollection();
        $this->readingBy = new ArrayCollection();
        $this->readedBy = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOriginalTitle(): ?string
    {
        return $this->originalTitle;
    }

    public function setOriginalTitle(string $originalTitle): self
    {
        $this->originalTitle = $originalTitle;

        return $this;
    }

    public function getFrenchTitle(): ?string
    {
        return $this->frenchTitle;
    }

    public function setFrenchTitle(?string $frenchTitle): self
    {
        $this->frenchTitle = $frenchTitle;

        return $this;
    }

    public function getRomajiTitle(): ?string
    {
        return $this->romajiTitle;
    }

    public function setRomajiTitle(?string $romajiTitle): self
    {
        $this->romajiTitle = $romajiTitle;

        return $this;
    }

    public function getKanaTitle(): ?string
    {
        return $this->kanaTitle;
    }

    public function setKanaTitle(?string $kanaTitle): self
    {
        $this->kanaTitle = $kanaTitle;

        return $this;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return Collection|Illustrator[]
     */
    public function getIllustrator(): Collection
    {
        return $this->illustrator;
    }

    public function addIllustrator(Illustrator $illustrator): self
    {
        if (!$this->illustrator->contains($illustrator)) {
            $this->illustrator[] = $illustrator;
        }

        return $this;
    }

    public function removeIllustrator(Illustrator $illustrator): self
    {
        $this->illustrator->removeElement($illustrator);

        return $this;
    }

    public function getPublisher(): ?Publisher
    {
        return $this->publisher;
    }

    public function setPublisher(?Publisher $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }

    public function getSerie(): ?Serie
    {
        return $this->serie;
    }

    public function setSerie(?Serie $serie): self
    {
        $this->serie = $serie;

        return $this;
    }

    public function getTome(): ?int
    {
        return $this->tome;
    }

    public function setTome(?int $tome): self
    {
        $this->tome = $tome;

        return $this;
    }

    public function getNbPages(): ?int
    {
        return $this->nbPages;
    }

    public function setNbPages(int $nbPages): self
    {
        $this->nbPages = $nbPages;

        return $this;
    }

    /**
     * @return Collection|Genre[]
     */
    public function getGenre(): Collection
    {
        return $this->genre;
    }

    public function addGenre(Genre $genre): self
    {
        if (!$this->genre->contains($genre)) {
            $this->genre[] = $genre;
        }

        return $this;
    }

    public function removeGenre(Genre $genre): self
    {
        $this->genre->removeElement($genre);

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getReleaseDate(): int
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(int $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

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

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComment(): Collection
    {
        return $this->comment;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comment->contains($comment)) {
            $this->comment[] = $comment;
            $comment->setBook($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comment->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getBook() === $this) {
                $comment->setBook(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BookWished[]
     */
    public function getWishedBy(): Collection
    {
        return $this->wishedBy;
    }

    public function addWishedBy(BookWished $wishedBy): self
    {
        if (!$this->wishedBy->contains($wishedBy)) {
            $this->wishedBy[] = $wishedBy;
            $wishedBy->setBook($this);
        }

        return $this;
    }

    public function removeWishedBy(BookWished $wishedBy): self
    {
        if ($this->wishedBy->removeElement($wishedBy)) {
            // set the owning side to null (unless already changed)
            if ($wishedBy->getBook() === $this) {
                $wishedBy->setBook(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BookReading[]
     */
    public function getReadingBy(): Collection
    {
        return $this->readingBy;
    }

    public function addReadingBy(BookReading $readingBy): self
    {
        if (!$this->readingBy->contains($readingBy)) {
            $this->readingBy[] = $readingBy;
            $readingBy->setBook($this);
        }

        return $this;
    }

    public function removeReadingBy(BookReading $readingBy): self
    {
        if ($this->readingBy->removeElement($readingBy)) {
            // set the owning side to null (unless already changed)
            if ($readingBy->getBook() === $this) {
                $readingBy->setBook(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BookReaded[]
     */
    public function getReadedBy(): Collection
    {
        return $this->readedBy;
    }

    public function addReadedBy(BookReaded $readedBy): self
    {
        if (!$this->readedBy->contains($readedBy)) {
            $this->readedBy[] = $readedBy;
            $readedBy->setBook($this);
        }

        return $this;
    }

    public function removeReadedBy(BookReaded $readedBy): self
    {
        if ($this->readedBy->removeElement($readedBy)) {
            // set the owning side to null (unless already changed)
            if ($readedBy->getBook() === $this) {
                $readedBy->setBook(null);
            }
        }

        return $this;
    }
}
