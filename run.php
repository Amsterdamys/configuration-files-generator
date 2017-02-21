#!/usr/bin/env php

<?php

require_once 'vendor/autoload.php';

require_once __DIR__ . '/src/ConfigGeneratorFactory.php';
require_once __DIR__ . '/src/traits/GetDataTrait.php';
require_once __DIR__ . '/src/traits/PrintDataTrait.php';

use \Symfony\Component\Yaml\Yaml;

class Config
{
    use GetDataTrait;
    use PrintDataTrait;

    const CONFIG_PATH        = 'configs/private.yml';
    const TEMPLATE_DIRECTORY = 'templates';
    const TEMPLATE_EXTENSION = 'json';
    const LOG_PATH = 'runtime/run.log';

    public function __construct()
    {
        $this->generateConfigs();
    }

    private function generateConfigs()
    {
        $arguments = $this->getArguments();

        $this->log($arguments);
        echo("Arguments:" . PHP_EOL);
        $this->printArguments($arguments);
        $configs = $this->getConfigs();

        foreach ($configs as $config) {
            $template = $this->getTemplate($config['template']);
            $vars = $this->getTemplateVars($template);

            foreach ($vars as $var) {
                if (!isset($arguments[$var])) {
                    throw new ErrorException ('Not enough arguments: '.$var.' is undefined -- template '.$config['template']);
                }
            }

            $loader = new Twig_Loader_Array(['index' => $template]);
            $twig = new Twig_Environment($loader, ['autoescape' => false, 'cache' => false ]);
            $output = $twig->render('index', $arguments);
            $output = strtr($output, [
                '&quot;' => '"',
                '&lt;' => '<',
                '&gt;' => '>',
                '&amp;' => '&',
                '&#039;' => '"',
            ]);
            $output = json_decode($output, true);

            // relative urls in config
            if ($config['destination'][0] !== '/') {
                $config['destination'] = __DIR__ . '/' . $config['destination'];
            }
            $generator = ConfigGeneratorFactory::initialize($config['format'], $config['destination'], $output);
            $generator->generateAndSave();
        }
    }

    private function getTemplate($name)
    {
        $templatePath = self::TEMPLATE_DIRECTORY . DIRECTORY_SEPARATOR . $name . '.' . self::TEMPLATE_EXTENSION;

        if (!is_file($templatePath)) {
            throw new Exception('You have not template: ' . $templatePath);
        }

        return file_get_contents($templatePath);
    }

    private function getConfigs()
    {
        if (!is_file(self::CONFIG_PATH)) {
            throw new Exception('You have no config file: ' . self::CONFIG_PATH);
        }

        $content = file_get_contents(self::CONFIG_PATH);
        try {
            $configs = Yaml::parse($content);
        } catch (ParseException $e) {
            throw new Exception("Unable to parse the YAML config file: %s", $e->getMessage());
        }

        return $configs;
    }

    private function log($arguments)
    {
        $path = __DIR__ . '/' . self::LOG_PATH;

        if (!is_file($path)) {
            @mkdir(dirname($path), 0777);
        }

        $data = date('Y-m-d H:i:s') . PHP_EOL . PHP_EOL;

        foreach ($arguments as $key => $value) {
            if (is_array($value)) {
                $value = implode($value, ',');
            }

            $data .= '--' . $key . '=' . $value . PHP_EOL;
        }

        $data .= PHP_EOL . '---------------' . PHP_EOL . PHP_EOL;

        file_put_contents($path, $data, FILE_APPEND);
    }

    public function getTemplateVars($template)
    {
        $loader = new Twig_Loader_Array(['index' => $template]);
        $twig = new Twig_Environment($loader, ['autoescape' => false, 'cache' => false ]);

        $vars = $this->extractVars($twig->parse($twig->tokenize($template)));
        return $vars;
    }

    protected function extractVars($node)
    {
        if (!$node instanceof Traversable) return array();

        $vars = array();

        foreach ($node as $cur)
        {
            if (get_class($cur) != 'Twig_Node_Expression_Name')
            {
                $vars = array_merge($vars, $this->extractVars($cur));
            }
            else
            {
                $vars[] = $cur->getAttribute('name');
            }
        }

        return $vars;
    }
}

$MYDIR = realpath(dirname(__FILE__));
chdir($MYDIR);
new Config();
