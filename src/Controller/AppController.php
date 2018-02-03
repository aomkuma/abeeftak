<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Security', ['blackHoleCallback' => 'forceSSL']);

        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'home',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'users',
                'action' => 'login'
            ],
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password']
                ]
            ]
        ]);
    }
    
    public function forceSSL() {
        return $this->redirect('https://' . env('SERVER_NAME') . $this->request->here);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Http\Response|null|void
     */
    public function beforeRender(Event $event) {
        // Note: These defaults are just to get started quickly with development
        // and should not be used in production.
        // You should instead set "_serialize" in each action as required.
        if (!array_key_exists('_serialize', $this->viewVars) &&
                in_array($this->response->getType(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        $this->Security->requireSecure();
        $this->Auth->allow();
        $this->authen();
    }

    private function authen() {
        $control = strtolower($this->request->params['controller']);
        $action = strtolower($this->request->params['action']);

        $controllerguestDenyguestDeny = [
            'actions', 'addresses', 'breedingrecords', 'controllers', 'cowbreeds', 'roles',
            'cowimages', 'farms', 'givebirthrecords', 'growthrecords', 'herdsmans', 'images', 'movements',
            'pages', 'roleaccesses', 'roles', 'treatmentrecords', 'users', 'home'];


        if ((is_null($this->request->session()->read('Auth.User')))) {

//            if (in_array($control, $controllerguestDenyguestDeny)) {
//                $this->Auth->deny();
//               // debug('11' . $control);
//                return $this->redirect(['controller' => 'home', 'action' => 'index']);
//            } else {
//                if($control=='users'&&$action=='login'){
//                $this->Auth->allow();
//               // debug('22' . $control);
//                }else if($control=='home'){
//                    $this->Auth->allow();
//                  //   debug('222' . $control);
//                }else{
//                    $this->Auth->deny();
//                  //   debug('2222' . $control);
//                }
//            }
           if($control=='users'&&$action=='login'){
               $this->Auth->allow();
           }else{
               $this->Auth->deny();
                return $this->redirect(['controller' => 'users', 'action' => 'login']);
           }
        } else {
            // debug('33');
            $status = '';
            $Permissions = $this->request->session()->read('rolePermissions');

            if (in_array($control, $Permissions['controller'])) {
                $actionArr = $Permissions['actions'][$control];

                if (in_array($action, $actionArr)) {

                    //  debug('pass');
                    $this->Auth->allow();
                } else {
                    //    debug('no');
                    $this->Auth->deny();
                    return $this->redirect(['controller' => 'users', 'action' => 'login']);
                }
            } else {
                // debug('no1');
                $this->Auth->deny();
                return $this->redirect(['controller' => 'users', 'action' => 'login']);
            }
        }
    }

}
