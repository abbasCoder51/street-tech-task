<?php

/**
 * Register an autoloader function
 * 
 * @param callable
 */
spl_autoload_register(function($className) {
    $filePath = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';

    if(file_exists($filePath)) {
        require_once $filePath;
    }
});