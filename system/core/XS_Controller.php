<?php if (!define('PATH_SYSTEM')) die('Bad requested!');

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

    }

}
?>