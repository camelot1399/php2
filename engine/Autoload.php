<?php

namespace app\engine;

class Autoload
{

    public function loadClass($className) {

        $className = str_replace('app', '..', $className);
        $fileName = str_replace("\\", '/', $className) . '.php';

        // var_dump($fileName);

        if (file_exists($fileName)) {
            include $fileName;
            // break;
        }

    }
}