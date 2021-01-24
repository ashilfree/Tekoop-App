<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Controller\UploadImageAction;
/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 * @Vich\Uploadable()
 * @ApiResource(
 *     collectionOperations={
 *         "get",
 *         "post"={
 *             "access_control"="is_granted('ROLE_POSTER')",
 *             "method"="POST",
 *             "path"="/images",
 *             "controller"=UploadImageAction::class,
 *             "defaults"={"_api_receive"=false}
 *         }
 *     },
 * )
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"get-posts", "get-categories", "get-blog-post-with-author"})
     */
    private $id;

    /**
     * @ORM\Column(nullable=true)
     * @Groups({"get-categories", "get-blog-post-with-author", "get-posts"})
     */
    private $url;

    /**
     * @Assert\NotNull()
     * @Vich\UploadableField(mapping="images", fileNameProperty="url")
     */
    private $file;

    public function getId(): ?int
    {
        return $this->id;
    }

	public function getFile()
	{
		return $this->file;
	}

	public function setFile($file): void
	{
		$this->file = $file;
	}

	public function getUrl()
	{
		return '/images/' . $this->url;
	}

	public function setUrl($url): void
	{
		$this->url = $url;
	}

}
