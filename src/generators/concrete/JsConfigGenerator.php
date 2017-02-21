<?php

require_once __DIR__ . '/../AbstractConfigGenerator.php';
require_once __DIR__ . '/../ConfigGeneratorInterface.php';

class JSConfigGenerator extends AbstractConfigGenerator implements ConfigGeneratorInterface
{
    public function getFormat()
    {
        return "js";
    }

    public function generateContent($data)
    {
        $encodedData = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        $encodedData = preg_replace('/(\s*)"([^"]+)"(:.*)/', "$1$2$3", $encodedData);
        $encodedData = preg_replace('/([^\{,;])\n/', "$1,\n", $encodedData);
        $encodedData = str_replace('"', "'", $encodedData);

        return "module.exports = " . $encodedData . ";\n";
    }
}
