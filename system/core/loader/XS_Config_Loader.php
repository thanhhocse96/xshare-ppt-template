<?php 
/*
*/
class XS_Config_Loader{
    //List of config
    protected $config = array();

    //Load Helper
    public function load($config){
        if(file_exists(PATH_APP . '/config/' . $config . '.php')){
            $config = include_once PATH_APP . '/config' . $config . '.php';
            if(! empty($config)){
                foreach ($config as $key => $item){
                    $this->config[$key] = $item;
                }
            }
        }
    }
}
?>