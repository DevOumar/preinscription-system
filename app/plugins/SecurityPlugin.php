<?php
declare(strict_types=1);


use Phalcon\Acl\Adapter\Memory as AclList;
use Phalcon\Acl\Component;
use Phalcon\Acl\Role;
use Phalcon\Acl\Enum;
use Phalcon\Di\Injectable;
use Phalcon\Events\Event;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Security\Exception;

/**
 * SecurityPlugin
 */
class SecurityPlugin extends Injectable
{
    /**
     * Returns an existing or new access control list
     *
     * @returns AclList
     */
    public function getAcl(): AclList {

        //throw new \Exception("something");

        if (isset($this->persistent->acl)) {
            return $this->persistent->acl;
        }

        $acl = new AclList();
        $acl->setDefaultAction(Enum::DENY);

            //Register roles
        $roles = array(
            'administrateurs' => new Role('Administrateurs'),
            'guests' => new Role('Guests')
        );
        foreach ($roles as $role) {
            $acl->addRole($role);
        }

            //Resources accessibles à tous les utilisateurs
        $privateResources = array(
            'dashboard'                 => ['index'],
            'preinscription'                      => ['register','index']
        );

        foreach ($privateResources as $resource => $actions) {
            $acl->addComponent(new Component($resource), $actions);
        }

            //Public area resources
        $publicResources = array(
            'index' => array('index'),
            'preinscription' => array('register','index'),
            'errors' => array('show403', 'show404', 'show500'),
            'mailbox'   =>  [
                'sendTaskCron',
                'getNewMails'
            ],
        );

        foreach ($publicResources as $resource => $actions) {
            $acl->addComponent(new Component($resource), $actions);
        }

            //Grant access to public areas to both users and guests
        foreach ($roles as $role) {
            foreach ($publicResources as $resource => $actions) {
                foreach ($actions as $action) {
                    $acl->allow($role->getName(), $resource, $action);
                }
            }
        }

            //Grant acess to private area to role Users
        foreach ($privateResources as $resource => $actions) {
            foreach ($actions as $action) {
                $acl->allow('Administrateurs', $resource, $action);
            }
        }

            //The acl is stored in session, APC would be useful here too
        $this->persistent->acl = $acl;
       //}

        return $this->persistent->acl;
    }

    /**
     * This action is executed before execute any action in the application
     *
     * @param Event $event
     * @param Dispatcher $dispatcher
     */
    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher) {

        $auth = $this->session->has("id");

        if (!$auth) {
            $role = 'Guests';
        } else {
            $role = 'Administrateurs';
        }

        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();

        $acl = $this->getAcl();


        $allowed = $acl->isAllowed($role, $controller, $action);

        if (!$allowed) {

            $dispatcher->forward(array(
                'controller' => 'administrateur',
                'action' => 'login'
            ));

            //$this->session->destroy();
            return false;
        }

    }
}
