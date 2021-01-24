<?php

namespace App\Controller\Admin;

use App\Entity\PostModality;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PostModalityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PostModality::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
