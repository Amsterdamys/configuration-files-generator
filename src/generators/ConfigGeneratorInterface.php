<?php

interface ConfigGeneratorInterface
{
    public function __construct($destination, $jsonData);

    public function generateAndSave();
    public function getFormat();
}
