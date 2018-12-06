<?php

namespace App\Form;

use App\Entity\Visiteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VisiteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('societe')
            ->add('motif')
            ->add('zoneVisite')
            ->add('marqueVehicule')
            ->add('immatriculation')
            ->add('couleur')
            ->add('cni')
            ->add('idUnique')
            ->add('sexe')
            ->add('dateNaissance')
            ->add('ville')
            ->add('codePostal')
            ->add('numeroRue')
            ->add('rue')
            ->add('telephone')
            ->add('email')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Visiteur::class,
        ]);
    }
}
