<?php
spl_autoload_register(
    function($class){
        include getcwd().'/'.strtolower(str_replace("\\", '/', $class)).'.php';
    }
);
include "vendor/autoload.php";
include "routes/web.php";