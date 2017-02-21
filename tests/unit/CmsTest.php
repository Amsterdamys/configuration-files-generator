<?php

namespace tests\unit;

class CmsTest extends BaseTest
{
    public function testConfigIsArray()
    {
        $config = $this->getConfiguredConfig(self::CONFIG_EXAMPLE);

        $this->assertTrue(is_array($config));
        $this->assertTrue(!empty($config));
    }

    public function testConfigIsFull()
    {
        $config = $this->getConfiguredConfig(self::CONFIG_EXAMPLE);

        // here tests
    }
}
