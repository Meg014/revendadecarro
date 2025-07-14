<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;

class AppController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login',

            ],
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'index',

            ],
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'home'

            ],
            'authError' => 'Você precisa estar logado para acessar esta área.',
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password']
                ]
            ],
            'storage' => 'Session'
        ]);

        // Força autenticação
        $this->Auth->deny();
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $userSesion = $this->Auth->user('id');
        $this->set('authUser', $this->Auth->user());

        $this->viewBuilder()->setLayout('default');

        // Permitir acesso ao login e à página inicial
        $this->Auth->allow(['login', 'display', 'home', 'search', 'getModelosByMarca', 'detalhes', 'destaques']);

        // RememberMe logic (mantenha como já está)
        $user = $this->Auth->user();
        if (!$user && $this->request->getCookie('RememberMe')) {
            $cookie = json_decode($this->request->getCookie('RememberMe'), true);
            if (!empty($cookie['id'])) {
                $user = $this->fetchTable('Users')->find()
                    ->where(['id' => $cookie['id'], 'active' => true])
                    ->first();
                if ($user) {
                    $this->Auth->setUser($user->toArray());
                }
            }
        }
    }
}
