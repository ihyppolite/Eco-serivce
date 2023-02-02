<?php

namespace App\Controller\Admin;

use App\Entity\DetailEcoservices;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DetailEcoservicesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return DetailEcoservices::class;
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
