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
        require_once PATH_SYSTEM . '/core/loader/XS_Config_Loader.php';
        $this->config = new XS_Config_Loader();
        $this->config->load('config');
    }
}
?>