<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 * @Vich\Uploadable
 * @ApiResource(
 *     collectionOperations={
 *          "get"={
 *              "normalization_context"={
 *                  "groups"={"get-categories"}
 *     }
 *     }
 *     }
 * )
 */
class Category
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 * @Groups({"get-categories", "get-posts", "get-blog-post-with-author"})
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Groups({"get-categories", "get-posts", "get-blog-post-with-author"})
	 */
	private $nameEn;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Groups("get-categories")
	 */
	private $nameFr;

	/**
	 * @ORM\Column(type="string", length=255)
	 * @Groups("get-categories")
	 */
	private $nameAr;

	/**
	 * @ORM\OneToOne(targetEntity="Image", cascade={"persist", "remove"})
	 * @ApiSubresource()
	 * @Groups("get-categories")
	 */
	private $image;

	/**
	 * @Vich\UploadableField(mapping="images")
	 */
	private $imageFile;
	/**
	 * @ORM\Column(type="datetime")
	 */
	private $createdAt;

	/**
	 * @ORM\Column(type="datetime")
	 */
	private $updatedAt;

	/**
	 * @ORM\Column(type="boolean")
	 */
	private $status;

	/**
	 * @ORM\OneToMany(targetEntity=Post::class, mappedBy="category")
	 */
	private $posts;

	/**
	 * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="categories")
	 */
	private $parent;

	/**
	 * @ORM\OneToMany(targetEntity=Category::class, mappedBy="parent")
	 */
	private $categories;

	public function __construct()
	{
		$this->createdAt = new \DateTime();
		$this->updatedAt = new \DateTime();
		$this->posts = new ArrayCollection();
		$this->categories = new ArrayCollection();
	}

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getNameEn(): ?string
	{
		return $this->nameEn;
	}

	public function setNameEn(string $nameEn): self
	{
		$this->nameEn = $nameEn;

		return $this;
	}

	public function getNameFr(): ?string
	{
		return $this->nameFr;
	}

	public function setNameFr(string $nameFr): self
	{
		$this->nameFr = $nameFr;

		return $this;
	}

	public function getNameAr(): ?string
	{
		return $this->nameAr;
	}

	public function setNameAr(string $nameAr): self
	{
		$this->nameAr = $nameAr;

		return $this;
	}

	public function getImage()
	{
		return $this->image;
	}

	public function setImage(Image $image)
	{
		$this->image = $image;
	}
	
	public function getImageFile()
	{
		return $this->imageFile;
	}
	
	public function setImageFile($imageFile): void
	{
		$image = new Image();
		$image->setFile($imageFile);
		$this->setImage($image);
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

	public function getStatus(): ?bool
	{
		return $this->status;
	}

	public function setStatus(bool $status): self
	{
		$this->status = $status;

		return $this;
	}

	/**
	 * @return Collection|Post[]
	 */
	public function getPosts(): Collection
	{
		return $this->posts;
	}

	public function addPost(Post $post): self
	{
		if (!$this->posts->contains($post)) {
			$this->posts[] = $post;
			$post->setCategory($this);
		}

		return $this;
	}

	public function removePost(Post $post): self
	{
		if ($this->posts->removeElement($post)) {
			// set the owning side to null (unless already changed)
			if ($post->getCategory() === $this) {
				$post->setCategory(null);
			}
		}

		return $this;
	}

	public function getParent(): ?self
	{
		return $this->parent;
	}

	public function setParent(?self $parent): self
	{
		$this->parent = $parent;

		return $this;
	}

	/**
	 * @return Collection|self[]
	 */
	public function getCategories(): Collection
	{
		return $this->categories;
	}

	public function addCategory(self $category): self
	{
		if (!$this->categories->contains($category)) {
			$this->categories[] = $category;
			$category->setParent($this);
		}

		return $this;
	}

	public function removeCategory(self $category): self
	{
		if ($this->categories->removeElement($category)) {
			// set the owning side to null (unless already changed)
			if ($category->getParent() === $this) {
				$category->setParent(null);
			}
		}

		return $this;
	}
}
