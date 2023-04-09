<?php

namespace App\Controller\Admin;

use App\Entity\Chocolate;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ChocolateCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Chocolate::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom_chocolat'),
            SlugField::new('slug')->setTargetFieldName('nom_chocolat'),
            ImageField::new('image')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            TextareaField::new('description_chocolat'),
            MoneyField::new('prix_chocolat')->setCurrency('EUR'),
            BooleanField::new('isBest'),
           AssociationField::new('collection')

        ];
    }
}
