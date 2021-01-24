<?php

namespace App\Controller\Admin;


use App\Entity\Category;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Orm\EntityRepository;
use EasyCorp\Bundle\EasyAdminBundle\Provider\AdminContextProvider;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CategoryCrudController extends AbstractCrudController
{

	/**
	 * @var CrudUrlGenerator
	 */
	private $crudUrlGenerator;
	/**
	 * @var AdminContextProvider
	 */
	private $adminContextProvider;

	public function __construct(CrudUrlGenerator $crudUrlGenerator, AdminContextProvider $adminContextProvider)
	{
		$this->crudUrlGenerator = $crudUrlGenerator;
		$this->adminContextProvider = $adminContextProvider;
	}

	public static function getEntityFqcn(): string
	{
		return Category::class;
	}


	public function configureActions(Actions $actions): Actions
	{
		$subCategory = Action::new('subCategory', 'Sub Category')->linkToCrudAction('subCategory')->addCssClass('badge badge-secondary p-3');
		$updateDelivery = Action::new('updateDelivery', 'Delivery', 'fa fa-truck')->linkToCrudAction('updateDelivery');
		return $actions
			->add('index', $subCategory)
			->update('index', Action::NEW, function (Action $action) {
				return $action->setIcon('fa fa-file-alt')->setLabel(false);
			});
	}

	public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
	{
		parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);
		$response = $this->get(EntityRepository::class)->createQueryBuilder($searchDto, $entityDto, $fields, $filters);

		if (!$entityDto->getInstance())
			$response->where('entity.parent is null');
		else {
			$response->where('entity.parent = :entity');
			$response->setParameter('entity', $entityDto->getInstance());
		}
		return $response;
	}

	public function createEntity(string $entityFqcn)
	{
		$category = new Category();
		$category->setParent($this->adminContextProvider->getContext()->getEntity()->getInstance());
		return $category;
	}


	public function subCategory(AdminContext $context)
	{
		if ($context->getEntity()->getInstance()) {
			$url = $this->crudUrlGenerator->build()
				->setController(CategoryCrudController::class)
				->setAction('index')
				->generateUrl();
			return $this->redirect($url);
		}
	}

	public function updateDelivery(AdminContext $context)
	{

	}

	public function configureFields(string $pageName): iterable
	{
		//dd(CollectionField::new('image')->setEntryType('App\Form\ImageType'));
		return [

			IdField::new('id')->onlyOnIndex(),
			TextField::new('nameEN'),
			FormField::addPanel(),
			TextField::new('nameFr'),
			TextField::new('nameAr'),
//			AssociationField::new('image')->onlyOnIndex(),
			BooleanField::new('status'),
			ImageField::new('imageFile')->onlyOnForms(),
			FormField::addPanel('Contact information')
				->setIcon('phone')->addCssClass('optional')
				->setHelp('Phone number is preferred'),
		];
	}

}
