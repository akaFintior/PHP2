<?php

class Autoload
{
    public function loadClass($className)
    {
        $className = explode("\\", $className);
            // $className[0] - app
            // $className[1] - path
            // $className[2] - file
        $fileName = "../{$className[1]}/{$className[2]}.php";
        if (file_exists($fileName)) {
            include $fileName;
            }
    }
}