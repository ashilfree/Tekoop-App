<?php

namespace App\Controller\Admin;

use App\Entity\Page;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use FOS\CKEditorBundle\Form\Type\CKEditorType;

class PageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Page::class;
    }
	public function configureCrud(Crud $crud): Crud
	{
		return $crud
			->addFormTheme('@FOSCKEditor/Form/ckeditor_widget.html.twig')
			;
	}

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->onlyOnIndex(),
            TextField::new('titleEn', 'Title'),
            TextField::new('titleFr', 'Titre'),
            TextField::new('titleAr', 'عنوان'),
            TextEditorField::new('contentEn', 'Content')->onlyOnForms()->setFormType(CKEditorType::class),
            TextEditorField::new('contentFr', 'Contenu')->onlyOnForms()->setFormType(CKEditorType::class),
            TextEditorField::new('contentAr', 'المحتوى')->onlyOnForms()->setFormType(CKEditorType::class),
        ];
    }

}
