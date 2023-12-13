<?php

namespace autoloading;

class Autoloader {
    public static function autoloader() {
        spl_autoload_register(function ($class){
            $fileName =  $class.'.php';
            if(file_exists($fileName)){
                require_once $fileName;
            }
        });

    }



}