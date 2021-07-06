<?php

// wczytuje wszystkie classy 
spl_autoload_register('myAutoLoader');
//rejestruje autoloader 
function myAutoLoader ($className){
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    
    if(strpos($url, 'includes') !== false){
        $path = '../classes/';
        //if sprawdza czy jestes w folderze includes jesli tak to wraca do potrzebnego folderu
    }
    else {
        $path = 'classes/';
    }
    $extension = '.class.php';
    //autoloader uzywa extension .class.php
    require_once $path . $className . $extension;
}