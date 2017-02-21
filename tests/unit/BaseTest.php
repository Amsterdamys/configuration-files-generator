<?php

namespace tests\unit;

use \Symfony\Component\Yaml\Yaml;

class BaseTest extends \Codeception\Test\Unit
{
    const CONFIG_EXAMPLE = 'example';

    private $configs = null;

    protected function getConfigs()
    {
        if (is_null($this->configs)) {
            $this->configs = Yaml::parse(file_get_contents(__DIR__ . '/../../configs/private.yml'));
        }

        return $this->configs;
    }

    protected function getConfig($name)
    {
        foreach ($this->getConfigs() as $config) {
            if ($config['template'] === $name) {
                return $config;
            }
        }

        return;
    }

    protected function getConfiguredConfig($name)
    {
        $config = $this->getConfig($name);

        $this->assertFileExists($config['destination']);

        if ($config['format'] === 'php') {
            return require $config['destination'];
        } else if ($config['format'] === 'env') {
            $result = explode("\n", file_get_contents($config['destination']));
            $params = [];

            foreach ($result as $value) {
                $param = explode('=', $value);

                if (isset($param[0]) && !$param[0]) {
                    continue;
                }

                $params[$param[0]] = $param[1];
            }

            return $params;
        }
        
        if ($config['format'] === 'js') {
            $result = file_get_contents($config['destination']);
            $result = str_replace("'", '"', $result);
            $result = preg_replace('/(\s*)(\w+):(.+)/i', "$1\"$2\":$3", $result);
            $result = preg_replace('/,(\s*)\n(\s*)\}/i', "$1\n$2}", $result);
            $result = str_replace('module.exports = ', '', $result);
            
            return json_decode(trim($result, ";\n"), true);
        }

        return json_decode(file_get_contents($config['destination']), true);
    }
}
