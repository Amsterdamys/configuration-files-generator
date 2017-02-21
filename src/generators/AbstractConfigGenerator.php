<?php
require_once __DIR__ . '/ConfigGeneratorInterface.php';
use Symfony\Component\Yaml\Yaml;

abstract class AbstractConfigGenerator implements ConfigGeneratorInterface
{
    public $destination;
    protected $data;

    public function __construct($destination, $data)
    {
        $this->destination = $destination;
        $this->data = $data;
    }

    public function generateAndSave()
    {
        $this->save($this->generateContent($this->data));
    }

    abstract public function generateContent($data);
    abstract public function getFormat();

    private function save($data)
    {
        if (file_put_contents($this->destination, $data)) {
            print "Configs saved in {$this->destination}" . PHP_EOL;
        }
    }
}
