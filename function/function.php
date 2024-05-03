<?php

function loadView($view, $data = []) {

    extract($data);
    require_once("main/". $view . ".php");

}
?>