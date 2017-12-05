<?php if(!defined('PATH_SYSTEM')) die ('Bad Requested!');

function XS_load(){
    //Load initial config file
    $config = include_once PATH_APP . '/config/init.php';
    $controller = empty($_GET['c']) ? $config['default_controller'] : $_GET['c'];
    $action = empty($_GET['a']) ? $config['default_action'] : $_GET['a'];

    $controller = ucfirst(strtolower($controller)) . '_Controller';
    $action = strtolower($action) . 'Action';

    //Check controller: True -> Exist
    if(!file_exists(PATH_APP . '/controller/' . $controller . '.php')){
        die('Controller '. $controller . ' is not exist' );
    }

    include_once PATH_SYSTEM . '/core/XS_Controller.php';

    require_once PATH_APP . '/controller/' . $controller . '.php';

    //Check class Controller: True -> exist
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
?>