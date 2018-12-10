<?php

namespace App\Form;

use App\Entity\Visiteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

class VisiteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')

            ->add('societe',null, array(
                'required'=> false,
            ))
            ->add('motifVisite')
            ->add('lieuVisite')
            ->add('employe')
            

            // ->add('marqueVehicule', null, array(
            //     'required'=> false,
            // ))
            // ->add('immatriculation', null, array(
            //     'required'=> false,
            // ))
            // ->add('couleur', null, array(
            //     'required'=> false,
            // ))
            // ->add('cni', null, array(
            //     'required'=> false,
            // ))
            // ->add('idUnique') 
            // ->add('sexe', null, array(
            //     'required'=> false,
            // ))
            // ->add('dateNaissance', null, array(
            //     'required'=> false,
            // ))
            // ->add('ville',null, array(
            //     'required'=> false,
            // ))
            // ->add('codePostal',null, array(
            //     'required'=> false,
            // ))
            // ->add('numeroRue',null, array(
            //     'required'=> false,
            // ))
            // ->add('rue', null, array(
            //     'required'=> false,
            // ))
            // ->add('telephone',null, array(
            //     'required'=> false,
            // ))
            // ->add('email', null, array(
            //     'required'=> false,

            // ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Visiteur::class,
        ]);
    }
}
