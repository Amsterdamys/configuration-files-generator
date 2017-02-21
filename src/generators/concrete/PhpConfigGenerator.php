<?php

require_once __DIR__ . '/../AbstractConfigGenerator.php';
require_once __DIR__ . '/../ConfigGeneratorInterface.php';

class PhpConfigGenerator extends AbstractConfigGenerator implements ConfigGeneratorInterface
{
    public function getFormat()
    {
        return "php";
    }

    public function generateContent($data)
    {
        return "<?php" . PHP_EOL . PHP_EOL . 'return ' . var_export($data, true) . ';';
    }
}
