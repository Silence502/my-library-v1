<?php

namespace App\Entity;

use App\Repository\MemberRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=MemberRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class Member implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $nickname;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="author")
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity=BookWished::class, mappedBy="member")
     */
    private $booksWished;

    /**
     * @ORM\OneToMany(targetEntity=BookReading::class, mappedBy="member")
     */
    private $booksReading;

    /**
     * @ORM\OneToMany(targetEntity=BookReaded::class, mappedBy="member")
     */
    private $booksReaded;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->booksWished = new ArrayCollection();
        $this->booksReading = new ArrayCollection();
        $this->booksReaded = new ArrayCollection();
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setAuthor($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getAuthor() === $this) {
                $comment->setAuthor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BookWished[]
     */
    public function getBooksWished(): Collection
    {
        return $this->booksWished;
    }

    public function addBooksWished(BookWished $booksWished): self
    {
        if (!$this->booksWished->contains($booksWished)) {
            $this->booksWished[] = $booksWished;
            $booksWished->setMember($this);
        }

        return $this;
    }

    public function removeBooksWished(BookWished $booksWished): self
    {
        if ($this->booksWished->removeElement($booksWished)) {
            // set the owning side to null (unless already changed)
            if ($booksWished->getMember() === $this) {
                $booksWished->setMember(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BookReading[]
     */
    public function getBooksReading(): Collection
    {
        return $this->booksReading;
    }

    public function addBooksReading(BookReading $booksReading): self
    {
        if (!$this->booksReading->contains($booksReading)) {
            $this->booksReading[] = $booksReading;
            $booksReading->setMember($this);
        }

        return $this;
    }

    public function removeBooksReading(BookReading $booksReading): self
    {
        if ($this->booksReading->removeElement($booksReading)) {
            // set the owning side to null (unless already changed)
            if ($booksReading->getMember() === $this) {
                $booksReading->setMember(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BookReaded[]
     */
    public function getBooksReaded(): Collection
    {
        return $this->booksReaded;
    }

    public function addBooksReaded(BookReaded $booksReaded): self
    {
        if (!$this->booksReaded->contains($booksReaded)) {
            $this->booksReaded[] = $booksReaded;
            $booksReaded->setMember($this);
        }

        return $this;
    }

    public function removeBooksReaded(BookReaded $booksReaded): self
    {
        if ($this->booksReaded->removeElement($booksReaded)) {
            // set the owning side to null (unless already changed)
            if ($booksReaded->getMember() === $this) {
                $booksReaded->setMember(null);
            }
        }

        return $this;
    }
}
