<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Page;
use App\Entity\Post;
use App\Entity\PostModality;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Tekoop');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Category', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Pages', 'fas fa-scroll', Page::class);
        yield MenuItem::linkToCrud('Posts', 'fas fa-article', Post::class);
        yield MenuItem::linkToCrud('Post Modality', 'fas fa-post', PostModality::class);
        yield MenuItem::linkToCrud('User', 'fas fa-user', User::class);
        yield  MenuItem::linkToLogout('Logout', 'fa fa-sign-out');
    }
}
