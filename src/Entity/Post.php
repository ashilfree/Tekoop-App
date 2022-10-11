<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\PostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 * @ApiResource(
 *     itemOperations={
 *          "get"={
 *             "normalization_context"={
 *                 "groups"={"get-blog-post-with-author"}
 *             }
 *     },
 *          "put"={"access_control"="is_granted('ROLE_POSTER') and object.getOwner() === user"},
 *      },
 *     collectionOperations={
 *          "get"={
 *             "normalization_context"={
 *                 "groups"={"get-posts"}
 *             }
 *     },
 *          "post"={
 *              "access_control"="is_granted('ROLE_POSTER')"
 *          }
 *      },
 *     denormalizationContext={
 *         "groups"={"post"}
 *     }
 * )
 */
class Post implements OwnerEntityInterface, PublishedDateEntityInterface
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 * @Groups({"get-blog-post-with-author", "get-posts"})
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Groups({"post", "get-blog-post-with-author", "get-posts"})
	 */
	private $title;

	/**
	 * @ORM\Column(type="float")
	 * @Groups({"post", "get-blog-post-with-author", "get-posts"})
	 */
	private $price;

	/**
	 * @ORM\Column(type="text", nullable=true)
	 * @Groups({"post", "get-blog-post-with-author", "get-posts"})
	 */
	private $description;

	/**
	 * @ORM\ManyToMany(targetEntity="Image")
	 * @ApiSubresource()
	 * @Groups({"post", "get-blog-post-with-author", "get-posts"})
	 */
	private $images;

	/**
	 * @ORM\Column(type="datetime")
	 */
	private $createdAt;

	/**
	 * @ORM\Column(type="datetime")
	 */
	private $updatedAt;

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 * @Groups({"get-blog-post-with-author", "get-posts"})
	 */
	private $publishedAt;

	/**
	 * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="posts")
	 * @ORM\JoinColumn(nullable=false)
	 * @ApiSubresource()
	 * @Groups({"post", "get-blog-post-with-author", "get-posts"})
	 */
	private $category;

	/**
	 * @ORM\ManyToOne(targetEntity=User::class, inversedBy="posts")
	 * @ApiSubresource()
	 * @Groups({"get-blog-post-with-author", "get-posts"})
	 */
	private $owner;

	/**
	 * @ORM\ManyToOne(targetEntity=Address::class)
	 * @ORM\JoinColumn(nullable=false)
	 * @ApiSubresource()
	 * @Groups({"post", "get-blog-post-with-author", "get-posts"})
	 */
	private $address;

	/**
	 * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="post")
	 * @ApiSubresource()
	 * @Groups({"get-blog-post-with-author"})
	 */
	private $comments;

	/**
	 * @ORM\Column(type="boolean")
	 * @Groups({"get-blog-post-with-author", "get-posts"})
	 */
	private $negotiable = false;

	/**
	 * @ORM\Column(type="smallint")
	 * @Groups({"get-blog-post-with-author", "get-posts"})
	 */
	private $status = 0;

	public function __construct()
	{
		$this->createdAt = new \DateTime();
		$this->updatedAt = new \DateTime();
		$this->comments = new ArrayCollection();
		$this->images = new ArrayCollection();
	}

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

	public function getPrice(): ?float
	{
		return $this->price;
	}

	public function setPrice(float $price): self
	{
		$this->price = $price;

		return $this;
	}

	public function getDescription(): ?string
	{
		return $this->description;
	}

	public function setDescription(?string $description): self
	{
		$this->description = $description;

		return $this;
	}


	public function getImages(): Collection
	{
		return $this->images;
	}

	public function addImage(Image $image)
	{
		$this->images->add($image);
	}

	public function removeImage(Image $image)
	{
		$this->images->removeElement($image);
	}


	public function getCreatedAt(): ?\DateTimeInterface
	{
		return $this->createdAt;
	}

	public function setCreatedAt(\DateTimeInterface $createdAt): self
	{
		$this->createdAt = $createdAt;

		return $this;
	}

	public function getUpdatedAt(): ?\DateTimeInterface
	{
		return $this->updatedAt;
	}

	public function setUpdatedAt(\DateTimeInterface $updatedAt): self
	{
		$this->updatedAt = $updatedAt;

		return $this;
	}

	public function getPublishedAt(): ?\DateTimeInterface
	{
		return $this->publishedAt;
	}

	public function setPublishedAt(\DateTimeInterface $publishedAt): PublishedDateEntityInterface
	{
		$this->publishedAt = $publishedAt;

		return $this;
	}

	public function getCategory(): ?Category
	{
		return $this->category;
	}

	public function setCategory(Category $category):Post
	{
		$this->category = $category;

		return $this;
	}

	public function getOwner(): ?User
	{
		return $this->owner;
	}

	public function setOwner(?UserInterface $owner): OwnerEntityInterface
	{
		$this->owner = $owner;

		return $this;
	}

	public function getAddress(): ?Address
	{
		return $this->address;
	}

	public function setAddress(?Address $address): self
	{
		$this->address = $address;

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
			$comment->setPost($this);
		}

		return $this;
	}

	public function removeComment(Comment $comment): self
	{
		if ($this->comments->removeElement($comment)) {
			// set the owning side to null (unless already changed)
			if ($comment->getPost() === $this) {
				$comment->setPost(null);
			}
		}

		return $this;
	}

	public function getNegotiable(): ?bool
	{
		return $this->negotiable;
	}

	public function setNegotiable(bool $negotiable): self
	{
		$this->negotiable = $negotiable;

		return $this;
	}

	public function getStatus(): ?int
	{
		return $this->status;
	}

	public function setStatus(int $status): self
	{
		$this->status = $status;

		return $this;
	}
}
