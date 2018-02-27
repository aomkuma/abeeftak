<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller\Component;

use Cake\Controller\Component;

/**
 * Description of Utils
 *
 * @author sakorn.s
 */
class AuthenComponent extends Component {

    public function authen() {
        $control = strtolower($this->request->params['controller']);
        $action = strtolower($this->request->params['action']);

        if ((is_null($this->request->session()->read('Auth.User')))) {

//           
            if ($control == 'users' && in_array($action, ['login', 'logout'])) {

                return true;
            } else {

                return false;
            }
        } else {

            $Permissions = $this->request->session()->read('rolePermissions');

            if (in_array($control, $Permissions['controller'])) {

                $actionArr = $Permissions['actions'][$control];

                if ($action == 'displaypermission' || $action == 'logout') {

                    return true;
                } else if (in_array($action, $actionArr)) {

                    return true;
                } else {

                    return false;
                }
            } else {

                return false;
            }
        }
    }

}

?>