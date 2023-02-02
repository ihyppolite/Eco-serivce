<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Categorie;

use App\Entity\DetailEcoservices;

use App\Entity\Orders;
use App\Entity\Produit;
use App\Entity\Service;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class adminController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

        return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::subMenu('user', 'fa-solid fa-user')->setSubItems([
            MenuItem::linkToCrud('Crée une utilisateur ', 'fas fa-plus', User::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les utilisateur ', 'fas fa-eye', User::class)
        ]);

        yield MenuItem::subMenu('Service', 'fa-solid fa-server')->setSubItems([
            MenuItem::linkToCrud('Crée une Service ', 'fas fa-plus', Service::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les Service ', 'fas fa-eye', Service::class)
        ]);

        yield MenuItem::subMenu('Produit', 'fa-solid fa-product-hunt')->setSubItems([
            MenuItem::linkToCrud('Crée une Produit ', 'fas fa-plus', Produit::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les Produit ', 'fas fa-eye', Produit::class)
        ]);

        yield MenuItem::subMenu('Commande', 'fa-solid fa-cart-arrow-down')->setSubItems([
            MenuItem::linkToCrud('Crée une Commande ', 'fas fa-plus', Orders::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les Commande ', 'fas fa-eye', Orders::class)
        ]);

        yield MenuItem::subMenu('Categorie', 'fa-solid fa-book')->setSubItems([
            MenuItem::linkToCrud('Crée une Categorie ', 'fas fa-plus', Categorie::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir les Categorie ', 'fas fa-eye', Categorie::class)
        ]);

        yield MenuItem::linkToCrud('Add detail', 'fa fa-building-o', DetailEcoservices::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
