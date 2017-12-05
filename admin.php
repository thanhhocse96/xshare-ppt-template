<?php
    define('PATH_SYSTEM', __DIR__ . '/system');
    define('PATH_APP', __DIR__ . '/admin');

    require(PATH_SYSTEM . '/config/config.php');

    include_once PATH_SYSTEM . '/core/XS_Common.php';
    
    XS_load();
    
?>