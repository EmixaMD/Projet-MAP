<?php

namespace App\Form;

use App\Entity\Visiteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class VisiteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',null, array(
                'label' => 'formulaire.nom',
                'attr' =>array(
                'required'=>true,
                )
            ))
            ->add('prenom', null, array(
                'label' => 'formulaire.prenom',
                'attr' =>array(
                'required'=>true,
                )
            ))

            ->add('societe',null, array(
                'label' => 'formulaire.societe',
                'attr' =>array(
                'required'=> true,
                )
            ))
            ->add('motifVisite', NULL, array(
                'label' => 'formulaire.motif',
                'attr' =>array(
                'required' => true,
                'class'=>"select", 
                'data-placeholder' => "Choisir un motif de visite",
                )
            ))
            ->add('lieuVisite', NULL, array(
                'label' => 'formulaire.lieu',
                'attr' =>array(
                'required' => true,
                'class'=>"select", 
                'data-placeholder' => "Choisir un lieu de visite",
                )
            ))
            ->add('employe', NULL, array(
                'label' => 'formulaire.employe',
                "attr"=> array(
                'required' => true,
                'class'=> "select ",
                'data-placeholder'=>"Choisir un employé" ,
                
                )
            ))
            ->add('imageData',HiddenType::class, array(
               
                "attr"=> array(
                'required'=>true,
                )
            ))
            

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
