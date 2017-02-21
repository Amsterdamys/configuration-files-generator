<?php

require_once __DIR__ . '/generators/ConfigGeneratorInterface.php';

class ConfigGeneratorFactory
{
    public static function initialize($type, $destination, $output)
    {
        $type = ucfirst(strtolower($type));
        $generatorName = $type . 'ConfigGenerator';

        require_once __DIR__ . '/generators/concrete/' . $generatorName . '.php';

        $object = new $generatorName($destination, $output);

        return $object;
    }
}
