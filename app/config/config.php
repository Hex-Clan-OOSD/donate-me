<?php
    // Database params
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'donate_me');
    
    // App root
    define('APPROOT',dirname(dirname(__FILE__)));

    //URL root
    define('URLROOT','http://localhost/project');

    // Upload Images location
    // Change here according to the path
    $windowsPath = "C:/xampp/htdocs/project/public/upload-images";
    $windowsUploadRequestPath = "C:/xampp/htdocs/project/public/upload-images/requests/";
    $windowsUploadDonationPath = "C:/xampp/htdocs/project/public/upload-images/donations/";
    $macPath = "/Applications/XAMPP/xamppfiles/htdocs/project/public/upload-images/";
    $macUploadRequestPath = "/Applications/XAMPP/xamppfiles/htdocs/project/public/upload-images/requests/";
    $macUploadDonationPath = "/Applications/XAMPP/xamppfiles/htdocs/project/public/upload-images/donations/";
    define('UPLOAD_IMAGE_PATH_REQUESTS',$macUploadRequestPath);
    define('UPLOAD_IMAGE_PATH_DONATIONS',$macUploadDonationPath);
    // define('UPLOAD_IMAGE_PATH_REQUESTS',$windowsUploadRequestPath);
    // define('UPLOAD_IMAGE_PATH_DONATIONS',$windowsUploadDonationPath);

    //Site name
    define('SITENAME','DonateME');
?>