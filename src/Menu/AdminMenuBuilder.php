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

        $menu->addChild('menu.users', ['route' => 'admin_visiteur_index']);
        $menu->addChild('menu.admin', ['route' => 'admin_visiteur_index']);
        $menu->addChild('menu.categories', ['route' => 'admin_visiteur_index']);
        $menu->addChild('menu.autrechose', ['route' => 'admin_visiteur_index']);
        $menu->addChild('logout', ['route' => 'fos_user_security_logout']);

        return $menu;
    }
}