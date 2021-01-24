<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     itemOperations={
 *          "get",
 *          "put"={
 *              "access_control"="is_granted('ROLE_COMMENTATOR') and object.getAuthor() === user"
 *          },
 *      },
 *     collectionOperations={
 *          "get",
 *          "post"={
 *              "access_control"="is_granted('ROLE_COMMENTATOR')",
 *                 "normalization_context"={
 *                      "groups"={
 *                          "get-comment-with-author"
 *                       }
 *                  }
 *           }
 *      },
 *      denormalizationContext={
 *         "groups"={"post"}
 *     }
 * )
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment implements OwnerEntityInterface, PublishedDateEntityInterface
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 * @Groups({"get-comment-with-author", "get-blog-post-with-author"})
	 */
	private $id;

	/**
	 * @ORM\Column(type="text")
	 * @Groups({"post", "get-comment-with-author", "get-blog-post-with-author"})
	 * @Assert\NotBlank()
	 * @Assert\Length(min=5, max=3000)
	 */
	private $content;

	/**
	 * @ORM\Column(type="datetime")
	 * @Groups({"get-comment-with-author", "get-blog-post-with-author"})
	 */
	private $publishedAt;

	/**
	 * @ORM\ManyToOne(targetEntity=User::class, inversedBy="post")
	 * @ORM\JoinColumn(nullable=false)
	 * @Groups({"get-comment-with-author"})
	 */
	private $owner;

	/**
	 * @ORM\ManyToOne(targetEntity=Post::class, inversedBy="comments")
	 * @ORM\JoinColumn(nullable=false)
	 * @Groups({"post", "get-comment-with-author"})
	 */
	private $post;

	public function getId(): ?int
	{
		return $this->id;
	}

	public function getContent(): ?string
	{
		return $this->content;
	}

	public function setContent(string $content): self
	{
		$this->content = $content;

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

	public function getOwner(): ?User
	{
		return $this->owner;
	}

	/**
	 * @param UserInterface $owner
	 * @return OwnerEntityInterface
	 */
	public function setOwner(?UserInterface $owner): OwnerEntityInterface
	{
		$this->owner = $owner;

		return $this;
	}

	public function getPost(): ?Post
	{
		return $this->post;
	}

	public function setPost(?Post $post): self
	{
		$this->post = $post;

		return $this;
	}
}
