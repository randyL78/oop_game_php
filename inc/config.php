<?php

/**
 * handles configuration options such as auto loading
 * classes
 */

 /**
  * function to check the directory and subdirectories
  * for the needed class and then require it
  * @param string $class_name Name of the class
  */
function autoloader($class_name) {
  foreach(glob(__DIR__ . '/*', GLOB_ONLYDIR) as $dir) {  
    if (file_exists("$dir/" . $class_name . '.php')) {
      require_once "$dir/" . $class_name . '.php';
      break;
    }
  }
}

// initiates the auto load function
spl_autoload_register('autoloader');

