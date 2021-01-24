<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

interface OwnerEntityInterface
{
    public function setOwner(UserInterface $user): OwnerEntityInterface;
}
