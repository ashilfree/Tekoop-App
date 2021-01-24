<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use App\Form\ImageType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class PostCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Post::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('title'),
	        MoneyField::new('price')->setCurrency('USD'),
	        TextEditorField::new('description', 'Content')->onlyOnForms()->setFormType(CKEditorType::class),
			CollectionField::new('pictures')->setEntryType('App\Form\ImageType')->setFormTypeOptions(['by_reference'=> false]),
	        DateTimeField::new('postedAt'),
	        AssociationField::new('category'),
	        AssociationField::new('owner'),
	        AssociationField::new('address'),
	        AssociationField::new('phone')
//	        CollectionField::new('colors')->setFormTypeOptions(['mapped' => false])->setEntryType('App\Form\ColorType')
        ];
    }

}
