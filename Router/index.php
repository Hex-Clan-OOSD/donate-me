<?php

include_once 'Request.php';
include_once 'Router.php';

$router = new Router(new Request);

$router->get('/', function($request) {
  return
 
  include '../Pages/Login/index.php';

});


$router->get('/profile', function($request) {
  return ;
});

$router->post('/data', function($request) {

  return json_encode($request->getBody());
});