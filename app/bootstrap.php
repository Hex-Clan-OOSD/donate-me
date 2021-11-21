<?php

    // Load the configerations
    require_once 'config/config.php';

    // Autoload the Core libraries
    spl_autoload_register(function ($className){
        require_once 'lib/'.$className.'.php';
    });
    
?>