<?php

trait PrintDataTrait
{
    public function printArguments($arguments)
    {
        foreach ($arguments as $key => $value) {
            if (is_string($value)) {
                $asterix = substr($value, 0, 3) . str_repeat("*", max(strlen($value) - 3, 0));
                echo "$key => $asterix" . PHP_EOL;
            } elseif (is_array($value)) {
                echo "$key =>" . PHP_EOL;
                foreach ($value as $row) {
                    $asterix = substr($row, 0, 3) . str_repeat("*", max(strlen($row) - 3, 0));
                    echo "\t $asterix" . PHP_EOL;
                }
            }
        }

        echo PHP_EOL;
    }
}
