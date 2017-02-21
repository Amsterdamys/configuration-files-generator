<?php

require_once __DIR__ . '/../AbstractConfigGenerator.php';
require_once __DIR__ . '/../ConfigGeneratorInterface.php';

class JsonConfigGenerator extends AbstractConfigGenerator implements ConfigGeneratorInterface
{
    public function getFormat()
    {
        return "json";
    }

    public function generateContent($data)
    {
        return json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
    }
}
