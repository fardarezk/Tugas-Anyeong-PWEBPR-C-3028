<?php
$routes = [];

$routes['GET']['/'] = 'AuthController@viewlogin';
$routes['GET']['/regist'] = 'AuthController@viewregister';
$routes["GET"]['/dashboard'] = 'DashCont@index';
$routes['GET']['/logout'] = 'AuthController@logout';

$routes['POST']['/login'] = 'AuthController@login';
$routes['POST']['/regist'] = 'AuthController@register';

?>