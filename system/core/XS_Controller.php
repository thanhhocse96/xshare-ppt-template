<?php 
if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class XS_Controller{
    //View
    protected $view = NULL;

    //Model
    protected $model = NULL;

    //Library
    protected $library = NULL;

    //Helper
    protected $helper = NULL;

    //Config
    protected $config = NULL;

    public function __construct(){

    }

    // Load
    // param: controller, action
    public function load($controller, $action){
        //Change name of Controller: {ControllerName}_Controller
        $controller = ucfirst(strtolower($controller)) . '_Controller';
        //Action name: {name}Action
        $action = strtolower($action) . 'Action';

        //Check controller: True -> Exist
        if(!file_exists(PATH_APP . '/controller/' . $controller . '.php')){
            die('Controller '. $controller . ' is not exist' );
        }

        require_once PATH_APP . '/controller/' . $controller . '.php';

        #Check class Controller: True -> exist
        if(!class_exists($controller)){
            die('Class '. $controller . ' is not exist');
        }

        $controllerObject = new $controller();

        #Check Action method: True -> exist
        if(! method_exists($controllerObject, $action)){
            die('Action '. $action . ' is not exist');
        }

        //Call action
        $controllerObject->{$action}();
    }

}
?>