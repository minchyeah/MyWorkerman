<?php

require_once __DIR__ . '/../../vendor/autoload.php';

/**
 * Load class by namespace.
 * @param string $name
 * @return boolean
 */
function loader($name)
{
    $root_dir = dirname(dirname(__DIR__));
    $app_dir = dirname(__DIR__);
    $class_path = str_replace('\\', DIRECTORY_SEPARATOR, $name);
    $class_file = $root_dir . DIRECTORY_SEPARATOR . $class_path . '.php';

    if (empty($class_file) || !is_file($class_file)) {
        $class_file = $app_dir . DIRECTORY_SEPARATOR . $class_path . '.php';
    }

    if (empty($class_file) || !is_file($class_file)) {
        $class_file = __DIR__ . DIRECTORY_SEPARATOR . $class_path . '.php';
    }

    if (is_file($class_file)) {
        require_once($class_file);
        if (class_exists($name, false)) {
            return true;
        }
    }
    return false;
}

spl_autoload_register('loader');
