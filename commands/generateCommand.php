<?php
require_once __DIR__ . '/../vendor/autoload.php';

use \Symfony\Component\Yaml\Yaml;

$file = __DIR__ . '/../configs/parameters.yml';
if (!file_exists($file)) {
    echo "Please copy the configs/parameters.yml.dist file to configs/parameters.yml and edit it";
    die;
}
$configs = Yaml::parse(file_get_contents($file));

$command = 'php run.php';

foreach ($configs as $key => $config) {
    if (is_bool($config)) {
        $config = $config ? 'true' : 'false';
    }

    $separator = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? ' ' : ' \\' . PHP_EOL;

    $command .= ' --' . $key . '="' . $config . '"' . $separator;
}

print $command;
