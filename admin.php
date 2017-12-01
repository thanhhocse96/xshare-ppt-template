<?php
    define('PATH_SYSTEM', __DIR__ . '/system');
    define('PATH_APP', __DIR__ . '/admin');

    require(PATH_SYSTEM . '/config/config.php');

    $segment = array(
        'controller' => '',
        'action' => array()
    );

    //Set default Controller & Action
    $segment['controller'] = empty($_GET['c']) ? CONTROLLER_DEFAULT : $_GET['c'];
    $segment['action'] = empty($_GET['a']) ? ACTION_DEFAULT : $_GET['a'];

    //Require Controller
    require_once PATH_SYSTEM . '/core/XS_Controller.php';

    //Run Controller
    $controller = new XS_Controller();
    $controller->load($segment['controller'], $segment['action']);
?>