<?php 

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;

class AdminMenuBuilder
{
    private $factory;
    private $tokenStorage;

    public function __construct(FactoryInterface $factory, TokenStorage $tokenStorage)
    {
        $this->factory = $factory;
        $this->tokenStorage = $tokenStorage;
    }

    public function createMenu()
    {
        $user = $this->tokenStorage->getToken()->getUser();
        $menu = $this->factory->createItem('root');

        $menu->addChild('Personnes encore presente', ['route' => 'admin_visiteur_index']);
        $menu->addChild('Historique', ['route' => 'admin_visiteur_historique']);
        $menu->addChild('Liste des utilisateurs', ['route' => 'admin_visiteur_index']);

    
        $parentUser = $menu->addChild('Paramétrage', ['uri' => '#']);
        $parentUser->addChild('Motif de visite', ['route' => 'admin_motif_visite_index']);
        $parentUser->addChild('Lieu de visite', ['route' => 'admin_lieu_visite_index']);
        $parentUser->addChild('Liste des employés', ['route' => 'admin_employe_index']);
        $menu->addChild('Déconnexion', ['route' => 'fos_user_security_logout']);

        return $menu;
    }
}