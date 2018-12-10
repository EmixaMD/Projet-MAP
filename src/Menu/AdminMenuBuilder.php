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

        $menu->addChild('personnes encore presente', ['route' => 'admin_visiteur_index']);
        $menu->addChild('historique', ['route' => 'admin_visiteur_index']);
        $menu->addChild('utilisateurs', ['route' => 'admin_visiteur_index']);

    
        $parentUser = $menu->addChild('paramétrage', ['uri' => '#']);
        $parentUser->addChild('motif_visite', ['route' => 'admin_motif_visite_index']);
        $parentUser->addChild('lieu_visite', ['route' => 'admin_lieu_visite_index']);
        $parentUser->addChild('employe', ['route' => 'admin_employe_index']);
        $menu->addChild('logout', ['route' => 'fos_user_security_logout']);

        return $menu;
    }
}