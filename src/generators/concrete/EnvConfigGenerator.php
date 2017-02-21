<?php

require_once __DIR__ . '/../AbstractConfigGenerator.php';
require_once __DIR__ . '/../ConfigGeneratorInterface.php';

class EnvConfigGenerator extends AbstractConfigGenerator implements ConfigGeneratorInterface
{
    public function getFormat()
    {
        return "env";
    }

    public function generateContent($data)
    {
        $config = '';

        foreach ($data as $key => $value) {
            $value = is_array($value) ? json_encode($value) : $value;

            $config .= $key . '=' . $value . PHP_EOL;
        }

        return $config;
    }
}
