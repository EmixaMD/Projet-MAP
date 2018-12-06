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
            ->add('zone_visite')
            ->add('marque_vehicule')
            ->add('immatriculation')
            ->add('couleur')
            ->add('cni')
            ->add('id_unique')
            ->add('sexe')
            ->add('date_naissance')
            ->add('ville')
            ->add('code_postal')
            ->add('numero_rue')
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
