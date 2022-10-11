<?php

namespace App\Entity;

interface PublishedDateEntityInterface
{
    public function setPublishedAt(\DateTimeInterface $published): PublishedDateEntityInterface;
}
