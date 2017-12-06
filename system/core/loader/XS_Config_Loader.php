<?php 
/*
*/
class XS_Config_Loader{
    //List of config
    protected $config = array();

    //Load Helper: load 1 file config
    public function load($config){
        if(file_exists(PATH_APP . '/config/' . $config . '.php')){
            $config = include_once PATH_APP . '/config/' . $config . '.php';
            if(! empty($config)){
                foreach ($config as $key => $item){
                    $this->config[$key] = $item;
                }
            }
            return true;
        }
        return FALSE;
    }

    //Config item: Lay 1 key config
    public function item($key, $default_val = ''){
        return isset($tnis->config[$key]) ? $this->config[$key] : $default_val;
    }

    //Thay doi gia tri item
    public function set_item($key, $val){
        $this->config[$key] = $val;
    }
    
}
?>