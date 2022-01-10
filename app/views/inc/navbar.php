<?php

// Decorator design pattern is used in here

abstract class Navbar{
    protected $html_component;
}
class AnonymousUserNavbar extends Navbar{
    public function __construct()
    {
        $this->html_component = require_once (APPROOT . '/views/inc/land_navbar.php');;
    }

}


class NormalUserNavbar extends Navbar{
    public function __construct()
    {
        $this->html_component = require_once (APPROOT . '/views/inc/request_navbar.php');;
    }

}

class AdminUserNavbar extends Navbar{
    public function __construct()
    {
        $this->html_component = require_once (APPROOT . '/views/inc/admin_navbar.php');;
    }
}