<?php
use \Symfony\Component\Yaml\Yaml;

trait GetDataTrait
{
    public static $toArray = [
        'PARAMS__ADMINWHITELIST',
        'PARAMS__ANONYMIZE__SKIPEMAILS',
        'PARAMS__IPSWHITELIST',
        'PARAMS__BUGREPORTEMAILS',
    ];

    public static $delimiter = ',';

    public function getArguments()
    {
        global $argv;

        // default arguments
        $arguments = Yaml::parse(file_get_contents(__DIR__ . '/../../configs/parameters.yml'));

        foreach ($argv as $arg) {
            preg_match('/
                ^-- # start with --
                (?P<encoded>ENCODED__)? # checks if parameter is encoded
                (?P<key>[^-=]+) # key of parameter like DB__NAME
                = # equal sign
                (?P<value>.+)$ # value of parameter like db_name_1
                /x', $arg, $matches);

            if ($matches) {
                if ($matches['encoded']) {
                    $matches['value'] = str_replace('"', '\"', base64_decode($matches['value']));
                }

                $key = trim($matches['key']);
                $value = trim($matches['value']);

                $arguments[$key] = $value;

                if (in_array($key, self::$toArray) && $value !== '[]' && $value) {
                    $array = explode(self::$delimiter, $arguments[$key]);

                    foreach ($array as $arrayKey => $arrayValue) {
                        $array[$arrayKey] = trim($array[$arrayKey]);
                    }

                    $arguments[$key] = json_encode($array);

                    $arguments[$key] = $array;
                }
            }
        }

        if (empty($arguments)) {
            throw new Exception(
                'Please provide either command-line arguments or parameters.yml file.'
            );
        }

        return $arguments;
    }
}
