<?php

    // Load the configerations
    require_once 'config/config.php';

    // Load the helper functions
    require_once 'helpers/url_helper.php';
    require_once 'helpers/session_helper.php';

    // Autoload the Core libraries
    spl_autoload_register(function ($className){
        require_once 'lib/'.$className.'.php';
    });
    
?>